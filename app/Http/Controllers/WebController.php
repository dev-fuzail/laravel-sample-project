<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home(){
        return view('welcome');
    }
    public function Fashion(){
        $title = "Fashion";
        return view("fashion", compact('title'));
    }
    public function Electronic(){
        $title = "Electronics";
        return view("electronic", compact('title'));
    }
    public function Jewellery(){
        $title = "Jewellery";
        return view("jewellery", compact('title'));
    }
    public function About(){
        $title = "About Us";
        return view("about", compact('title'));
    }
    public function Products(){
        $title = "Products";
        $products = Product::all();
        return view("products", compact('title', 'products'));
    }
}
