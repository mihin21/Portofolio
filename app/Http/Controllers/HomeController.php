<?php

namespace App\Http\Controllers;

use App\Models\AboutSettings;
use App\Models\ContactSettings;
use App\Models\CvSettings;
use App\Models\FormationSettings;
use App\Models\HomeSettings;
use App\Models\PortfolioSettings;
use App\Models\SendMail;
use App\Models\SkillSettings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $messages = SendMail::all();
        $Allabouts = HomeSettings::all();
        $abouts = HomeSettings::latest()->get('picture');
        return view('index',compact('abouts','Allabouts','messages'));
    }
    public function index(){

        $contacts = ContactSettings::all();
        $portfolios = PortfolioSettings::all();
        $cvs = CvSettings::latest()->get();
        $experiences = FormationSettings::where('experience','on')->orderBy('created_at','DESC')->get();
        $formations = FormationSettings::orderBy('created_at','DESC')->get();
        $skills = SkillSettings::all();
        $aboutData = AboutSettings::latest()->get();
        $homeData = HomeSettings::latest()->get();
        return view('front/index',compact('homeData','aboutData','skills','formations','experiences','cvs','portfolios','contacts'));
    }
}
