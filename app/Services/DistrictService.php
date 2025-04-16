<?php

namespace App\Services;

use App\Models\District;

class DistrictService implements DistrictServiceInterface
{
    public function getAllDistricts()
    {
        return District::paginate(10); // Retrieves all districts and paginates them
    }

    public function storeDistrict(array $data)
    {
        return District::create($data); // Creates a new district in the database
    }

    public function getDistrictById($id)
    {
        return District::find($id); // Retrieves a district by its ID
    }

    public function updateDistrict(array $data, $id)
    {
        $district = District::find($id);
        if ($district) {
            $district->update($data); // Updates the district
            return $district;
        }
        return null;
    }

    public function deleteDistrict($id)
    {
        $district = District::find($id);
        if ($district) {
            $district->delete(); // Deletes the district
            return true;
        }
        return false;
    }
}
