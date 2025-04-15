<?php
// app/Services/PostService.php

namespace App\Services;

use App\Repositories\PostRepositoryInterface;
use App\Models\Post;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

   

    public function getAllPosts()
{
    return Post::with(['category', 'subcategory', 'district', 'subdistrict']) // Assuming you have relationships set up
                 ->orderBy('created_at', 'desc')
                 ->paginate(10);  // Pagination: 10 posts per page
}







    public function storePost(array $data)
    {
        return $this->postRepository->store($data);
    }

    public function updatePost(array $data, $id)
    {
        return $this->postRepository->update($data, $id);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }
}
