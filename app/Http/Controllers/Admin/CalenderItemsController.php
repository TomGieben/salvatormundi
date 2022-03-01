<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalendarItems;
use App\Models\NewsArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CalenderItemsController extends Controller
{
    public function index() {
        $items = CalendarItems::with('newsarticle')->get();
        $newsarticles = NewsArticles::all();

        return view('admin.calendaritems.index', [
            'items' => $items,
            'newsarticles' => $newsarticles,
        ]);
    }

    public function store(Request $request) {
        $slug = Str::slug($request->title);
        if(CalendarItems::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een item met de naam: '.$request->title.'');
        } else {
            $calendaritem = CalendarItems::create([
                'slug' => $slug,
                'title' => $request->title,
                'description' => $request->description,
                'start_at' => $request->startdate,
                'news_article_id' => $request->newsarticle,
            ]);

            return redirect()->back()->with('success', ''.$calendaritem->title.' is succesvol toegevoegd.');
        }
    }

    public function update(Request $request, $calendaritem) {
        $slug = Str::slug($request->title);
        $calendaritem = CalendarItems::where('slug', $calendaritem)->first();
        if(CalendarItems::where('id', '!=', $calendaritem->id)->where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een item met de naam: '.$request->title.'');
        } else {
           $calendaritem->update([
                'slug' => $slug,
                'title' => $request->title,
                'description' => $request->description,
                'start_at' => $request->startdate,
                'news_article_id' => $request->newsarticle,
            ]);

            return redirect()->back()->with('success', 'Succesvol bewerkt.');
        }
    }

    public function delete($calendaritem) {
        CalendarItems::where('slug', $calendaritem)->delete();
        return redirect()->back()->with('success', 'Item succesvol verwijderd.');
    }
}
