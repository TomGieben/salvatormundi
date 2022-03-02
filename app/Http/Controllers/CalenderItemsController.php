<?php

namespace App\Http\Controllers;

use App\Models\CalendarItems;
use App\Models\NewsArticles;
use Illuminate\Http\Request;

class CalenderItemsController extends Controller
{
    public function index() {
        $calenderitems = CalendarItems::all();
        $newsarticles = NewsArticles::all();
        if(count($newsarticles) > 0) {
            $newsarticle = $newsarticles->random(1)->first();
        } else {
            $newsarticle = null;
        }

        return view('calenderitems.index',[
            'calenderitems' => $calenderitems,
            'newsarticle' => $newsarticle,
        ]);
    }
}
