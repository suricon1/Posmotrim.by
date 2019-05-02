<?php

namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Site\Post;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Validator;
use View;

class SearchController extends Controller
{
    public function __construct (MenuRepository $menu)
    {
        View::share ('headerMenu', $menu->getMenu());
    }

    public function index(Request $request){
        $v = Validator::make($request->all(), [
            'search' => 'required|min:3|regex:/^[a-zа-яё1-9 _-]*$/iu'
        ]);

        if ($v->fails()){
            return ($request->ajax()) ? ['errors' => $v->errors()] : redirect()->back()->withErrors($v->errors());
        }

        $posts = $this->search($request->search, $request->ajax() ? 5 : 30); //Полнотекстовый поиск с пагинацией

        if($request->ajax())
        {
            $temp = '';
            foreach ($posts as $post)
            {
                $temp .= '<li><a href="'.route('site.article', ['alias' => $post->slug]).'">'.strReplaceStrong($request->search, $post->title).'</a></li>';
            }
            return ['succes' => $temp];
        }
        return view('site.search', [
                                'query' => $request->search,
                                'posts' => $posts]);
    }

    public function search($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        $query = trim(preg_replace('/[^a-zа-яё1-9 _-]+/iu', '', $query));

        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            //$query[] = $word . "*";


            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                    {
                        $query[] = $word . "*";
                        break;
                    }
                case ($len > 3 && $len <= 6):
                    {
                        $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 6 && $len <= 9):
                    {
                        $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                        break;
                    }
                case ($len > 9):
                    {
                        $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $query = implode(" ", $query); //объединяет массив в строку

        $results = Post::notGrupp()->
                         active()->
                         whereRaw("MATCH(title) AGAINST(? IN BOOLEAN MODE)", $query)->
                         orderByRaw("MATCH(title) AGAINST(? IN BOOLEAN MODE) DESC", $query)->
                         paginate($count) ;

        return $results;
    }

    public function scopeSearch($query, $q)
    {
        $match = "MATCH(`name`, `description`) AGAINST (?)";
        return $query->whereRaw($match, array($q))
            ->orderByRaw($match.' DESC', array($q));
    }
}