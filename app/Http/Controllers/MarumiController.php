<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarumiController extends Controller
{
    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('company.index');
    }
}
