<?php

namespace App\Repositories;

use DB;

class SubDistrictRepository implements SubDistrictRepositoryInterface
{
    public function all()
    {
        return DB::table('subdistricts')
            ->join('districts', 'subdistricts.district_id', 'districts.id')
            ->select('subdistricts.*', 'districts.district_en')
            ->orderBy('id', 'desc')
            ->paginate(4);
    }

    public function find($id)
    {
        return DB::table('subdistricts')->where('id', $id)->first();
    }

    public function create(array $data)
    {
        return DB::table('subdistricts')->insert($data);
    }

    public function update($id, array $data)
    {
        return DB::table('subdistricts')->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return DB::table('subdistricts')->where('id', $id)->delete();
    }

    public function getDistricts()
    {
        return DB::table('districts')->get();
    }
}