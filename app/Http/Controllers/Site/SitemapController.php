<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Countri;
use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public $postRep;

    public function __construct ()
    {
        $this->postRep = PostRepository::get_instance();
    }

    public function index()
    {
        return view('site.sitemap.index', [
            'collect' => Countri::select('name', 'id')->
                                   with('citys')->
                                   orderBy('name')->
                                   get()->
                                   split(3)
        ]);
    }

    public function countri($countri_id, $page = '')
    {
        //Post::where('countri_id' => $countri_id)->
        //dd($this->postRep->getAllPostsOnCountri($countri_id));
        return view('site.sitemap.countri', [
            'posts' => $this->postRep->getAllPostsOnCountri($countri_id, $page)
        ]);
    }

    public function city($city)
    {
        return 'city';
    }
}
