<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiografiController extends Controller
{
    public function index()
    {
        return view('biografi.index');
    }

    public function create()
    {
        return view('biografi.create');
    }

    public function edit()
    {
        return view('biografi.edit');
    }

    public function storage()
    {
        # code...
    }

    public function update()
    {

    }

    public function delete()
    {
        # code...
    }
}
