<?php

namespace Market\Http\Controllers;

use Illuminate\Http\Request;

use Market\Http\Requests;

class AccountProfileController extends Controller
{
    public function show()
    {
        //$info = array('title1'=>Auth::user()->id,'title2'=> Auth::user()->login,'title3'=> Auth::user()->name);
//echo $info;
        //return view('account',$info);
        if(View()->exists('profile'))
        {

        return view('profile');
    }

    abort(404,'Нэт такой страница');

    }

}
