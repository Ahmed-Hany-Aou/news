<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests\DistrictRequest;
use App\Services\DistrictServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DistrictController extends BaseController
{
    protected DistrictServiceInterface $districtService;

    // ✅ Apply auth middleware
    public function __construct(DistrictServiceInterface $districtService)
    {
        $this->middleware('auth'); // 🔹 Ensure only authenticated users can access
        $this->districtService = $districtService;
    }

    public function Index(): View
    {
        $districts = $this->districtService->getAllDistricts();
        return view('backend.district.index', compact('districts'));
    }

    public function AddDistrict(): View
    {
        return view('backend.district.create');
    }

    public function StoreDistrict(DistrictRequest $request): RedirectResponse
    {
        $this->districtService->storeDistrict($request->validated());

        return redirect()->route('district')->with([
            'message' => 'District Inserted Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function EditDistrict($id): View
    {
        $district = $this->districtService->getDistrictById($id);
        return view('backend.district.edit', compact('district'));
    }

    public function UpdateDistrict(DistrictRequest $request, $id): RedirectResponse
    {
        $this->districtService->updateDistrict($request->validated(), $id);

        return redirect()->route('district')->with([
            'message' => 'District Updated Successfully',
            'alert-type' => 'success'
        ]);
    }

    public function DeleteDistrict($id): RedirectResponse
    {
        $this->districtService->deleteDistrict($id);

        return redirect()->route('district')->with([
            'message' => 'District Deleted Successfully',
            'alert-type' => 'error'
        ]);
    }
}

