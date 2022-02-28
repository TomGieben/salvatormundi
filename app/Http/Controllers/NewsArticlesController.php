<?php

namespace App\Http\Controllers;

use App\Models\NewsArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $slug = Str::slug($request->title);
        if(NewsArticles::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een gelijknamig artikel.');
        } else {
            $newsarticle = NewsArticles::create([
                'slug' => $slug,
                'title' => $request->title,
            ]);

            return redirect()->route('admin.newsarticles.edit', $newsarticle);
        }
        
    }

    public function update(Request $request, NewsArticles $newsarticle) {
        
    }

    public function delete(NewsArticles $newsarticle) {
        
    }
}
