<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    # Home Page

    public function index()
    {
      return view('welcome')
                ->with('title', 'Home Page');
    }

    # About Page

    public function about()
    {
      return view('about')
                ->with('title', 'About Us');
    }
}
