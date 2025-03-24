<?php

namespace App\Services;

use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Support\Facades\Cache;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts()
    {
        return $this->postRepository->all();
    }

    public function getPostById($id)
    {
        return $this->postRepository->find($id);
    }

    public function createPost(array $data)
    {
        return $this->postRepository->create($data);
    }

    public function updatePost($id, array $data)
    {
        return $this->postRepository->update($id, $data);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }

    public function getUserPosts($userId)
    {
        return $this->postRepository->findByUser($userId);
    }

    public function getPaginatedPosts($perPage = 10)
    {
        return $this->postRepository->paginate($perPage);
    }

    public function getLatestPosts($limit = 100)
    {
        return Cache::remember('posts.latest.100', null, function () use ($limit) {
            return $this->postRepository->getLatest($limit);
        });
    }
} 