<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubDistrictRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Add authorization logic if needed
    }

    public function rules()
    {
        return [
            'subdistrict_en' => 'required|unique:subdistricts|max:255',
            'subdistrict_hin' => 'required|unique:subdistricts|max:255',
            'district_id' => 'required|exists:districts,id',
        ];
    }
}