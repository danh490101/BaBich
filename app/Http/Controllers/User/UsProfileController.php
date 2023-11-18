<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Province;
use App\Models\Skin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsProfileController extends Controller
{
    public const PREFIX_IMAGE_URL = 'public/image/user';
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     */
    public function edit($id)
    {
        //
        $categories = Category::all();
        $brands = Brand::all();
        $skins = Skin::all();
        $user = User::findOrFail($id);
        $provinces = Province::orderBy('name', 'asc')->get();
        // dd($user);
        return view('user.user-profile.edit', compact('user', 'categories', 'brands', 'skins', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $userUpdate = $request->validate([
            'phone' => [
                'required'
            ],
            'address' => [
                'required'
            ],
            'fileUpload' => [
                'nullable',
                'image'
            ],
            'ward_id' =>[
                'required'
            ]

        ]);
        if ($request->file('fileUpload')) {
            $imageUrl = $request->file('fileUpload')->store(self::PREFIX_IMAGE_URL);
            $imageUrl = Storage::url($imageUrl);
            $user['avatar'] = $imageUrl;
        }
        $user->update($userUpdate);
        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     */
    public function destroy(User $user)
    {
        //
    }
}
