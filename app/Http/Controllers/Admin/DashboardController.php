<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visits;
use App\Models\User;
use App\Models\PhotoGalleryCategories;
use App\Models\PhotoGalleryItems;
use App\Models\Newsletters;
use App\Models\NewsArticles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories = PhotoGalleryCategories::count();
        $images = PhotoGalleryItems::count();
        $newsLetters = Newsletters::count() - 1;
        $users = User::all();
        $newsArticles = NewsArticles::count();

        $visitsTimes = [
            'Vandaag' => Visits::whereDay('updated_at', '=', date('d'))->get(),
            'Deze maand' => Visits::whereMonth('updated_at', '=', date('m'))->get(),
            'Afgelopen jaar' => Visits::whereYear('updated_at', '=', date('Y'))->get(),
            'Totaal' => Visits::all(),
        ];

        $pages = [];

        foreach($visitsTimes as $key=>$time){
            foreach($time as $visit) {
                $page = parse_url($visit->page);
                if(!isset($page['path'])) {
                    $page['path'] = 'home';
                }
                if(str_contains($page['path'], '/')){
                    $page['path'] = str_replace('/', '', $page['path']);
                }

                if(in_array($page['path'], $pages)) {
                    $pages[$key][$page['path']]['views'] = $pages[$key][$page['path']]['views']++;
                } else {
                    $pages[$key][$page['path']]['views'] = 1;
                }
            }
        }

        return view('admin.dashboard.index',[
            'visits' => $pages,
            'users' => $users,
            'imgCount' => $images,
            'imgCatCount' => $categories,
            'newsLetterTotal' => $newsLetters,
            'newsArticles' => $newsArticles,
        ]);
    }
}
