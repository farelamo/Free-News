<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $trendingNow = News::where('is_posted', 1)
                            ->orderByDesc('like_count')
                            ->latest()
                            ->take(9)
                            ->with('category:id,name')
                            ->get();
        $weeklyNews = $trendingNow->take(5);
        $recentNews = News::latest()->take(5)->get();

        return view('user.home', compact([
            'trendingNow', 'weeklyNews', 'recentNews'
        ]));
    }
}
