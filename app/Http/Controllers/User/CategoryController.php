<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    private $categories;

    public function __construct() {
        $categories = Category::select('name', 'slug')->addSelect([
            'news_count' => News::selectRaw('COUNT(*)')
                ->whereColumn('category_id', 'categories.id')
            ])
            ->orderBy('name')
            ->get();
        $this->categories = $categories;
    }

    public function index()
    {
        $news = News::where('is_posted', 1)->latest()->with('category:id,name')->paginate(6);

        return view('user.news.category', [
            'categories' => $this->categories,
            'news' => $news
        ]);
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $news = News::where([
            ['is_posted', 1],
            ['category_id', $category->id]
        ])->latest()->with('category:id,name')->paginate(6);

        return view('user.news.category', [
            'categories' => $this->categories,
            'news' => $news
        ]);
    }
}
