<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skin;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class SkinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skins = Skin::all();
        // dd($categories);
        return view('admin.skins.index', compact('skins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.skins.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->request->all();
        //B2: validation
        $skin = $request->validate([
            'name' => 'required|string|min:1'

        ]);
        //dd($category);
        $skin = Skin::create($skin);
        return redirect()->route('admin.skins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function show(Skin $skin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function edit(Skin $skin)
    {
        //
        $skin = Skin::findOrFail($skin->id);
        return view('admin.skins.edit', compact('skin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skin $skin)
    {
        //
        $skin = Skin::findOrFail($skin->id);
        $categoryUpdate = $request->validate([
            'name' => [
                'required',
                Rule::unique('skins')->ignore($skin->id),
            ],
        ]);
        $skin->update($categoryUpdate);

        return redirect()->route('admin.skins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skin $skin)
    {
        //
        $skin = Skin::findOrFail($skin->id);
        $skin->delete();
        return redirect()->route('admin.skins.index');
    }
}
