<?php

// app\Repositories\CategoryRepository.php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll($perPage = 2)
    {
        return DB::table('categories')->orderBy('id', 'desc')->paginate($perPage);
    }

    public function store(array $data)
    {
        return DB::table('categories')->insert($data);
    }

    public function getById($id)
    {
        return DB::table('categories')->where('id', $id)->first();
    }

    public function update(array $data, $id)
    {
        return DB::table('categories')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('categories')->where('id', $id)->delete();
    }
}
