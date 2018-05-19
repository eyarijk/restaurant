<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $first = Place::limit(4)->get();
        return view('site.home',compact('first','second'));
    }

    public function places()
    {
        $best = Place::limit(4)->get();
        $top = Place::limit(4)->get();
        $all = Place::limit(4)->get();


        return view('site.places',compact('best','top','all'));
    }

}
