<?php
namespace App\Repositories;

interface PostRepositoryInterface
{
    public function getAll();
    public function store(array $data);
    public function update(array $data, $id);
    public function delete($id);
}
