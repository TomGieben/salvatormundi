<?php

namespace App\Http\Controllers;

use App\Models\NewsArticles;
use App\Models\PhotoGalleryItems;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        $newsArticles = NewsArticles::latest('created_at')->take(3)->get();
        $pinnedArticle = NewsArticles::where('pin', true)->first();
        $images = PhotoGalleryItems::all();
        if(count($images) > 0) {
            $images = $images->random(5)->toArray();
        } else {
            $images = null;
        }

        return view('welcome', [
            'newsArticles' => $newsArticles,
            'pinnedArticle' => $pinnedArticle,
            'images' => $images,
        ]);
    }
}
