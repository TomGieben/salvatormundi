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
        $file = $request->file('file');
        $filename = $slug.'.'.pathinfo($file->getClientOriginalName() , PATHINFO_EXTENSION);
        $path = $file->storeAs('public/newsletters', $filename);
        $newsarticle = Newsletters::create([
            'slug' => $slug,
            'title' => $request->title,
            'file' => $filename,
        ]);
    }

    public function update() {
        
    }

    public function delete() {
        
    }

    private function download($file){
        return response()->download(storage_path('/storage/app/files/'.$file));
    }
}
