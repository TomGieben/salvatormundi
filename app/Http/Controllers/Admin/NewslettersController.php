<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletters;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewslettersController extends Controller
{
    public function index() {
        $newsletters = Newsletters::all();

        return view('admin.newsletters.index', [
            'newsletters' => $newsletters,
        ]);
    }

    public function store(Request $request) {
        $slug = Str::slug($request->title);
        if(Newsletters::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een artikel met de naam: '.$request->title.'');
        } else {
            $slug = Str::slug($request->title);
            $file = $request->file('file');
            $filename = $slug.'.'.pathinfo($file->getClientOriginalName() , PATHINFO_EXTENSION);
            $path = $file->storeAs('public/newsletters', $filename);
            
            $newsletters = Newsletters::create([
                'slug' => $slug,
                'title' => $request->title,
                'file' => $filename,
            ]);
            return redirect(route('admin.newsletters.index'));
        }
    }

    public function delete($newsletter) {
        $letter = Newsletters::where('slug', $newsletter)->first();
        unlink(storage_path('app/'.$letter->file));
        $letter->delete();
        return redirect()->back()->with('success', 'Artikel succesvol verwijderd.');
    }
}
