<?php
namespace App\Services;

interface DistrictServiceInterface
{
    public function getAllDistricts();
    public function storeDistrict(array $data);
    public function getDistrictById($id);
    public function updateDistrict(array $data, $id);
    public function deleteDistrict($id);
}
