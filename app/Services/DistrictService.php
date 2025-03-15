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
        return $this->districtRepository->getAll();
    }

    public function storeDistrict(array $data)
    {
        return $this->districtRepository->store($data);
    }

    public function getDistrictById($id)
    {
        return $this->districtRepository->getById($id);
    }

    public function updateDistrict(array $data, $id)
    {
        return $this->districtRepository->update($data, $id);
    }

    public function deleteDistrict($id)
    {
        return $this->districtRepository->delete($id);
    }
}

