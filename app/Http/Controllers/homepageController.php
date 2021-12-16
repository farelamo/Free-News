<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\News;
use App\Models\Category;

class homepageController extends Controller
{
    public function index()
    {
        $dataUser = User::count();
        $dataNews = News::count();
        $dataCat = Category::count();
        return view('admin/home/index', compact('dataUser', 'dataNews', 'dataCat'));
    }
}