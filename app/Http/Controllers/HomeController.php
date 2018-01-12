<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

	# Home Page

    public function index(){return view('welcome',['title' => 'Home Page']);}

    # About Page (something like portfolio)

    public function about(){return view('about',['title' => 'About Us']);}


}
