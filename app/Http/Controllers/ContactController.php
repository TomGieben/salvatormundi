<?php

namespace App\Http\Controllers;

use App\Models\CalendarItems;
use App\Models\NewsArticles;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $calenderitems = CalendarItems::all();
        $newsarticles = NewsArticles::all();
        if(count($newsarticles) > 0) {
            $newsarticle = $newsarticles->random(1)->first();
        } else {
            $newsarticle = null;
        }

        return view('contact.index', [
            'calenderitems' => $calenderitems,
            'newsarticle' => $newsarticle,
        ]);
    }

    public function sendmail(Request $request){
        if($this->spam($request->description)){
            //yes
            if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                return redirect()->back()->with('error', ''.$request->email.' is geen geldige email.')->withInput($request->input());
            }
        } else {
            //neeeee
        }
        // dd($request);
        return redirect()->back()->with('success', 'Hallo '.$request->name.' We hebben jouw mail verstuurt en zullen zo snel mogelijk volgend jaar reageren');
    }

    public function spam($string) {
        if(strlen($string) < 25 || strlen($string) > 1500) {
            return true;
        } else {
            return false;
        }

        if(str_contains($string, ' ')) {
            return true;
        } else {
            return false;
        }

        return true;
    }
}
