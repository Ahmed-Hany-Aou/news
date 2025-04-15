<?php
namespace App\Repositories;

use App\Models\Post; // Ensure this import is correct and the Post model exists

// Ensure the Post model exists in the App\Models namespace

class PostRepository implements PostRepositoryInterface
{
    public function getAll()
    {
        return Post::all();
    }

    public function store(array $data)
    {
        return Post::create($data);
    }

    public function update(array $data, $id)
    {
        return Post::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Post::where('id', $id)->delete();
    }
}
