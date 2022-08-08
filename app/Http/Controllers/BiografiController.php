<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiografiController extends Controller
{
    public function index()
    {
        return view('biografi.index');
    }
}
