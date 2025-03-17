<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Post::with('user')->latest()->get();
    }

    public function store(StorePostRequest $request)
    {
        $request->user()->posts()->create($request->validated());

        return redirect()->back();
    }
}
