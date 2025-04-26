<?php
namespace App\Repositories;
use App\Models\Setting; // Ensure the Setting model exists in the App\Models namespace

use Illuminate\Support\Facades\DB;

class SettingRepository implements SettingRepositoryInterface
{
    public function getSocialSettings()
    {
        return DB::table('socials')->first();
    }

    public function updateSocialSettings($id, array $data)
    {
        return DB::table('socials')->where('id', $id)->update($data);
    }

    public function getSeoSettings()
    {
        return DB::table('seos')->first();
    }

    public function updateSeoSettings($id, array $data)
    {
        return DB::table('seos')->where('id', $id)->update($data);
    }

    public function getPrayerSettings()
    {
        return DB::table('prayers')->first();
    }

    public function updatePrayerSettings($id, array $data)
    {
        return DB::table('prayers')->where('id', $id)->update($data);
    }

    public function getLiveTvSettings()
    {
        return DB::table('livetvs')->first(); // Assuming 'livetv' is the table name
    }

    public function updateLiveTvSettings($id, array $data)
    {
        return DB::table('livetvs')->where('id', $id)->update($data); // Assuming 'id' is the primary key
    }

    public function getWebsiteSettings()
    {
        return DB::table('websites')->first(); // Fetch the first record from the websites table
    }

    // Add methods for other settings (Live TV, Notice, etc.)
}
