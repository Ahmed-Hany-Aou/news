<?php
namespace App\Repositories;

interface SettingRepositoryInterface
{
    public function getSocialSettings();
    public function updateSocialSettings($id, array $data);
    public function getSeoSettings();
    public function updateSeoSettings($id, array $data);
    public function getPrayerSettings();
    public function updatePrayerSettings($id, array $data);
    public function updateLiveTvSettings($id, array $data); // Add this method
    public function getWebsiteSettings();
    // Add methods for other settings (Live TV, Notice, etc.)
}
