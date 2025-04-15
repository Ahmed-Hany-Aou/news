<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Correctly import HasFactory
use App\Models\Subcategory; 
use App\Models\Subdistrict;

class Category extends Model
{
    use HasFactory; // Use the HasFactory trait

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}

