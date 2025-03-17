<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Feed', [
            'posts' => Post::with('user')->latest()->get()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $request->user()->posts()->create($request->validated());

        return redirect()->back();
    }
}
