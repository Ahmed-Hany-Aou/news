<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Return true to allow all users to make this request.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title_en' => 'required|string|max:255',
            'title_hin' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'district_id' => 'required|exists:districts,id',
            'subdistrict_id' => 'nullable|exists:subdistricts,id',
            'tags_en' => 'nullable|string|max:255',
            'tags_hin' => 'nullable|string|max:255',
            'details_en' => 'nullable|string',
            'details_hin' => 'nullable|string',
            'headline' => 'nullable|boolean',
            'first_section' => 'nullable|boolean',
            'first_section_thumbnail' => 'nullable|boolean',
            'bigthumbnail' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // image validation rule
        ];
    }
}
