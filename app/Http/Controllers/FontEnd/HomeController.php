<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use DB;
use Image;
use File;


class HomeController extends Controller
{

    public function homePage(){

        $homeComponent = DB::table("home_components")->first();
        $acual_Link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $home_link = "http://$_SERVER[HTTP_HOST]";

        SEOMeta::setTitle($homeComponent->seoTitle);
        SEOMeta::setDescription($homeComponent->seoDescription);
        SEOMeta::setKeywords($homeComponent->seoKeyword);
        SEOMeta::setCanonical($home_link);

        OpenGraph::addImage(public_path()."/image/HomeImage/".$homeComponent->header_image);
        OpenGraph::setDescription($homeComponent->seoDescription);
        OpenGraph::setTitle($homeComponent->seoTitle);
        OpenGraph::setUrl($home_link);
        OpenGraph::setSiteName(app_config('AppName'));
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($homeComponent->seoTitle);
        TwitterCard::setSite($home_link);

        JsonLd::setTitle($homeComponent->seoTitle);
        JsonLd::setDescription($homeComponent->seoDescription);
        JsonLd::addImage(public_path()."/image/HomeImage/".$homeComponent->header_image);

        $about = DB::table("about")->first();
        $skill = DB::table("skill")->first();
        $service = DB::table("services")->get();
        $project =  DB::table('project')
            ->join('project_category', 'project.cat_id', '=', 'project_category.id')
            ->select('project.*', 'project_category.cat_name')
            ->get();
        $project_category = DB::table("project_category")->get();
        $team = DB::table("team")->get();
        $client = DB::table("clients")->get();
        return view("frontend/layout/master_layout", compact("homeComponent", "service","project","project_category", "team", "client","about", "skill"));
    }

    public function singleService(Request $request, $id){
        $singleService = DB::table("services")->where("id", $id)->first();
        return view("frontend/pages/singleService", compact("singleService"));
    }

    public function singlePortfolio(Request $request){

        $project =  DB::table('project')
            ->join('project_category', 'project.cat_id', '=', 'project_category.id')
            ->select('project.*', 'project_category.cat_name')
            ->where("project.id", $request->id)
            ->first();

        $acual_Link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $home_link = "http://$_SERVER[HTTP_HOST]";

        SEOMeta::setTitle($project->title);
        SEOMeta::setDescription($project->description);
        SEOMeta::setCanonical($acual_Link);

        OpenGraph::addImage(public_path()."/image/projects/mainImage/".$project->main_image);
        OpenGraph::setDescription($project->description);
        OpenGraph::setTitle($project->title);
        OpenGraph::setUrl($acual_Link);


        TwitterCard::setTitle($project->title);
        TwitterCard::setSite('http://www.azmisoft.com/');

        JsonLd::setTitle($project->title);
        JsonLd::setDescription($project->description);
        JsonLd::addImage(public_path()."/image/projects/mainImage/".$project->main_image);

        $project_category = DB::table("project_category")->get();
        $project_image = DB::table("project_image")->where("project_id", $request->id)->get();
        $comment = DB::table("comment")->where("product_id", $request->id)->get();
        return view("frontend/pages/portfolioSingle", compact("project", "project_category", "project_image", "comment"));
    }

    public function comment(Request $request){
        $comment = array();
        $comment["name"]= $request->comment_name;
        $comment["email"]= $request->comment_email;
        $comment["product_id"]= $request->productId;
        $comment["comment"]= $request->comment_message;

        //insert Member image
        if ($request->comment_image){
            $bigImage = $request->file('comment_image');
            $big_img = time().'.'. $bigImage->getClientOriginalExtension();
            $location = public_path('image/comment/'.$big_img);
            Image::make($bigImage)->save($location);
            $comment['image'] = $big_img;

        }
        DB::table("comment")->insert($comment);
        return Redirect()->back();
    }


}
