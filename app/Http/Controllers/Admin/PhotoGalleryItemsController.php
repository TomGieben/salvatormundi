<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PhotoGalleryCategories;
use App\Models\PhotoGalleryItems;
use Illuminate\Http\Request;
use Str;
use Image;

class PhotoGalleryItemsController extends Controller
{
    public function index() {
        $categories = PhotoGalleryCategories::with('images')->get();

        return view('admin.photogallery.index',[
            'categories' => $categories,
        ]);
    }

    public function create() {
        $categories = PhotoGalleryCategories::all();

        return view('admin.photogallery.create',[
            'categories' => $categories,
        ]);
    }

    public function store(Request $request) {
        if(!$request->category) {
            return redirect()->back()->with('error', 'Je hebt geen categorie geselecteerd.');
        }

        $category = PhotoGalleryCategories::where('id', $request->category)->first();
        
        if($request->images) {
            foreach($request->file('images') as $key => $image) {    
                $newFileName = Str::random(10).'-'.$category->slug;    
                $input['file'] = $newFileName.'.png';
                
                $destinationPath = public_path('storage/img/photogallery');
        
                $imgFile = Image::make($image->getRealPath());
        
                $imgFile->resize(800, 3000, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['file']);
    
    
                PhotoGalleryItems::create([
                    'category_id' => $category->id,
                    'image' => $input['file'],
                ]);
            }
        }

        return redirect()->route('admin.photogallery.index')->with('success', 'De afbeeldingen zijn succesvol opgeslagen');
    }

    public function delete() {
        
    }
}
