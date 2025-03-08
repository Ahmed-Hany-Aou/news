<?php

// app\Repositories\CategoryRepositoryInterface.php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getAll($perPage = 2);
    public function store(array $data);
    public function getById($id);
    public function update(array $data, $id);
    public function delete($id);
}
