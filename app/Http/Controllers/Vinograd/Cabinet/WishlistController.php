<?php

namespace App\Http\Controllers\Vinograd\Cabinet;

use App\UseCases\CartService;
use App\UseCases\WishlistService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;

class WishlistController extends Controller
{
    private $service;

    public function __construct(WishlistService $service, CartService $cartService)
    {
        $this->service = $service;
        View::share ('cart', $cartService->getCart());
    }

    public function index()
    {
        return view('cabinet.wishlist', [
            'products' => $this->service->getAllWishlistProduct()
        ]);
    }

    public function addToWishlist($id)
    {
        try {
            $this->service->add(Auth::user()->id, $id);
            return redirect()->back()->with('status', 'Товар добавлен в избранное!');
        } catch (\DomainException $e) {
            return back()->withErrors([$e->getMessage()]);
        }

    }

    public function deleteFromWishlist(Request $request)
    {
        $this->validate($request, [
           'product_id' => 'required|integer|exists:vinograd_products,id'
        ]);
        try {
            $this->service->remove(Auth::user()->id, $request->get('product_id'));
            return redirect()->back()->with('status', 'Товар удален!');
        } catch (\DomainException $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

}
