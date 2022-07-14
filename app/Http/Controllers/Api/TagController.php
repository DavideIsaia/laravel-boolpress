<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json([
            'success' => true,
            'results' => $tags
        ]);
    }

    public function show($slug) {
        $tag = Tag::where('slug', '=', $slug)->with(['posts'])->first();
        if ($tag) {
            return response()->json([
                'success' => true,
                'results' => $tag 
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'nessun tag corrispondente'                      
        ]);
    }
}
