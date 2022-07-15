<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Mail\NewPostNotificationToAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(8);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        $data = $request->all();

        if (isset($data['image'])) {
            $image_path = Storage::put('uploads', $data['image']);
            $data['thumb'] = $image_path;
        }

        $post = new Post();
        $post->fill($data);

        $post->slug = $this->generateSlugFromTitle($post->title);
        $post->save();

        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        Mail::to('admin@boolpress.it')->send(new NewPostNotificationToAdmin());

        return redirect()->route('admin.posts.show', ['slug' =>$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        $category = $post->category;
        $tag = $post->tag;
        return view('admin.posts.show', compact('post', 'category', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->getValidationRules());
        $data = $request->all();

        $post = Post::findOrFail($id);
        if (isset($data['image'])) {
            if ($post->thumb) {
                Storage::delete($post->thumb);
            }
            $image_path = Storage::put('uploads', $data['image']);
            $data['thumb'] = $image_path;
        }
        $post->fill($data);
        $post->slug = $this->generateSlugFromTitle($post->title);
        $post->save();

        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->sync([]);
        }
        

        return redirect()->route('admin.posts.show', ['slug' =>$post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->sync([]);

        if ($post->thumb) {
            Storage::delete($post->thumb);
        }

        $post->delete();
        return redirect()->route('admin.posts.index');
    }

    private function generateSlugFromTitle($title) {
        $base_slug = Str::slug($title, '-');
        $slug = $base_slug;
        $i = 1;
        $post_same_name = Post::where('slug', '=', $slug)->first();
        while ($post_same_name) {
            $slug = $base_slug . '-' . $i;
            $post_same_name = Post::where('slug', '=', $slug)->first();
            $i++;
        }
        return $slug;
    }

    private function getValidationRules() {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:30000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
