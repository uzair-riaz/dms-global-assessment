<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts.latest.100', null, function () {
            return Post::with('user')->latest()->take(100)->get();
        });

        return Inertia::render('Feed', [
            'posts' => $posts
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $request->user()->posts()->create($request->validated());

        return redirect()->back();
    }
}
