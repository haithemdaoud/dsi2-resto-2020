<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Meal;

class AppController extends Controller
{
    public function index()
    {
        $meals = Meal::paginate(9);
        return view('welcome', compact('meals'));
    }

    public function home()
    {
        return view('home');
    }

    public function order()
    {
        return view('order.index');
    }

    // public function about()
    // {
    //     $email = 'my_email@server.com';

    //     // return view('about', ['email' => $email]);
        
    //     // ou bien
    //     // return view('about')->with('email', $email);
        
    //     // ou bien
    //     return view('about', compact('email'));
    // }

    // public function team()
    // {
    //     $members = Member::all();
    //     return view('team', ['members' => $members]);
    // }
}
