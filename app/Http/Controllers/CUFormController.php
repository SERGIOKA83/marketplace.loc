<?php

namespace Market\Http\Controllers;

use Illuminate\Http\Request;

use Market\Http\Requests;
use Session;
class CUFormController extends Controller
{
    public function createForm(){


        return view('cform');
    }

    public function updateForm($id){

      // Session::put('idshop',$id);

//dd($id);


        return view('uform',array('id'=>$id));
    }
}
