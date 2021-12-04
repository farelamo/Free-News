<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{

    public function show($id)
    {
        $data = profile::find($id);
        $eUser = User::where('profile_id', $id)->first();    
        return view('admin/profile/index', compact('data', 'eUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $attr = $request->all();
        if($request->file('picture')) {
            $photo = $request->file('picture');
            $photoUrl = $photo->storeAs('foto', "{$request->name}.{$photo->extension()}");
        } else {
            $photoUrl = $profile->picture;
        }
        $attr['picture']=$photoUrl;
        // dd($attr);
        $profile->update($attr);
        return back()->withInput();
    }

    public function destroy($id)
    {
        //
    }
}