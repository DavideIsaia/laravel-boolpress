<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function show($slug) {
        $tag = Tag::where('slug', '=', $slug)->first();

        return view ('admin.tags.show', compact('tag'));
    }
}