<?php

namespace App\Http\Controllers\Vinograd;

use App\Repositories\ProductRepository;
use App\UseCases\CartService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    private $products;
    private $service;

    public function __construct(CartService $service, ProductRepository $products)
    {
        $this->products = $products;
        $this->service = $service;
    }

    public function index()
    {
        return view('vinograd.cart', [
            'cart' => $this->service->getCart()
        ]);
    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            'product_id'      => 'required|integer|exists:vinograd_products,id',
            'modification_id' => 'required|integer|exists:vinograd_product_modifications,id',
            'quantity'        => ['required', 'integer', 'regex:/^[1-9]\d*$/']
        ]);

        $product = $this->products->get($request->get('product_id'));
        $modification = $this->products->getModification($request->get('modification_id'));

        try {
            $this->service->add($product, $modification, $request->get('quantity'));
            return redirect()->back()->with('status', 'Товар добавлен в корзину!');
        } catch (\DomainException $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }


    public function quantity(Request $request)
    {
        $this->validate($request, [
            'id'       => ['required', 'regex:/^[a-z0-9]*$/i'],
            'quantity' => ['required', 'integer', 'regex:/^[1-9]\d*$/']
        ]);
        try {
            $this->service->set($request->get('id'), $request->get('quantity'));
            return redirect()->route('vinograd.cart.ingex')->with('status', 'Корзина обновлена!');

        } catch (\DomainException $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function remove(Request $request)
    {
        $this->validate($request, [
            'id' => ['required', 'regex:/^[a-z0-9]*$/i']
        ]);
        try {
            $this->service->remove($request->get('id'));
            return back();
        } catch (\DomainException $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
