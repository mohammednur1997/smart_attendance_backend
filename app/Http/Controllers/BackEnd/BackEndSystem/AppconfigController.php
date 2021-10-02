<?php

namespace App\Http\Controllers\BackEnd\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;
use DB;
use App\Model\appConfig;

class AppconfigController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function index(){
        return view("Backend.adminSetting.setting.generalSetting");
    }

    public function postLogoSetting(Request $request){
        $this->validate($request,[
            'app_fav'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
            'logo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
            'footer_logo'=>'image|mimes:jpeg,png,jpg,bmp,|max:5012',
            'BreadCumb_logo'=>'image|mimes:jpeg,png,jpg,bmp',
        ]);

        $logo = $request->logo;
        $footer_logo = $request->footer_logo;
        $app_fav = $request->app_fav;
        $BreadCumb = $request->BreadCumb_logo;

        if ($app_fav != '') {
            $AppFav =  AppConfig::where('setting', '=', 'AppFav')->first();
            if (File::exists('image/logos/'.  $AppFav->value))
            {
                File::delete('image/logos/'.  $AppFav->value);
            }

            if ($request->hasFile('app_fav')){
                $favicon = $request->app_fav->hashName();
                $request->app_fav->move(('image/logos'), $favicon);
            }
            AppConfig::where('setting', '=', 'AppFav')->update(['value' => $favicon]);
        }

        if ($logo != '') {
            $logos =  AppConfig::where('setting', '=', 'AppLogo')->first();

            if (File::exists('image/logos/'.  $logos->value))
            {
                File::delete('image/logos/'.  $logos->value);
            }

            if ($request->hasFile('logo')){
                $logo = $request->logo->hashName();
                $request->logo->move(('image/logos'), $logo);
            }
            AppConfig::where('setting', '=', 'AppLogo')->update(['value' => $logo]);
        }



        if ($footer_logo != '') {
            $CatImage =  AppConfig::where('setting', '=', 'footer_logo')->first();

            if (File::exists('image/logos/'.  $CatImage->value))
            {
                File::delete('image/logos/'.  $CatImage->value);
            }

            if ($request->hasFile('footer_logo')){
                $footer_logo = $request->footer_logo->hashName();
                $request->footer_logo->move(('image/logos'), $footer_logo);
            }
            AppConfig::where('setting', '=', 'footer_logo')->update(['value' => $footer_logo]);
        }

        if ($BreadCumb != '') {
            $BreadCumbImage =  AppConfig::where('setting', '=', 'BreadCumb')->first();

            if (File::exists('image/logos/'.  $BreadCumbImage->value))
            {
                File::delete('image/logos/'.  $BreadCumbImage->value);
            }

            if ($request->hasFile('BreadCumb_logo')){
                $BreadCumb_logo = $request->BreadCumb_logo->hashName();
                $request->BreadCumb_logo->move(('image/logos'), $BreadCumb_logo);
            }
            AppConfig::where('setting', '=', 'BreadCumb')->update(['value' => $BreadCumb_logo]);
        }

        $notification=array(
            'message'=>'Successfully Update Logo',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function postGeneralSetting(Request $request)
    {

        $this->validate($request, [
            'app_name' => 'required', 'app_title' => 'required', 'email' => 'required', 'mobile' => 'required', 'address' => 'required', 'FooterTxt' => 'required'
        ]);

        $app_name =$request->app_name;
        $app_title = $request->app_title;
        $email = $request->email;
        $mobile = $request->mobile;
        $footer = $request->FooterTxt;
        $about_footer = $request->about_footer;
        $address = $request->address;

        if ($app_name != '') {
            AppConfig::where('setting', '=', 'AppName')->update(['value' => $app_name]);
        }
        if ($app_title != '') {
            AppConfig::where('setting', '=', 'AppTitle')->update(['value' => $app_title]);
        }
        if ($email != '') {
            AppConfig::where('setting', '=', 'email')->update(['value' => $email]);
        }
        if ($mobile != '') {
            AppConfig::where('setting', '=', 'mobile')->update(['value' => $mobile]);
        }
        if ($footer != '') {
            AppConfig::where('setting', '=', 'FooterTxt')->update(['value' => $footer]);
        }
        if ($about_footer != '') {
            AppConfig::where('setting', '=', 'about_footer')->update(['value' => $about_footer]);
        }

        if ($address != '') {
            AppConfig::where('setting', '=', 'address')->update(['value' => $address]);
        }

        $notification=array(
            'message'=>'Successfully Update System Setting',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function localizationPost(Request $request)
    {
        $this->validate($request, [
            'country' => 'required', 'date_format' => 'required', 'currency_code' => 'required', 'currency_symbol' => 'required', 'timezone' => 'required', 'cformat' => 'required', 'currency_decimal_digits' => 'required', 'currency_symbol_position' => 'required'
        ]);

        $country = $request->country;
        $language = $request->language;
        $date_format = $request->date_format;
        $currency_code = $request->currency_code;
        $currency_symbol = $request->currency_symbol;
        $get_timezone = $request->timezone;
        $cformat = $request->cformat;
        $currency_decimal_digits = $request->currency_decimal_digits;
        $currency_symbol_position = $request->currency_symbol_position;

        if ($country != '' AND $date_format != '' AND $currency_code != '' AND $currency_symbol != '' AND $cformat != '' AND $currency_decimal_digits != '' AND $currency_symbol_position != '') {
            appConfig::where('setting', '=', 'Country')->update(['value' => $country]);
            appConfig::where('setting', '=', 'DateFormat')->update(['value' => $date_format]);
            appConfig::where('setting', '=', 'Currency')->update(['value' => $currency_code]);
            appConfig::where('setting', '=', 'CurrencyCode')->update(['value' => $currency_symbol]);

            if ($cformat == '1') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => '.']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => '']);
            } elseif ($cformat == '2') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => '.']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => ',']);
            } elseif ($cformat == '3') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => ',']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => '']);
            } elseif ($cformat == '4') {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => ',']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => '.']);
            } else {
                appConfig::where('setting', '=', 'dec_point')->update(['value' => '.']);
                appConfig::where('setting', '=', 'thousands_sep')->update(['value' => ',']);
            }

            appConfig::where('setting', '=', 'currency_decimal_digits')->update(['value' => $currency_decimal_digits]);

            appConfig::where('setting', '=', 'language')->update(['value' => $language]);

            appConfig::where('setting', '=', 'currency_symbol_position')->update(['value' => $currency_symbol_position]);


            if (env('TIME_ZONE') != $get_timezone) {
                appConfig::where('setting', '=', 'Timezone')->update(['value' => $get_timezone]);

                $timeZoneSetting = "\n" .
                    'TIME_ZONE=' . $get_timezone .
                    "\n";

                // @ignoreCodingStandard
                $env = file_get_contents(base_path('.env'));
                $rows = explode("\n", $env);
                $unwanted = "TIME_ZONE";
                $cleanArray = preg_grep("/$unwanted/i", $rows, PREG_GREP_INVERT);

                $cleanString = implode("\n", $cleanArray);
                $env = $cleanString . $timeZoneSetting;

                try {
                    file_put_contents(base_path('.env'), $env);
                } catch (\Exception $e) {
                    return redirect('settings/localization')->with([
                        'message' => $e->getMessage(),
                        'message_important' => true
                    ]);
                }
            }
        }

        $notification=array(
            'message'=>'Successfully Update Localization',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
