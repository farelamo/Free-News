<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class userController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin/user/index', compact('user'));
    }
    
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $dataUser = ['is_verified' => $request->value];
        $user->update($dataUser);
        return redirect('/admin/user')->with('success', 'Data Berhasil diedit !!');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/admin/user')->with('success', 'User Berhasil dihapus !!');;
    }
}