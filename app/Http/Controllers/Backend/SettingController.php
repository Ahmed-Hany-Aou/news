<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\SettingServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    protected $settingService;

    public function __construct(SettingServiceInterface $settingService)
    {
        $this->middleware = 'auth';
        $this->settingService = $settingService;
    }

    public function socialSetting()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $social = $this->settingService->getSocialSettings();
        return view('backend.setting.social', compact('social'));
    }

    public function SocialUpdate(Request $request, $id)
    {
        $data = $request->only(['facebook', 'twitter', 'youtube', 'linkedin', 'instagram']);
        $this->settingService->updateSocialSettings($data, $id);

        $notification = [
            'message' => 'Social Setting Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('social.setting')->with($notification);
    }

    public function SeoSetting()
    {
        $seo = $this->settingService->getSeoSettings();
        return view('backend.setting.seo', compact('seo'));
    }

    public function SeoUpdate(Request $request, $id)
    {
        $data = $request->only(['meta_author', 'meta_title', 'meta_keyword', 'meta_description', 'google_analytics', 'google_verification', 'alexa_analytics']);
        $this->settingService->updateSeoSettings($data, $id);

        $notification = [
            'message' => 'SEO Setting Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('seo.setting')->with($notification);
    }

    public function PrayerSetting()
    {
        $prayer = $this->settingService->getPrayerSettings();
        return view('backend.setting.prayer', compact('prayer'));
    }

    public function PrayerUpdate(Request $request, $id)
    {
        $data = $request->only(['fajr', 'dhuhr', 'asr', 'maghrib', 'isha', 'jummah']);
        $this->settingService->updatePrayerSettings($data, $id);

        $notification = [
            'message' => 'Prayers Setting Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('prayer.setting')->with($notification);
    }

    public function LiveTvSetting()
    {
        // Fetch the first Live TV setting from the 'livetv' table
        $livetv = DB::table('livetvs')->first();

        // Provide default values if no record is found
        if (!$livetv) {
            $livetv = (object) [
                'id' => null,
                'status' => 0, // Default status (inactive)
                'embed_code' => '', // Default embed code
            ];
        }

        return view('backend.setting.livetv', compact('livetv'));
    }

    public function WebsiteSetting()
    {
        // Fetch the first website setting from the 'websites' table
        $websitesetting = DB::table('websites')->select('id', 'website_name')->first();

        // Check if the result is null, then assign default values
        if (!$websitesetting) {
            $websitesetting = (object) ['id' => null, 'logo' => '']; // Default values
        }

        return view('backend.setting.website', compact('websitesetting'));
    }

    public function NoticeSetting()
    {
        // Fetch the first notice setting from the 'notices' table
        $notice = DB::table('notices')->first();

        // Provide default values if no record is found
        if (!$notice) {
            $notice = (object) [
                'id' => null,
                'notice' => '',
                'status' => 0, // Default status (e.g., inactive)
            ];
        }

        return view('backend.setting.notice', compact('notice'));
    }

    public function NoticeUpdate(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'notice' => 'required|string|max:255',
        ]);

        // Update the notice in the database
        DB::table('notices')->where('id', $id)->update([
            'notice' => $request->notice,
            'updated_at' => now(),
        ]);

        // Return a success notification
        $notification = [
            'message' => 'Notice Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('notice.setting')->with($notification);
    }

    public function DeActiveSetting($id)
    {
        // Update the status of the Live TV setting to inactive (0)
        DB::table('livetvs')->where('id', $id)->update([
            'status' => 0,
            'updated_at' => now(),
        ]);

        // Return a success notification
        $notification = [
            'message' => 'Live TV Deactivated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('livetv.setting')->with($notification);
    }


    public function ActiveSetting($id)
    {
        DB::table('livetvs')->where('id',$id)->update([
            'status'=>1,
            'updated_at'=>now(),
             ]);
         // Return a success notification
        $notification = [
            'message' => 'Live TV Deactivated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('livetv.setting')->with($notification);     
    
    }




    public function ActiveNoticeSetting($id)
    {
        // Update the notice status to active (1)
        DB::table('notices')->where('id', $id)->update([
            'status' => 1,
            'updated_at' => now(),
        ]);

        // Return a success notification
        $notification = [
            'message' => 'Notice Activated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('notice.setting')->with($notification);
    }

    public function LivetvUpdate(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'embed_code' => 'required|string',
        ]);

        // Update the Live TV setting in the database
        DB::table('livetvs')->where('id', $id)->update([
            'embed_code' => $request->embed_code,
            'updated_at' => now(),
        ]);

        // Return a success notification
        $notification = [
            'message' => 'Live TV Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('livetv.setting')->with($notification);
    }
}
