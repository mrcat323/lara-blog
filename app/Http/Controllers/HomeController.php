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
    public function index(User $user)
    {
        # Grab the user id
        $userId = auth()->user()->id;

        # Get the User by ID
        $userInfo = $user->find($userId);

        return view('home')
                  ->with('title', 'Dashboard')
                  ->with('posts', $userInfo->posts);
    }
}
