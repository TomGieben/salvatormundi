<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGalleryCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhotoGalleryCategoriesController extends Controller
{
    public function index() {
        $categories = PhotoGalleryCategories::all();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request) {
        $slug = Str::slug($request->title);
        if(PhotoGalleryCategories::where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een categorie met de naam: '.$request->title.'');
        } else {
            PhotoGalleryCategories::create([
                'slug' => $slug,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', ''.$request->title.' succesvol toegevoegd.');
        }
    }

    public function update(Request $request, $categorie) {
        $slug = Str::slug($request->title);
        $categorie = PhotoGalleryCategories::where('slug', $categorie)->first();
        if(PhotoGalleryCategories::where('id', '!=', $categorie->id)->where('slug', $slug)->exists()) {
            return redirect()->back()->with('error', 'Er is al een item met de naam: '.$request->title.'');
        } else {
           $categorie->update([
                'slug' => $slug,
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', 'Succesvol bewerkt.');
        }
    }

    public function delete($categorie) {
        PhotoGalleryCategories::where('slug', $categorie)->delete();
        return redirect()->back()->with('success', 'Categorie succesvol verwijderd.');
    }
}
