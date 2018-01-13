<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Grab the user id
        $id=auth()->user()->id;

        # Get the User by ID
        $user=User::find($id);
        return view('home',['title'=>'Dashboard'])->with('posts',$user->post);
    }
}
