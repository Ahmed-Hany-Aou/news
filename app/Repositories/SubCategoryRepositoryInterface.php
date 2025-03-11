<?php

namespace App\Repositories;

interface SubCategoryRepositoryInterface
{
    public function getAllSubCategories($perPage = 4);
    public function getAllCategories();
    public function store(array $data);
    public function getById($id);
    public function update(array $data, $id);
    public function delete($id);
}
