<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VicePrincipalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('vice_principal');
    }

    /**
     * Show the vice principal's dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('vice_principal.index');
    }
}
