<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuideController extends Controller
{
    public function ShowAbout(){
        return view('guide.about');
    }

    public function ShowPolicy(){
        return view('guide.policy');
    }

    public function ShowReturn(){
        return view('guide.return');
    }

    public function ShowTerm(){
        return view('guide.terms');
    }

    public function Contact(){
        return view('contact.contact');
    }
}
