<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    //
    public function home(){       
        return view('pages.home');
    }

    public function faq(){
        return view('pages.faq');
    }

    public function translations(){
        return view('pages.translations');
    }

    public function contact(){
        return view('pages.contact');
    }

    public function extras(){
        return view('pages.extras');
    }

    public function generator(){
        return view('pages.generator');
    }

   
}
