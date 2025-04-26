<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{


        public function __construct(){
        $this->middleware('auth');
    }

    
    public function socialSetting()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Fetch social settings from the database
        $social = DB::table('socials')->first();

        // Pass the $social variable to the view
        return view('backend.setting.social', compact('social'));
    }


   public function SocialUpdate(Request $request, $id){

   	$data = array();
    	 $data['facebook'] = $request->facebook;
    	 $data['twitter'] = $request->twitter;
    	 $data['youtube'] = $request->youtube;
    	 $data['linkedin'] = $request->linkedin;
    	 $data['instagram'] = $request->instagram;
    	 DB::table('socials')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Social Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('social.setting')->with($notification);
   }


   public function SeoSetting(){
    	$seo = DB::table('seos')->first();
    	return view('backend.setting.seo',compact('seo'));
    }



    public function SeoUpdate(Request $request, $id){

   	$data = array();
    	 $data['meta_author'] = $request->meta_author;
    	 $data['meta_title'] = $request->meta_title;
    	 $data['meta_keyword'] = $request->meta_keyword;
    	 $data['meta_description'] = $request->meta_description;
    	 $data['google_analytics'] = $request->google_analytics;
    	 $data['google_verification'] = $request->google_verification;
    	 $data['alexa_analytics'] = $request->alexa_analytics;
    	 DB::table('seos')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Seo Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('seo.setting')->with($notification);
   }// end Methos 



   public function PrayerSetting(){
    	$prayer = DB::table('prayers')->first();
    	return view('backend.setting.prayer',compact('prayer'));
    }


    public function PrayerUpdate(Request $request, $id){

   	$data = array();
    	 $data['fajr'] = $request->fajr;
    	 $data['dhuhr'] = $request->dhuhr;
    	 $data['asr'] = $request->asr;
    	 $data['maghrib'] = $request->maghrib;
    	 $data['isha'] = $request->isha;
    	 $data['jummah'] = $request->jummah;
    	 DB::table('prayers')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Prayers Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('prayer.setting')->with($notification);
   }




 	public function LiveTvSetting(){
 		$livetv = DB::table('livetvs')->first();
 		return view('backend.setting.livetv',compact('livetv'));
 	}


   public function LivetvUpdate(Request $request, $id){

   	$data = array();
    	 $data['embed_code'] = $request->embed_code;
    	 
    	 DB::table('livetvs')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Live Tv Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('livetv.setting')->with($notification);
   }


 	public function ActiveSetting(Request $request, $id){
 		DB::table('livetvs')->where('id',$id)->update(['status'=>1]);
 		$notification = array(
    	 	'message' => 'Live Tv Active Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}


 		public function DeActiveSetting(Request $request, $id){
 		DB::table('livetvs')->where('id',$id)->update(['status'=>0]);
 		$notification = array(
    	 	'message' => 'Live Tv DeActive Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}


 	public function NoticeSetting(){
 		$notice = DB::table('notices')->first();
 		return view('backend.setting.notice',compact('notice'));
 	}


 public function NoticeUpdate(Request $request, $id){

   	$data = array();
    	 $data['notice'] = $request->notice;
    	 
    	 DB::table('notices')->where('id',$id)->update($data);

    	 $notification = array(
    	 	'message' => 'Notice Setting Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('notice.setting')->with($notification);
   }



public function ActiveNoticeSetting(Request $request, $id){

 		DB::table('notices')->where('id',$id)->update(['status'=>1]);
 		$notification = array(
    	 	'message' => 'Notice Active Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}


 		public function DeActiveNoticeSetting(Request $request, $id){

 		DB::table('notices')->where('id',$id)->update(['status'=>0]);
 		$notification = array(
    	 	'message' => 'Notice DeActive Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->back()->with($notification);
 	}



 	public function WebsiteSetting(){
 		$website =  DB::table('websites')->orderBy('id','desc')->paginate(5);
 		return view('backend.website.index',compact('website'));
 	}


 	public function AddWebsiteSetting(){
 		return view('backend.website.create');
 	}



 	public function StoreWebsite(Request $request){

 		$data = array();
    	 $data['website_name'] = $request->website_name;
    	 $data['website_link'] = $request->website_link;
    	 
    	 DB::table('websites')->insert($data);

    	 $notification = array(
    	 	'message' => 'Website Link Updated Successfully',
    	 	'alert-type' => 'success'
    	 );

    	 return Redirect()->route('website.setting')->with($notification);
 	}

public function WebsiteAll()
{
    // Fetch all websites from the database
    $websites = DB::table('websites')->orderBy('id', 'desc')->get();

    // Pass the websites data to the view
    return view('backend.website.all', compact('websites'));
}

public function EditWebsite($id)
{
    $website = DB::table('websites')->where('id', $id)->first();
    return view('backend.website.edit', compact('website'));
}

public function UpdateWebsite(Request $request, $id)
{
    $data = array();
    $data['website_name'] = $request->website_name;
    $data['website_link'] = $request->website_link;

    DB::table('websites')->where('id', $id)->update($data);

    $notification = array(
        'message' => 'Website Link Updated Successfully',
        'alert-type' => 'success'
    );

    return Redirect()->route('website.setting')->with($notification);
}

public function DeleteWebsite($id)
{
    DB::table('websites')->where('id', $id)->delete();

    $notification = array(
        'message' => 'Website Link Deleted Successfully',
        'alert-type' => 'success'
    );

    return Redirect()->route('website.setting')->with($notification);
}
}
