<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class newsController extends Controller
{

    public function index()
    {
        $news = News::all();
        $category = Category::all();
        return view('admin/news/news', compact('news', 'category'));
    } 

    public function edit($id){
        $news = News::find($id);
        $category = Category::all();
        $catItem = Category::find($news->category_id);
        return view('admin/news/edit', compact('news', 'category', 'catItem'));
    }

    public function store(Request $request)
    {
        if ($request->has('image')){
            $imageCat = $request->image;
            $image_name = time() . '.jpg';
            $imageCat->move(public_path() . '/images/News/', $image_name);
            $category = [
                    'title' => $request->title,
                    'image' => $image_name,
                    'content' => $request->content,
                    'like_count' => 0,
                    'is_posted' => $request->publish,
                    'category_id' => $request->category,
                    'author_id' => Auth::user()->id
            ];
                
        }else {
            $category=[
                'title' => $request->title,
                'image' => '',
                'content' => $request->content,
                'like_count' => 0,
                'is_posted' => $request->publish,
                'category_id' => $request->category,
                'author_id' => Auth::user()->id
            ];
        }
        News::create($category);
        return redirect('/admin/news')->with('success', 'Data Berhasil ditambah !!');
    }

    public function update(Request $request, $id)
    {
        $News = News::findorfail($id);
        if ($request->has('image')){
            $picture = $News->image;
            File::delete("images/News/" . $picture);
            
            $imageCat = $request->image;
            $image_name = time() . '.jpg';
            $imageCat->move(public_path() . '/images/News/', $image_name);
            $dataNews = [
                'title' => $request->title,
                'image' => $image_name,
                'content' => $request->content,
                'like_count' => $News->like_count,
                'is_posted' => $request->publish,
                'category_id' => $request->category,
                'author_id' => Auth::user()->id
            ];

       }else {
            $dataNews = [
                'title' => $request->title,
                'image' => '',
                'content' => $request->content,
                'like_count' => $News->like_count,
                'is_posted' => $request->publish,
                'category_id' => $request->category,
                'author_id' => Auth::user()->id
            ];
       }
        $News->update($dataNews);
        return redirect('/admin/news')->with('success', 'Data Berhasil diedit !!');;
    }

    public function destroy($id)
    {
        $News = News::findorfail($id);
        if ($News->image != ''){
            $picture = $News->image;
            File::delete("images/News/" . $picture);
        }
        News::find($id)->delete();
        return redirect('/admin/news')->with('success', 'Data Berhasil dihapus !!');
    }
}