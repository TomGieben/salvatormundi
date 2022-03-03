<?php

namespace App\Http\Controllers;

use App\Models\PhotoGalleryCategories;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function index() {
        $categories = PhotoGalleryCategories::with('images')->get();

        return view('photogallery.index', [
            'categories' => $categories,
        ]);
    }
}
