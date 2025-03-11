<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SubCategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    protected $subCategoryService;

    public function __construct(SubCategoryServiceInterface $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    public function Index(): View
    {
        $subcategory = $this->subCategoryService->getAllSubCategories();
        return view('backend.subcategory.index', compact('subcategory'));
    }

    public function AddSubCategory(): View
    {
        $category = $this->subCategoryService->getAllCategories();
        return view('backend.subcategory.create', compact('category'));
    }

    public function StoreSubCategory(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:255',
            'subcategory_hin' => 'required|unique:subcategories|max:255',
        ]);

        $data = $request->only(['subcategory_en', 'subcategory_hin', 'category_id']);
        $this->subCategoryService->storeSubCategory($data);

        return redirect()->route('subcategories')->with([
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function EditSubCategory($id): View
    {
        $subcategory = $this->subCategoryService->getSubCategoryById($id);
        $category = $this->subCategoryService->getAllCategories();
        return view('backend.subcategory.edit', compact('subcategory', 'category'));
    }

    public function UpdateSubCategory(Request $request, $id): RedirectResponse
    {
        $data = $request->only(['subcategory_en', 'subcategory_hin', 'category_id']);
        $this->subCategoryService->updateSubCategory($data, $id);

        return redirect()->route('subcategories')->with([
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function DeleteSubCategory($id): RedirectResponse
    {
        $this->subCategoryService->deleteSubCategory($id);

        return redirect()->route('subcategories')->with([
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'error'
        ]);
    }
}
