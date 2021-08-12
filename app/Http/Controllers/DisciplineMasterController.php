<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisciplineMasterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('discipline_master');
    }

    /**
     * Show the discipline master dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('discipline_master.index');
    }
}
