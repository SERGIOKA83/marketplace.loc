<?php

namespace Market\Http\Controllers;

use Illuminate\Http\Request;
//use  Illuminate\Support\Facades\Auth;
use Market\Http\Requests;

class AccountController extends Controller
{
    //
    public function show()
    {
        //$info = array('title1'=>Auth::user()->id,'title2'=> Auth::user()->login,'title3'=> Auth::user()->name);
//echo $info;
        //return view('account',$info);
        return view('account');
    }


}
