<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function show(){
        return view('desa.show');
    }

    public function create()
    {
        return view('desa.create');
    }

    public function update(){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function edit(){
        return view('desa.edit');
    }

    public function delete(){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
