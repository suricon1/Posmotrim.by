<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use App\Models\Traits\FitImages;
use App\Models\Traits\Size;
use Illuminate\Http\Request;
use Image;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function test()
    {
        return;
        $posts = Post::all();
        foreach ($posts as $post){
            if($post->object) {
                $tags = explode(" ", $post->object);
                foreach ($tags as $tag) {
                    $newTag = new PostTag();
                    $newTag->post_id = $post->id;
                    $newTag->tag_id = $tag;
                    $newTag->save();
                }
            }
        }
        return 'OK';
    }
    public function post_mage()
    {
        //  Переносит фотки в соответствии с новым паттерном
        return;
        $posts = Post::all();
        foreach ($posts as $post){
            if($post->image != null){
                $path = '/pics/' . $post->image;
                $pathSmall = '/pics/small/' . $post->image;
                if(!Storage::exists($path)){continue;}
                Storage::move($path, '/pics/Post/post-'.$post->id.'/origin.jpg');

                if(!Storage::exists($pathSmall)){continue;}
                Storage::move($pathSmall, '/pics/Post/post-'.$post->id.'/220x165.jpg');
            }
        }
    }
    public function clean_image()
    {
        $files = Storage::files('/pics/');
        $posts = Post::all();
        //dd($posts);
        $i=1;

        foreach ($files as $file) {
            $type = Storage::mimeType($file);
            if(!preg_match('~^image/.*$~', $type)) continue;
            $src = explode('/', $file);
            if(!$this->goPosts($posts, $src[1])){
                echo $i.': '.$src[1].' <img src="'.$file.'"> ->  Не нашол<br>';
                $i++;
            }


//            foreach ($posts as $post) {
//                if(preg_match("~$file~", $post)){
//                    echo $file.': Нашол<br>';
//                    continue;
//                }
//            }
            //echo $file.': Не нашол<br>';
        }
    }

    public function post_content_images()
    {
        return;
        $posts = Post::all();
        foreach ($posts as $post){
            $post->content = preg_replace_callback('/<img[^>]+src=["\']?([^\s"\']+)["\']?[^>]*>/is',
                function ($match) use($post) {

                    if(strpos($match[1], 'content') !== false) {return $match[0];}

                    try{
                        Storage::makeDirectory($post->getPath().'content');
                        $src = $post->getPath().'content/' . class_basename($match[1]);

                        $temp = parse_url($match[1]);
                        $image = new FitImages(new Size('0x0'));

                        if(empty($temp['host'])) {
                            $image->routeImageSave($match[1], $src);
                        }else{
                            $image->saveImage($match[1], $src);
                        }
                        echo $post->id.' - '.$post->title.' - '.$match[1].' OK <br>';
                        Storage::delete($match[1]);

                    } catch (\Exception $e) {
                        if($e->getMessage() == 'Image source not readable'){
                            return '';
                        }
                        echo $post->id.' - '.$post->title.' - '.$match[1].' - '.$e->getMessage().'<br>';
                        return  $match[0];
                    }
                    return preg_replace('/src=["\']?([^\s"\']+)["\']?/is', 'src="/'.$src.'"', $match[0]);

                }, htmlspecialchars_decode($post->content));
             $post->save();
        }
    }

    private function goPosts($posts, $file)
    {
        $rez = false;
        $pattern = "~\/$file~s";

        foreach ($posts as $post) {
            if(preg_match_all("|\/pics\/([^uploads].*)\.jpg|U",$post->content,$out, PREG_SET_ORDER))
            //if(preg_match_all("|ikana.hut4.ru|U",$post->content,$out, PREG_SET_ORDER))
            {

                echo $post->title.'<br>';
                echo '<pre>';
                var_dump($out);
                echo '</pre>';

                //echo $post->content.'<br>';
                //dd($out, $post->title, $post->content);
            }


            if(preg_match($pattern, $post->content)){

                $post->content = preg_replace($pattern, '/uploads/'.$file, $post->content);
                $post->save();

                if(Storage::exists('/pics/'.$file)){
                    Storage::move('/pics/'.$file, '/pics/uploads/'.$file);
                }
                dd($post->title, $pattern, $post->content);
                $rez = true;
            }
        }
        dd('123');
        return $rez;
    }
}
