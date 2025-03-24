<?php

namespace App\Services\Interfaces;

interface PostServiceInterface
{
    public function getAllPosts();
    public function getPostById($id);
    public function createPost(array $data);
    public function updatePost($id, array $data);
    public function deletePost($id);
    public function getUserPosts($userId);
    public function getPaginatedPosts($perPage = 10);
} 