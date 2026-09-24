<?php

namespace App\Http\Controllers;

use Illuminate\support\Str;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Prevent the N+1 Query
        $posts = Post::with(['category', 'user'])
            ->latest()
            ->paginate(10);

        $categories = Category::all();
        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();



        $data['user_id'] = $request->user()->id;

        // If user didnt wirte slug create one from title
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['slug']);
        }
        // Store image from form 
        if ($request->hasFile('image')) {
            // مسیر ذخیره‌شده برمی‌گرده، مثلاً: posts/filename.jpg
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        // Sync Tags if exists
        $post = Post::create($data);
        if ($request->filled('tags')) {
            $post->tags()->sync($request->input('tags'));
        }
        return redirect()
            ->route('posts.index')
            ->with('success', 'پست با موفقیت ثبت گردید');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
