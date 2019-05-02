<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\SectionSortRequest;
use App\Models\Site\Comment;
use App\Models\Site\Countri;
use App\Models\Site\Region;
use App\Repositories\MenuRepository;
use App\Repositories\PostRepository;
use App\Http\Controllers\Controller;
use App\Repositories\RegionRepository;
use View;

class SiteController extends Controller
{
    public function __construct (MenuRepository $menu)
    {
        View::share ('headerMenu', $menu->getMenu());
    }

    /*-------------------
        index action
    -------------------*/
    public function index(PostRepository $postRep)
    {
        return view('site.index', [
            'postsNew' => $postRep->getNewOrPopularPosts ('date_add'),
            'postsPopular' => $postRep->getNewOrPopularPosts ('prosmotr')
        ]);
    }

    /*-------------------
        article action
    -------------------*/
    public function article(PostRepository $postRep, $alias)
    {
        return view('site.article', [
            'post_info' => $postRep->article,
            'posts' => $postRep->getPostsGrupp(),
            'related_posts' => $postRep->getRelatedPosts(),
            'comments' => Comment::getAllPostComments($postRep->article->id),
            'postRep' => $postRep
        ]);
    }

    /*-------------------
        lions action
    -------------------*/
//    public function lions(PostRepository $postRep, $slug)
//    {
//        $region = Countri::where('slug', $slug)->firstOrFail();
//
//        return view('site.lions.lions',
//            [
//                'region' => $region,
//                'countPostsByCity' => $postRep->getCountPostsByCity($region->id),
//                'popularPostsByCountri' => $postRep->getPopularPostsByCountri ($region->id),
//                'texts' => explode('<p>%@==@%</p>', $region->text)
//            ]);
//    }

    public function lions(PostRepository $postRep, RegionRepository $regionRep, $slug)
    {
        $region = Region::with('children')->where('slug', $slug)->firstOrFail();

        return view('site.lions.lions',
            [
                'region' => $region,
                'countPostsByCity' => $postRep->getCountPostsByCity($region),
                'popularPostsByCountri' => $postRep->getPopularPostsByCountri ($region),
                'texts' => explode('<p>%@==@%</p>', $region->text)
            ]);
    }


    /*-------------------
        section action
    -------------------*/
    public function section(SectionSortRequest $request, PostRepository $postRep, $slug, $page = '')
    {
        $sort = $request->get('field')
            ? ['field' => $request->get('field'), 'order_by' => $request->get('order_by')]
            : ['field' => 'id', 'order_by' => 'desc'];

        return view('site.section', [
            'section_info' => $postRep->getSectionInfo(),
            'posts' => $postRep->getPosts($sort, $page),
            'postRep' => $postRep
        ]);
    }

    /*-----------------------
        sectionTag action
    -----------------------*/
    public function sectionTag(SectionSortRequest $request, PostRepository $postRep, $slug, $tag_slug, $page = '')
    {
        $sort = $request->get('field')
            ? ['field' => $request->get('field'), 'order_by' => $request->get('order_by')]
            : ['field' => 'id', 'order_by' => 'desc'];

        return view('site.section', [
            'section_info' => $postRep->getSectionInfoTag(),
            'posts' => $postRep->getPostsTag($sort, $page),
            'postRep' => $postRep
        ]);
    }
}