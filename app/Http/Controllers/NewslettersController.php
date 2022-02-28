<?php

namespace App\Http\Controllers;

use App\Models\Newsletters;
use Illuminate\Http\Request;

class NewslettersController extends Controller
{
    public function index() {
        return view('admin.newsletters.index');
    }

    public function edit() {
        
    }

    public function store(Request $request) {
        dd($request);

    }

    public function update() {
        
    }

    public function delete() {
        
    }
}
