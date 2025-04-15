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

    public function storeCategory(array $data)
    {
        return $this->categoryRepository->store($data);
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function updateCategory(array $data, $id)
    {
        return $this->categoryRepository->update($data, $id);
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
