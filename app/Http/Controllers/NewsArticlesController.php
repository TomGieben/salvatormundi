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

    public function edit($newsarticle) {
        $newsarticle = NewsArticles::where('slug', $newsarticle)->first();

        return view('admin.newsarticles.edit', [
            'newsarticle' => $newsarticle,
        ]);
    }

    public function store(Request $request) {
        $slug = Str::slug($request->title);
        if(NewsArticles::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een artikel met de naam: '.$request->title.'');
        } else {
            $newsarticle = NewsArticles::create([
                'slug' => $slug,
                'title' => $request->title,
            ]);

            return redirect()->route('admin.newsarticles.edit', $newsarticle->slug);
        }
    }

    public function update(Request $request, NewsArticles $newsarticle) {
        
    }

    public function delete(NewsArticles $newsarticle) {
        
    }
}
