<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Faker\Factory as Faker;

class AboutController extends Controller
{
    public function index()
    {
        $faker = Faker::create();
        $mainImg = 'https://images.unsplash.com/photo-1455849318743-b2233052fcff?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=869&q=80';
        $adsImg = 'https://s3.envato.com/files/181151801/jpg/300x600_Half_Page_Banner.jpg';
        $content = implode($faker->paragraphs(13));
        return view('user.about', compact('mainImg', 'adsImg', 'content'));
    }
}
