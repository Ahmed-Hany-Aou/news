<?php
namespace App\Services;

interface SettingServiceInterface
{
    public function getSocialSettings();
    public function updateSocialSettings(array $data, $id);
    public function getSeoSettings();
    public function updateSeoSettings(array $data, $id);
    public function getPrayerSettings();
    public function updatePrayerSettings(array $data, $id);

    public function getLiveTvSettings();
    public function updateLiveTvSettings(array $data, $id); // Add this method
    // Add methods for other settings (Live TV, Notice, etc.)
}
