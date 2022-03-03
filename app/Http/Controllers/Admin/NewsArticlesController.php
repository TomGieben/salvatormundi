<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsArticles;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class NewsArticlesController extends Controller
{
    public function index() {
        $newsarticles = NewsArticles::all();

        return view('admin.newsarticles.index', [
            'newsarticles' => $newsarticles,
        ]);
    }

    public function edit($newsarticle) {
        $newsarticle = NewsArticles::where('slug', $newsarticle)->first();

        return view('admin.newsarticles.edit', [
            'newsarticle' => $newsarticle,
        ]);
    }

    public function store(Request $request) {
        $slug = Str::slug($request->title);
        if(NewsArticles::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een artikel met de naam: '.$request->title.'');
        } else {
            $newsarticle = NewsArticles::create([
                'slug' => $slug,
                'title' => $request->title,
            ]);

            return redirect()->route('admin.newsarticles.edit', $newsarticle->slug);
        }
    }

    public function update(Request $request, $newsarticle) {
        $pinnedArticle= NewsArticles::where('pin', 1)->first();
        $newsarticle = NewsArticles::where('slug', $newsarticle)->first();
        $slug = Str::slug($request->title);
        $imagepaths = [];
        $attributes = [];

        if(!$request->description) {
            return redirect()->back()->with('error', 'Je hebt geen tekst ingevuld.');
        }

        if($request->images) {
            foreach($request->file('images') as $key => $image) {
                $count = $key + 1;
                
                $input['file'] = ''. $slug .'-'.$count.'.png';
                
                $destinationPath = public_path('storage/img/newsarticles');
        
                $imgFile = Image::make($image->getRealPath());
        
                $imgFile->resize(800, 3000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['file']);
    
    
                $imagepaths[$key] = $input['file'];
            }

            $attributes['images'] = json_encode($imagepaths);
        } elseif($newsarticle->images == null) {
            return redirect()->back()->with('error', 'Je moet een afbeelding toevoegen.');
        }

        if($request->pin == "on"){
            if($newsarticle->pin){
                $pin = 1;
            } else {
                if($pinnedArticle){
                    NewsArticles::where('id', $pinnedArticle->id)->update(['pin' => 0]);
                }
                $pin = 1; 
            }
        } else {
            $pin = 0;
        }

        $attributes += [
            'slug' =>  $slug,
            'title' => $request->title,
            'description' => $request->description,
            'writer' => $request->writer,
            'pin' => $pin,
        ];

        $newsarticle->update($attributes);

        return redirect()->route('admin.newsarticles.index')->with('success', ''.$request->title.', Is succesvol opgeslagen');
    }

    public function delete($newsarticle) {
        NewsArticles::where('slug', $newsarticle)->delete();
        return redirect()->back()->with('success', 'Artikel succesvol verwijderd.');
    }
}
