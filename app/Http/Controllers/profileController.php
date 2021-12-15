<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class profileController extends Controller
{
    public function index(){
        $eUser = Auth::user();
        $data = Profile::find($eUser->profile_id);
        return view('admin/profile/index', compact('data', 'eUser'));
    }

    public function update(Request $request, Profile $profile, User $user)
    {
        if($request->has('picture')) {
            $picture = $profile->picture;
            if($picture != ''){File::delete("images/profile/" . $picture);}
            
            $image_name = time() . '.jpg';
            $imageProfile = $request->picture;
            $imageProfile->move(public_path() . '/images/profile/', $image_name);
            $dataProfile = ['picture' => $image_name];
        } else {
            $dataProfile = [
                'name' => $request->name,
                'username' => $request->username, 
                'bio' => $request->bio
            ];
            $dataUser = ['email' => $request->email];
            $user->where('id', Auth::user()->id)->update($dataUser);
        }
        $profile->where('id' ,Auth::user()->profile_id)->update($dataProfile);
        return back()->withInput()->with('success', 'Data berhasil diupdate ! !');
    }
}