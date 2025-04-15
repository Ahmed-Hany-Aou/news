<?php
namespace App\Repositories;

use App\Models\District;
use Illuminate\Support\Facades\DB;

class DistrictRepository implements DistrictRepositoryInterface
{
    public function getAll()
    {
        return District::all();
    }

    public function store(array $data)
    {
        return District::create($data);
    }

    public function getById($id)
    {
        return District::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $district = District::findOrFail($id);
        $district->update($data);
        return $district;
    }

    public function delete($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
    }

    public function getAllDistricts()
    {
        return District::all(); // Ensure this returns a collection
    }

    public function storeDistrict(array $data)
    {
        return District::create($data);
    }

    public function getDistrictById($id)
    {
        return District::findOrFail($id);
    }

    public function updateDistrict(array $data, $id)
    {
        $district = District::findOrFail($id);
        $district->update($data);
        return $district;
    }

    public function deleteDistrict($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
    }
}
