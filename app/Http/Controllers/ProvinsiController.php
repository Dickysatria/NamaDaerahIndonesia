<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function show(){
        return view('provinsi.show');
    }

    public function create(){
        return view('provinsi.create');
    }

    public function update(){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function edit(){
        return view('provinsi.edit');
    }

    public function delete(){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
