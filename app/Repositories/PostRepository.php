<?php
// app/Repositories/PostRepository.php

namespace App\Repositories;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    // Get all posts (or paginate them)
    public function getAll()
    {
        // You can either get all posts or paginate them as needed.
        // Here, we're just getting all the posts:
        return Post::all(); // Or use Post::paginate(10) if you need pagination.
    }

    // Store a new post
    public function store(array $data)
    {
        return Post::create($data); // Using the create method to insert a new record.
    }

    // Update an existing post
    public function update(array $data, $id)
    {
        return Post::where('id', $id)->update($data); // Update the post with the provided id.
    }

    // Delete a post
    public function delete($id)
    {
        return Post::where('id', $id)->delete(); // Delete the post by id.
    }
}
