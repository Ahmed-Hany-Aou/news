<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\SubDistrictRepositoryInterface;
use App\Http\Requests\SubDistrictRequest;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    protected $subDistrictRepository;

    public function __construct(SubDistrictRepositoryInterface $subDistrictRepository)
    {
        // $this->middleware('auth'); // Uncomment if needed
        $this->subDistrictRepository = $subDistrictRepository;
    }

    public function Index()
    {
        $subdistrict = $this->subDistrictRepository->all();
        return view('backend.subdistrict.index', compact('subdistrict'));
    }

    public function AddSubDistrict()
    {
        $district = $this->subDistrictRepository->getDistricts();
        return view('backend.subdistrict.create', compact('district'));
    }

    public function StoreSubDistrict(SubDistrictRequest $request)
    {
        $data = [
            'subdistrict_en' => $request->subdistrict_en,
            'subdistrict_hin' => $request->subdistrict_hin,
            'district_id' => $request->district_id,
        ];

        $this->subDistrictRepository->create($data);

        $notification = [
            'message' => 'SubDistrict Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('subdistrict')->with($notification);
    }

    public function EditSubDistrict($id)
    {
        $subdistrict = $this->subDistrictRepository->find($id);
        $district = $this->subDistrictRepository->getDistricts();
        return view('backend.subdistrict.edit', compact('subdistrict', 'district'));
    }

    public function UpdateSubDistrict(SubDistrictRequest $request, $id)
    {
        $data = [
            'subdistrict_en' => $request->subdistrict_en,
            'subdistrict_hin' => $request->subdistrict_hin,
            'district_id' => $request->district_id,
        ];

        $this->subDistrictRepository->update($id, $data);

        $notification = [
            'message' => 'SubDistrict Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('subdistrict')->with($notification);
    }

    public function DeleteSubDistrict($id)
    {
        $this->subDistrictRepository->delete($id);

        $notification = [
            'message' => 'SubDistrict Deleted Successfully',
            'alert-type' => 'error'
        ];

        return redirect()->route('subdistrict')->with($notification);
    }
}