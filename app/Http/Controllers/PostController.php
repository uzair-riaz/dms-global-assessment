<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Services\Interfaces\PostServiceInterface;
use Inertia\Inertia;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getLatestPosts();

        return Inertia::render('Feed', [
            'posts' => $posts
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $this->postService->createPost([
            'content' => $request->validated()['content'],
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();
    }
}
