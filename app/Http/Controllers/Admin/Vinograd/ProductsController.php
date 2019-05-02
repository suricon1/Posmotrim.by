<?php

namespace App\Http\Controllers\Admin\Vinograd;

use App\Http\Requests\Admin\Vinograd\Product\ProductRequest;
use App\Jobs\GalleryProcessing;
use App\Jobs\ImageProcessing;
use App\Models\Vinograd\Category;
use App\Models\Vinograd\Modification;
use App\Models\Vinograd\Product;
use Illuminate\Http\Request;
use View;

class ProductsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('product_active', ' active');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vinograd.product.index', [
                'products' => Product::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinograd.product.create', [
            'categorys' => Category::orderBy('name')->pluck('name', 'id')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $product = Product::add($request);

            $product->toggleStatus($request->get('status'));
            $product->toggleFeatured($request->get('is_featured'));
            $product->setCategory($request->get('category_id'));

            $this->imageServis($request, $product);

            return ($request->ajax()) ? ['succes' => 'OK'] : redirect()->route('products.index');
        } catch (\Exception $e) {
            //return back()->withErrors([$e->getMessage()]);
            return ['errors' => $e->getMessage()];
        }
    }

    public function edit($id)
    {
        return view('admin.vinograd.product.edit', [
            'product' => Product::find($id),
            'categorys' => Category::orderBy('name')->pluck('name', 'id')->all(),
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);

            $product->edit($request);
            $product->toggleStatus($request->get('status'));
            $product->toggleFeatured($request->get('is_featured'));
            $product->setCategory($request->get('category_id'));

            $this->imageServis($request, $product);

            return($request->ajax()) ? ['succes' => 'OK'] : redirect()->route('products.index');
        } catch (\Exception $e) {
            //return back()->withErrors([$e->getMessage()]);
            return ['errors' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        Product::find($id)->remove();
        return redirect()->route('products.index');
    }

    public function toggle($id)
    {
        $product = Product::find($id);
        $product->toggledsStatus();

        return redirect()->back();
    }

//========= ModificationAdd ======================================
    public function modificationAdd(Request $request)
    {
        //return ['succes' => $request->all()];
        try {
            $modification = Modification::create($request->all());
            //$template = view('admin.vinograd.product._modification_input_item', ['modification' => $modification]);
            return ($request->ajax())
                ? ['succes' => view('admin.vinograd.product._modification-input-item', ['modification' => $modification])->render()]
                : redirect()->back();
        } catch (\Exception $e) {
            return ['errors' => $e->getMessage()];
        }
    }

    public function imageServis(Request $request, $product)
    {
        try {
            $product->uploadImage($request->file('image'));
            $product->removeImageFromGallery($request->get('removeGallery'));
            $product->uploadGallery($request->ajax() ? $request->file('images') : $request->file('gallery'));

            if($request->file('image') != null) {
                dispatch(new ImageProcessing($product));
                //$product->fitImage();
            }
            if($request->file('images') != null || $request->file('gallery') != null){
                dispatch(new GalleryProcessing($product));
                //$product->fitGallery();
            }
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
