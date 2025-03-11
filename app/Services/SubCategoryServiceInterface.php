<?php

namespace App\Services;

use Illuminate\Http\Request;

interface SubCategoryServiceInterface
{
    public function getAllSubCategories($perPage = 4);
    public function getAllCategories();
    public function storeSubCategory(array $data);
    public function getSubCategoryById($id);
    public function updateSubCategory(array $data, $id);
    public function deleteSubCategory($id);
}
