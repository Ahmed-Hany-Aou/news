<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class EnhancedCategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories($perPage = 2)
    {
        return $this->categoryRepository->getAll($perPage);
    }

    public function storeCategory(Request $request)
    {
        return $this->categoryRepository->store($request->all());
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function updateCategory(Request $request, $id)
    {
        return $this->categoryRepository->update($request->all(), $id);
    }

    public function deleteCategory($id)
    {
        return $this->categoryRepository->delete($id);
    }

    /**
     * @inheritDoc
     */
    public function createCategory(array $data)
    {
        return $this->categoryRepository->create($data);
    }
}
