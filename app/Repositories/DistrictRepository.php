<?php
namespace App\Repositories;

use App\Models\District; // ✅ Add this
use Illuminate\Support\Facades\DB;

class DistrictRepository implements DistrictRepositoryInterface
{
    public function getAll()
    {
        return District::orderBy('id', 'desc')->paginate(3);
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
        return District::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return District::destroy($id);
    }
}
