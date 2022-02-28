<?php

namespace App\Http\Controllers;

use App\Models\CalendarItems;
use App\Models\NewsArticles;
use Illuminate\Http\Request;

class CalenderItemsController extends Controller
{
    public function index() {
        $items = CalendarItems::all();
        $newsarticles = NewsArticles::all();

        return view('admin.calendaritems.index', [
            'items' => $items,
            'newsarticles' => $newsarticles,
        ]);
    }

    public function edit() {
        
    }

    public function store(Request $request) {
        dd($request);
    }

    public function update() {
        
    }

    public function delete() {
        
    }
}
