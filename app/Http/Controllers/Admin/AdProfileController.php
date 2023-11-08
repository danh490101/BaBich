<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public const PREFIX_IMAGE_URL = 'public/image/user';
    public function index()
    {
        return  view('admin.profile.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     */
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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('admin.profile.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     */
    public function update(Request $request, $id)
    {
        //
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
            ]

        ]);
        if ($request->file('fileUpload')) {
            $imageUrl = $request->file('fileUpload')->store(self::PREFIX_IMAGE_URL);
            $imageUrl = Storage::url($imageUrl);
            $user['avatar'] = $imageUrl;
        }
        $user->update($userUpdate);
        return redirect()->route('admin.profile.edit', $id)->with('success', 'Cập nhật thành công!');
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
