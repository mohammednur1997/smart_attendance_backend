<?php

namespace App\Http\Controllers\Backend\BackEndSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\LanguageWord;
use App\Model\Language;
use DB;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware("guest");
    }
    //
    public function index(){
        return view('Backend.adminSetting.language.language');
    }

    public function edit($id)
    {
        return view('Backend.adminSetting.language.language', ['edit_profile'=>$id]);
    }

    public function addPhrase(Request $request){
        $phrase = $request->phrase;
       $totalCount =  DB::table("language_words")->count();

        $data = array();
        $data['id'] = $totalCount;
        $data['word'] = $phrase;
        $data['english'] = $phrase;
       DB::table("language_words")->insert($data);

        $notification=array(
            'message'=>'Successfully Add New Phrase',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function update(Request $request, $id)
    {

         $language = $id;
         $total_phrase = $request->total_phrase;

          for ($i=0; $i < $total_phrase; $i++) {
              if(isset($request->phrase[$i])) {
                 $pres = LanguageWord::where('id', $i)->first();
                  $pres->update([$language => $request->phrase[$i]]);
              }
            }

        $notification=array(
            'message'=>'Successfully Update Language Word',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        DB::table('languages')->where('db_field', $id)->update(array('db_status' => 'Deleted'));

        $notification=array(
            'message'=>'Language Delete Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


}
