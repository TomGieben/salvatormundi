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
        $pinnedArticle = NewsArticles::where('pin', true)->first();
        $images = PhotoGalleryItems::take(5)->get()->toArray();

        return view('welcome', [
            'pinnedArticle' => $pinnedArticle,
            'images' => $images,
        ]);
    }
}
