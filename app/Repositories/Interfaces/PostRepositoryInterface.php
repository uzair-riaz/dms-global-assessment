<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function findByUser($userId);
    public function paginate($perPage = 10);
    public function getLatest($limit = 100);
} 