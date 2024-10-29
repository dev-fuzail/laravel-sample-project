<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function Fashion(){
        return view("fashion");
    }
    public function Electronic(){
        return view("electronic");
    }
    public function Jewellery(){
        return view("jewellery");
    }
}
