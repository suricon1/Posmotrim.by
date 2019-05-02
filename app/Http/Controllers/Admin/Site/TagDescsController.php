<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\TagDesc\TagDescRequest;
use App\Models\Site\City;
use App\Models\Site\Countri;
use App\Models\Site\Tag;
use App\Models\Site\TagDesc;
use View;

class TagDescsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('tag_desc_active', ' active');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tag_descs.index', [
            'tagDescs'=>TagDesc::with('countri', 'city', 'tag')
                ->orderBy('id', 'desc')
                ->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag_descs.create', [
            'countris' => getArray(Countri::orderBy('name')->pluck('name', 'id')->all()),
            'citys' => getArray(City::orderBy('name')->pluck('name', 'id')->all()),
            'tags'     => getArray(Tag::orderBy('title')->pluck('title', 'id')->all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagDescRequest $request)
    {
        $countri = Countri::find($request->get('countri_id'));
        $city = City::find($request->get('city_id'));
        $tag = Tag::find($request->get('tag_id'));
        $info = $city
            ? $countri->name .' '. $city->name .' '. $tag->title
            : $countri->name .' '. $tag->title;

        TagDesc::add($tag->id, $city ? $city->id : 0, $countri->id, $info);
        return redirect()->route('tag_desc.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tagDesc = TagDesc::find($id);
        return view('admin.tag_descs.edit', [
            'countris' => getArray(Countri::orderBy('name')->pluck('name', 'id')->all()),
            'citys'    => getArray(City::orderBy('name')->where('countri_id', $tagDesc->countri_id)->pluck('name', 'id')->all()),
            'tags'     => getArray(Tag::orderBy('title')->pluck('title', 'id')->all()),
            'tagDesc'  => $tagDesc
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagDescRequest $request, $id)
    {
        $tagDesc = TagDesc::find($id);
        $tagDesc->edit($request->all());
        return redirect()->route('tag_desc.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TagDesc::find($id)->remove();
        return redirect()->route('tag_desc.index');
    }
}
