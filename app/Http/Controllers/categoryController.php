<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
// Use Alert;

class categoryController extends Controller
{
    
    public function index()
    {
        $category = Category::all();
        return view('admin/news/category', compact('category'));
    }

    public function store(Request $request)
    {
        $Category = Category::create(['name' => $request->name, 'description' => $request->description]);
        $Category->save();
        return redirect('/admin/category')->with('Success', 'Data berhasil ditambahkan ! !');
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findorfail($id);
        $dataCat = ['name' => $request->name, 'description' => $request->description];
        $Category->update($dataCat);
        return redirect('/admin/category')->with('success', 'Data berhasil diupdate ! !');
    }

    public function destroy($id)
    {
        $Category = Category::findorfail($id);
        Category::find($id)->delete();
        return redirect('/admin/category')->with('success', 'Data berhasil dihapus ! !');
    }
}
