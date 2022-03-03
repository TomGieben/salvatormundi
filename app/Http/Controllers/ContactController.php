<?php

namespace App\Http\Controllers;

use App\Models\CalendarItems;
use App\Models\NewsArticles;
use app\Mail\ClientMail;
use app\Mail\AdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        if(!$this->spam($request->message)){
            if(!$request->filled([
                'name',
                'email',
                'subject',
                'message',
            ])) {
                return back()->with('error', 'Niet alle velden zijn ingevuld')->withInput($request->input());
            }
    
            if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
                return back()->with('error', ''.$request->email.' is geen geldige email.')->withInput($request->input());
            }
    
            $data = [
                'name' =>  $request->name, 
                'message' => $request->message, 
                'email' => $request->email, 
                'subject' => $request->subject
            ];
    
            Mail::to('Tinokolk@gmail.com')->send(new AdminMail($data));
            // Mail::to($this->text()['email'])->send(new AdminMail($data));
            Mail::to($request->email)->send(new ClientMail($data));
    
            return back()->with('success', 'Het bericht is verzonden. We proberen zo snel mogelijk contact op te nemen.');
        }
        return redirect()->back()->with('success', 'Hallo '.$request->name.' We hebben jouw mail verstuurt en zullen zo snel mogelijk volgend jaar reageren');
    }

    public function spam($string) {
        if(strlen($string) < 25 || strlen($string) > 1500) {
            return true;
        } else {
            return false;
        }

        if(!str_contains($string, ' ')) {
            return true;
        } else {
            return false;
        }

        return true;
    }
}
