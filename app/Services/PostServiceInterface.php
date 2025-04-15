<?php
// app/Services/PostServiceInterface.php

namespace App\Services;

interface PostServiceInterface
{
    public function getAllPosts();
    public function storePost(array $data);
    public function updatePost(array $data, $id);
    public function deletePost($id);
}
