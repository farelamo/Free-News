<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource by newer news.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $news = News::where('is_posted', 1)->latest()->with('category:id,name')->paginate(6);

        return view('user.news.latest', compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $news = News::where('slug', $slug)->with([
            'author.profile:id,name,picture,bio',
            'category:id,name'
        ])->firstOrFail();

        $prevNewsId = null;
        $nextNewsId = null;

        $newsIds = News::get(['id']);
        foreach ($newsIds as $k => $v) {
            if ($v['id'] == $news->id) {
                if ($k > 0) {
                    $prevNewsId = $newsIds[$k - 1];
                }
                if ($k < count($newsIds) - 1) {
                    $nextNewsId = $newsIds[$k + 1];
                }
                break;
            }
        }

        $prevNews = $prevNewsId != null ? (
            News::where([
                    'id' => $prevNewsId->id
                ])->get([
                    'id', 'title', 'image', 'slug'
                ])[0]
        ) : null;

        $nextNews = $nextNewsId != null ? (
            News::where([
                    'id' => $nextNewsId->id
                ])->get([
                    'id', 'title', 'image', 'slug'
                ])[0]
        ) : null;

        $categories = Category::select('name', 'slug')->addSelect([
            'news_count' => News::selectRaw('COUNT(*)')
                ->whereColumn('category_id', 'categories.id')
            ])
            ->orderBy('name')
            ->get();


        $recent = News::latest()
            ->limit(4)
            ->get([
                'id', 'title', 'slug',
                'image', 'updated_at'
            ]);

        return view('user.news.show', compact([
            'news',
            'prevNews', 'nextNews',
            'categories', 'recent'
        ]));
    }

    public function likePost(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:news'
        ]);

        $news = News::find($request->input('id'));
        $news->like_count++;
        $news->save();

        return $news->like_count;
    }
}
