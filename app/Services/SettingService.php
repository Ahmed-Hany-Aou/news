<?php
namespace App\Services;

use App\Repositories\SettingRepositoryInterface;

class SettingService implements SettingServiceInterface
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function getSocialSettings()
    {
        return $this->settingRepository->getSocialSettings();
    }

    public function updateSocialSettings(array $data, $id)
    {
        return $this->settingRepository->updateSocialSettings($id, $data);
    }

    public function getSeoSettings()
    {
        return $this->settingRepository->getSeoSettings();
    }

    public function updateSeoSettings(array $data, $id)
    {
        return $this->settingRepository->updateSeoSettings($id, $data);
    }

    public function getPrayerSettings()
    {
        return $this->settingRepository->getPrayerSettings();
    }

    public function updatePrayerSettings(array $data, $id)
    {
        return $this->settingRepository->updatePrayerSettings($id, $data);
    }

    public function getWebsiteSettings()
    {
        return $this->settingRepository->getWebsiteSettings();
    }


    public function getLiveTvSettings() { }

    public function updateLiveTvSettings(array $data, $id)
    {
        return $this->settingRepository->updateLiveTvSettings($id, $data);
    }
}
