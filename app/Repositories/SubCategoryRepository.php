<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    public function getAllSubCategories($perPage = 4)
    {
        return DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*', 'categories.category_en')
            ->orderBy('subcategories.id', 'desc')
            ->paginate($perPage);
    }

    public function getAllCategories()
    {
        return DB::table('categories')->get();
    }

    public function store(array $data)
    {
        return DB::table('subcategories')->insert($data);
    }

    public function getById($id)
    {
        return DB::table('subcategories')->where('id', $id)->first();
    }

    public function update(array $data, $id)
    {
        return DB::table('subcategories')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('subcategories')->where('id', $id)->delete();
    }
}
