<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use App\Model\appConfig;
use Illuminate\Http\Request;
use Image;
use File;
use DB;

class FontSiteController extends Controller
{
    //
    public function slider(){
        $slider = DB::table("slider")->get();
         return view("Backend.fontSiteSetting.slider", compact("slider"));
    }

    public function storeSlider(Request $request){

        $this->validate($request, [
                'b_text' => 'required', 'm_text' => 'required', 's_text' => 'required', 'image'=>'required|image'
            ],
            [
                'b_text.required' => 'Bold Text Is Required', 'm_text.required' => 'Middle Text Is Required', 's_text.required' => 'Small Text Is Required', 'image.image' => 'Image Extension Must be: .jpg, .png, .jpeg, .gif'
            ]);

        $slider = array();
        $slider['bold_text']= $request->b_text;
        $slider['middle_text']= $request->m_text;
        $slider['small_text']= $request->s_text;

        //insert image
        $image = $request->file('image');
        $img = time().'.'. $image->getClientOriginalExtension();
        $location = public_path('image/slider/'.$img);
        Image::make($image)->save($location);
        $slider["image"] = $img;


        DB::table("slider")->insert($slider);
        $notification=array(
            'message'=>'Successfully Added New Slider',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function updateSlider(Request $request, $id){

        $this->validate($request, [
                'b_text' => 'required', 'm_text' => 'required', 's_text' => 'required', 'image'=>'required|image'
            ],
            [
                'b_text.required' => 'Bold Text Is Required', 'm_text.required' => 'Middle Text Is Required', 's_text.required' => 'Small Text Is Required', 'image.image' => 'Image Extension Must be: .jpg, .png, .jpeg, .gif'
            ]);

        $slider = array();
        $slider['bold_text']= $request->b_text;
        $slider['middle_text']= $request->m_text;
        $slider['small_text']= $request->s_text;

        if ($request->image > 0) {
            $sliderImage = DB::table("slider")->where("id", $id)->first();
            if (File::exists('image/slider/'.  $sliderImage->image))
            {
                File::delete('image/slider/'.  $sliderImage->image);
            }
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('image/slider/'.$img);
            Image::make($image)->save($location);
            $slider["image"] = $img;
        }


        DB::table("slider")->where("id", $id)->update($slider);

        $notification=array(
            'message'=>'Successfully Update Slider',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function allUseFullPage(){
        return view("Backend.fontSiteSetting.useFullPage");
    }

    public function useFullPage(Request $request)
    {
        $privacy = $request->privacy;
        $disclaimer = $request->disclaimer;
        $terms = $request->terms;
        $about = $request->about;

       /* $this->validate($request, [
            'privacy' => 'required', 'disclaimer' => 'required', 'terms' => 'required', 'about' => 'required'
        ]);*/

         $page = "";

        if ($privacy != '') {
            $page = 'privacy';
            AppConfig::where('setting', '=', 'privacy')->update(['value' => $privacy]);
        }

        if ($disclaimer != '') {
            $page = 'disclaimer';
            AppConfig::where('setting', '=', 'disclaimer')->update(['value' => $disclaimer]);
        }
        if ($terms != '') {
            $page = 'terms';
            AppConfig::where('setting', '=', 'terms')->update(['value' => $terms]);
        }
        if ($about != '') {
            $page = 'about';
            AppConfig::where('setting', '=', 'about')->update(['value' => $about]);
        }


        $notification=array(
            'message'=>'Successfully Update Page',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);

    }

    public function socialPage(){
        $social = DB::table("social_icon")->get();
        return view("Backend.fontSiteSetting.social", compact("social"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSocialIcon(Request $request)
    {
        $this->validate($request,[
            'social_icon'=>'required|unique:social_icon,icon',
            'social_url'=>'required'
        ]);

        $item = array();
        $item["icon"] = 'fab fa-'.$request->social_icon;
        $item["link"] = $request->social_url;
        $item["color"] = $request->color;

        DB::table("social_icon")->insert($item);

        $notification=array(
            'message'=>'Successfully Add new Social Icon',
            'alert-type'=>'success'
        );

        return Redirect()->back()->with($notification);
    }


    public function deleteSocial(Request $request, $id){

        DB::table("social_icon")->where("id", $id)->delete();

        $notification=array(
            'message'=>'Successfully Delete Social Icon',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function deleteSlider($id){
        $sliderImage = DB::table("slider")->where("id", $id)->first();
        if (!is_null($sliderImage)) {
            //delete all image
            if (File::exists('image/slider/'.$sliderImage->image))
            {
                File::delete('image/slider/'.$sliderImage->image);
            }
        }

        DB::table("slider")->where("id", $id)->delete();

        $notification=array(
            'message'=>'Successfully Delete Slider',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

}
