<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $elements_in_page = $request->elements_in_page ? $request->elements_in_page : 4;
        $posts = Post::with(['category'])->paginate($elements_in_page);
        foreach ($posts as $post) {
            if ($post->thumb) {
                $post->thumb = url('storage/' . $post->thumb);
            } 
        }
        return response()->json([
            'success' => true,
            'results' => $posts                      
        ]);
    }

    public function show($slug) {
        $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();
        if ($post) {
            if ($post->thumb) {
                $post->thumb = url('storage/' . $post->thumb);
            }
            return response()->json([
                'success' => true,
                'results' => $post 
            ]);
        }
        return response()->json([
            'success' => false,
            'error' => 'nessun post corrispondente'                      
        ]);
    }
}
