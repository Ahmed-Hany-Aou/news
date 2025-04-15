<?php
namespace App\Repositories;

interface DistrictRepositoryInterface
{
    public function getAllDistricts();
    public function storeDistrict(array $data);
    public function getDistrictById($id);
    public function updateDistrict(array $data, $id);
    public function deleteDistrict($id);
}
