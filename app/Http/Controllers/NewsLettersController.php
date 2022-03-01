<?php

namespace App\Http\Controllers;

use App\Models\Newsletters;
use Illuminate\Http\Request;

class NewsLettersController extends Controller
{
    public function index(){
        $newsletters = Newsletters::all();
        return view('newsletters.index', [
            'newsletters' => $newsletters,
        ]);

        return view('newsletters.index');
    }

    public function download($file){
        return response()->download(storage_path('app/public/newsletters/'.$file), $file, [route('newsletters.index')]);
    }
}
