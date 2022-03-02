<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGalleryItems;

class AboutusController extends Controller
{
    public function index(){
        $images = PhotoGalleryItems::all();
        $rand = rand(0, ($images->count()-1));
        if(count($images) > 0) {
            $images = $images->random(5)->toArray();
        } else {
            $images = null;
        }
        return view('aboutus.index', [
            'images' => $images,
            'rand' => $rand,
        ]);
    }
}
