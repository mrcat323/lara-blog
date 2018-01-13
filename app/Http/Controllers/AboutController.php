<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){return view('welcome',['title'=>'Home Page']);}

    # About Page

    public function about(){return view('about',['title'=>'About Us']);}
}
