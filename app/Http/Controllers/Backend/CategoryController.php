<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected CategoryServiceInterface $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function Index(): View
    {
        $categories = $this->categoryService->getAllCategories();
        return view('backend.category.index', compact('categories'));
    }

    public function AddCategory(): View
    {
        return view('backend.category.create');
    }

    public function StoreCategory(CategoryRequest $request): RedirectResponse
{
    $data = $request->only(['category_en', 'category_hin']);
    $this->categoryService->storeCategory($data);

    return redirect()->route('categories')->with([
        'message' => 'Category Inserted Successfully',
        'alert-type' => 'success'
    ]);
}

    public function EditCategory($id): View
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('backend.category.edit', compact('category'));
    }

    public function UpdateCategory(CategoryRequest $request, $id): RedirectResponse
    {
        $data = $request->only(['category_en', 'category_hin']); // Ensure $data is an array
        $this->categoryService->updateCategory($data, $id);
    
        return redirect()->route('categories')->with([
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        ]);
    }
    

    public function DeleteCategory($id): RedirectResponse
    {
        $this->categoryService->deleteCategory($id);

        return redirect()->route('categories')->with([
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        ]);
    }
}
