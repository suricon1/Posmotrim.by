<?php

namespace App\Http\Controllers\Vinograd;

use App\Models\Vinograd\Category;
use App\Models\Vinograd\Comment;
use App\Models\Vinograd\Product;
use App\Models\Vinograd\Slider;
use App\Http\Controllers\Controller;
use App\UseCases\CartService;
use App\UseCases\LookService;
use View;

class VinogradController extends Controller
{
    public function __construct(CartService $service)
    {
        View::share ('cart', $service->getCart());
    }

    public function index()
    {
        $categorys = Category::all();
        foreach ($categorys as $category)
        {
            $products[$category->slug] = Product::where('category_id', $category->id)->get();
        }

        return view('vinograd.index', [
            'products' => $products,
            'sliders' => Slider::all(),
            'categorys' => $categorys
        ]);
    }

    public function product(LookService $service, $slug)
    {
        $product = Product::where('slug', $slug)->active()->firstOrFail();
        $service->setCookieLook($product->id);

        return view('vinograd.product', [
            'product' => $product,
            'comments' => Comment::getAllProductComments($product->id)
            ]);
    }

    public function category($page = '')
    {
        return view('vinograd.category', [
            'products' => Product::paginate(21, ['*'], 'page', $page)
        ]);
    }

    public function categorySlug($slug, $page = '')
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('vinograd.category', [
            'products' => $category->products()->active()->paginate(21, ['*'], 'page', $page),
            'category' => $category
        ]);
    }
}
