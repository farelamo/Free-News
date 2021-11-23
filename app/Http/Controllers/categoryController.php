<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{

    public function index()
    {
        $category = Category::all();
        return view('admin/news/category', compact('category'));
    }

    public function store(Request $request)
    {
        $dataCat = ['name' => $request->name, 'description' => $request->description];
        $Category->create($dataCat);
        return redirect('/admin/category');
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findorfail($id);
        $dataCat = ['name' => $request->name, 'description' => $request->description];
        $Category->update($dataCat);
        return redirect('/admin/category');
    }

    public function destroy($id)
    {
        $Category = Category::findorfail($id);
        Category::find($id)->delete();
        return redirect('/admin/category');
    }
}