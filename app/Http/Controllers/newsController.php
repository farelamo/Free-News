<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class newsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return view('admin/news/news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataNews = ['tittle' => $request->tittle, 'image' => $request->image, 'content' => $request->content];
        $News->create($dataNews);
        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $News = News::findorfail($id);
        $dataNews = ['tittle' => $request->tittle, 'image' => $request->image, 'content' => $request->content];
        $News->update($dataNews);
        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $News = News::findorfail($id);
        News::find($id)->delete();
        return redirect('/admin/news');
    }
}
