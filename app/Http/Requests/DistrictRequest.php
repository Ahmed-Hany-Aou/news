<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // 🔹 Allow all users for now
    }

    public function rules(): array
    {
        return [
            'district_en' => 'required|unique:districts|max:255',
            'district_hin' => 'required|unique:districts|max:255',
        ];
    }
}
