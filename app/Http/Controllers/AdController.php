<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return view('auth.adByCategory');
    }

    public function postAdForm($id)
    {
        return view('auth.postAdForm');
    }
}
