<?php
namespace App\Services;

use App\Repositories\DistrictRepositoryInterface;

class DistrictService implements DistrictServiceInterface
{
    protected DistrictRepositoryInterface $districtRepository;

    public function __construct(DistrictRepositoryInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function getAllDistricts()
    {
        return $this->districtRepository->getAllDistricts();
    }

    public function storeDistrict(array $data)
    {
        // Logic to store a district
    }

    public function getDistrictById($id)
    {
        // Logic to fetch a district by ID
    }

    public function updateDistrict(array $data, $id)
    {
        // Logic to update a district
    }

    public function deleteDistrict($id)
    {
        // Logic to delete a district
    }
}

