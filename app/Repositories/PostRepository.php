<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('user')->get();
    }

    public function find($id)
    {
        return $this->model->with('user')->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $post = $this->find($id);
        if ($post) {
            $post->update($data);
        }
        return $post;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        if ($post) {
            return $post->delete();
        }
        return false;
    }

    public function findByUser($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }

    public function paginate($perPage = 10)
    {
        return $this->model->with('user')->paginate($perPage);
    }

    public function getLatest($limit = 100)
    {
        return $this->model->with('user')->latest()->take($limit)->get();
    }
} 