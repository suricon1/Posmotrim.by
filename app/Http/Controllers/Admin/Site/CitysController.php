<?php

namespace App\Http\Controllers\Admin\Site;

use App\Jobs\ImageProcessing;
use App\Models\Site\Countri;
use App\Models\Site\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use View;

class CitysController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('city_active', ' active');
    }

//===============================================
    public function index()
    {
        $citys = City::with('countri')->orderBy('name')->paginate(20);
        return view('admin.citys.index', ['citys'=>$citys]);
    }

//===============================================
    public function create()
    {
        return view('admin.citys.create', [
            'countris' => getArray(Countri::orderBy('name')->pluck('name', 'id')->all()),
            'region_template' =>  view('admin.components._text_region_template')->render()
        ]);
    }

//===============================================
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>  'required|max:100',
            'title' =>  'required|max:255',
            'countri_id' =>  'required',
        ]);

        $city = City::add($request->all());
        $city->setCountri($request->get('countri_id'));
        $city->toggleLions($request->input(['is_lions']));

        $this->imageServis($city, $request->file('image'));
        return redirect()->route('city.index');
    }

//===============================================
    public function edit($id)
    {
        return view('admin.citys.edit', [
            'city' => City::find($id),
            'countris' => getArray(Countri::orderBy('name')->pluck('name', 'id')->all())
        ]);
    }

//=================================================
    public function update(Request $request, $id)
    {
        $city = City::find($id);

        $this->validate($request, [
            'name' =>  'required|max:100',
            'title' =>  'required|max:255',
            'countri_id' =>  'required',
            'slug' =>  [
                'required',
                Rule::unique('citys')->ignore($city->id),
            ]
        ]);

        $city->edit($request->all());
        $city->setCountri($request->get('countri_id'));
        $city->toggleLions($request->input(['is_lions']));

        $this->imageServis($city, $request->file('image'));
        return redirect()->route('city.index');
    }

//===============================================
    public function destroy($id)
    {
        $city = City::find($id);
        if ($city->posts->isNotEmpty()){
            return redirect()->route('city.index')->withErrors(['Нельзя удалить этот город!']);
        }
        $city->remove();
        return redirect()->route('city.index');
    }

//===============================================
    public function imageServis($city, $image)
    {
        try {
            $city->uploadImage($image);
            dispatch(new ImageProcessing($city));
        } catch (\Exception $e) {
            return back()->withErrors([$e->getMessage()]);
        }
    }
}
