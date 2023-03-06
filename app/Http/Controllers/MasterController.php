<?php

namespace App\Http\Controllers;

class MasterController extends Controller

{
    public function loginPage(){
        return view('welcome');
    }
}