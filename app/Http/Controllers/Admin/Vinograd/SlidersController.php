<?php

namespace App\Http\Controllers\Admin\Vinograd;

use App\Http\Requests\Admin\Vinograd\Slider\SliderRequest;
use App\Jobs\ImageProcessing;
use App\Models\Vinograd\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;

class SlidersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('slider_active', ' active');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vinograd.slider.index', [
            'sliders' => Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vinograd.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = Slider::add($request->all());
        $this->imageServis($request, $slider);

        return redirect()->route('sliders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.vinograd.slider.edit', [
            'slider' => Slider::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::find($id);
        $slider->edit($request->all());
        $this->imageServis($request, $slider);

        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::find($id)->remove();
        return redirect()->route('sliders.index');
    }

    public function imageServis(Request $request, $slider)
    {
        try {
            $slider->uploadImage($request->file('image'));
            dispatch(new ImageProcessing($slider));
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }

}
