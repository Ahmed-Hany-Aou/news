<?php

namespace App\Services;

use App\Repositories\SubCategoryRepositoryInterface;
use Illuminate\Http\Request;

class SubCategoryService implements SubCategoryServiceInterface
{
    protected $subCategoryRepository;

    public function __construct(SubCategoryRepositoryInterface $subCategoryRepository)
    {
        $this->subCategoryRepository = $subCategoryRepository;
    }

    public function getAllSubCategories($perPage = 4)
    {
        return $this->subCategoryRepository->getAllSubCategories($perPage);
    }

    public function getAllCategories()
    {
        return $this->subCategoryRepository->getAllCategories();
    }

    public function storeSubCategory(array $data)
    {
        return $this->subCategoryRepository->store($data);
    }

    public function getSubCategoryById($id)
    {
        return $this->subCategoryRepository->getById($id);
    }

    public function updateSubCategory(array $data, $id)
    {
        return $this->subCategoryRepository->update($data, $id);
    }

    public function deleteSubCategory($id)
    {
        return $this->subCategoryRepository->delete($id);
    }
}
