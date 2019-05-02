<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Countri\CountriRequest;
use App\Jobs\ImageProcessing;
use App\Models\Site\Countri;
use View;

class CountrisController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('countri_active', ' active');
    }

    public function index()
    {
        $countris = Countri::orderBy('name')->paginate(20);
        return view('admin.countris.index', ['countris' => $countris]);
    }

    public function create()
    {
        return view('admin.countris.create', [
            'region_template' =>  view('admin.components._text_region_template')->render()
        ]);
    }

    public function store(CountriRequest $request)
    {
        $country = Countri::add($request->all());
        $country->toggleLions($request->input(['is_lions']));

        $this->imageServis($country, $request->file('image'));

        return redirect()->route('countri.index');
    }

    public function edit($id)
    {
        $countri = Countri::find($id);
        return view('admin.countris.edit', ['countri' => $countri]);
    }

    public function update(CountriRequest $request, $id)
    {
        $countri = Countri::find($id);
        $countri->edit($request->all());
        $countri->toggleLions($request->input(['is_lions']));

        $this->imageServis($countri, $request->file('image'));

        return redirect()->route('countri.index');
    }

    public function destroy($id)
    {
        $countri = Countri::find($id);
        if ($countri->posts->isNotEmpty()){
            return redirect()->route('countri.index')->withErrors(['Нельзя удалить эту страну!']);
        }
        $countri->remove();
        return redirect()->route('countri.index');
    }

    public function imageServis($countri, $image)
    {
        try {
            $countri->uploadImage($image);
            dispatch(new ImageProcessing($countri));
//            $countri->fitImage();
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
