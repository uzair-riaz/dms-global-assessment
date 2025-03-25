<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
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
        $post = $this->postService->createPost([
            'content' => $request->validated()['content'],
            'user_id' => $request->user()->id
        ]);

        broadcast(new NewPost($post->load('user')));

        return redirect()->back();
    }
}
