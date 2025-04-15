<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Define the table name if it's not the default 'posts'
    protected $table = 'posts';

    // Define the fillable columns to prevent mass-assignment vulnerabilities
    protected $fillable = [
        'title_en', 'title_hin', 'user_id', 'category_id', 'subcategory_id', 'district_id', 
        'subdistrict_id', 'tags_en', 'tags_hin', 'details_en', 'details_hin', 'headline', 
        'first_section', 'first_section_thumbnail', 'bigthumbnail', 'post_date', 'post_month', 'image'
    ];

    // Optionally, you can define relationships, for example:
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }
}
