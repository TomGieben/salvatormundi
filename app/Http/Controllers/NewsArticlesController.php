<?php

namespace App\Http\Controllers;

use App\Models\NewsArticles;
use Illuminate\Http\Request;

class NewsArticlesController extends Controller
{
    public function index() {
        $newsArticles = NewsArticles::all();

        return view('newsarticles.index',[
            'newsArticles'=> $newsArticles,
        ]);
    }

    public function show($newsarticle) {
        $newsarticle = NewsArticles::where('slug', $newsarticle)->first();
        $realatedArticles = NewsArticles::where('id', '!=', $newsarticle->id)->take(3)->get();

        return view('newsarticles.show',[
            'newsarticle'=> $newsarticle,
            'realatedArticles' => $realatedArticles,
        ]);
    }
}
