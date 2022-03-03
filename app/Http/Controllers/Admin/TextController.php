<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Text;


class TextController extends Controller
{
    public function index() {
        $texts = Text::all();
        return view('admin.text.index', [
            'texts' => $texts,
        ]);
    }

    public function edit(Request $request, Text $text) {
        $attributes = [
            'name' => $request->name,
            'text' => $request->text,
        ];
        $text->update($attributes);
        return redirect()->back();
    }
}
