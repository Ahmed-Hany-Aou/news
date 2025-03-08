<?php
// app\Services\CategoryServiceInterface.php

namespace App\Services;

use Illuminate\Http\Request;

interface CategoryServiceInterface
{
    public function getAllCategories($perPage = 2);
    public function storeCategory(array $data);
    public function getCategoryById($id);
    public function updateCategory(array $data, $id);
    public function deleteCategory($id);
}


