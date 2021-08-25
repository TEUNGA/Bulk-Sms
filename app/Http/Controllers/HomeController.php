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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (auth()->user()->role == 'Admin') {
            return redirect('/admin/home');

                }
                else if (auth()->user()->role == 'Client') {
                    return redirect('/client/home');
                  }

                        else {
                            return redirect('/home');
                        }
    }
    
    
       
}

