<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
