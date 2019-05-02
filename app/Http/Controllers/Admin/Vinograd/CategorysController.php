<?php

namespace App\Http\Controllers\Admin\Vinograd;

use App\Models\Vinograd\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use View;

class CategorysController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('category_active', ' active');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vinograd.category.index', [
            'categorys' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinograd.category.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|max:100',
            'title' =>  'required|max:255',
        ]);

        $category = Category::add($request->all());

        return redirect()->route('categorys.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.vinograd.category.edit', [
            'category' => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request, [
            'name' =>  'required|max:100',
            'title' =>  'required|max:255',
            'slug' =>  [
                'required',
                Rule::unique('vinograd_categorys')->ignore($category->id),
            ]
        ]);

        $category->edit($request->all());

        return redirect()->route('categorys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('categorys.index');
    }
}
