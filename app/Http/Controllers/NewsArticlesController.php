<?php

namespace App\Http\Controllers;

use App\Models\NewsArticles;
use Illuminate\Http\Request;

class NewsArticlesController extends Controller
{
    public function index() {
        $newsarticles = NewsArticles::all();

        return view('admin.newsarticles.index', [
            'newsarticles' => $newsarticles,
        ]);
    }

    public function edit(NewsArticles $newsarticle) {
        
    }

    public function store(Request $request) {
        
    }

    public function update(Request $request, NewsArticles $newsarticle) {
        
    }

    public function delete(NewsArticles $newsarticle) {
        
    }
}
