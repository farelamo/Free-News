<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource by news category.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        //
    }

    /**
     * Display a listing of the resource by newer news.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $news = News::with('category:id,name')->paginate(6);

        return view('user.news.latest', [
            'news' => $news
        ]);
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
}
