<?php

namespace App\Http\Controllers\Owner;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function index()
    {

        return view('owner.index');
    }
}
