<?php

namespace App\Http\Controllers;

use App\Models\NewsArticles;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index()
    {
        $pinnedArticle = NewsArticles::where('pin', true)->first();
        return view('welcome', [
            'pinnedArticle' => $pinnedArticle,
        ]);
    }
}
