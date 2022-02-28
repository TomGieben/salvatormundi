<?php

namespace App\Http\Controllers;

use App\Models\Newsletters;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewslettersController extends Controller
{
    public function index() {
        return view('admin.newsletters.index');
    }

    public function edit() {
        
    }

    public function store(Request $request) {
        $slug = Str::slug($request->title);
        // $newsarticle = Newsletters::create([
        //     'slug' => $slug,
        //     'title' => $request->title,
        //     'file' => $file,
        // ]);
        dd($slug);
        // if(Newsletters::where('slug', $slug)->exists()) {
        //     return redirect()->back()->with('error', 'Er is al een gelijknamig artikel.');
        // } else {
            
        //     // return redirect()->route('admin.newsarticles.edit', $newsarticle->slug);
        // }
    }

    public function update() {
        
    }

    public function delete() {
        
    }
}
