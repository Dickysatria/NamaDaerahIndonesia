<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function show(){
        return view('kecamatan.show');
    }

    public function create(){
        return view('kecamatan.create');
    }

    public function update(){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }

    public function edit(){
        return view('kecamatan.edit');

    }

    public function delete(){
        try {
            //code...
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
