<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function contact($name){
        $name = Str::upper($name);
        return view('contact',compact('name'));
    }

    public function about(){
        return view('about');
    }
}
