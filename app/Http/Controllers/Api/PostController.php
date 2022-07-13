<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $elements_in_page = $request->elements_in_page ? $request->elements_in_page : 4;
        $posts = Post::paginate($elements_in_page);
        return response()->json([
            'success' => true,
            'results' => $posts                      
        ]);
    }
}
