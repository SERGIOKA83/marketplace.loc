<?php

namespace Market\Http\Controllers;

use Illuminate\Http\Request;
use Market\User;
use Market\Shop;
use Market\Http\Requests;
use Validator;
use Session;

class AccountShopsController extends Controller
{
    public function show()
    {
        $data = array();

        $user = user::find($this->getuser()->id);

        foreach ($user->shop as $key) {

            $temp = array('id'=>$key->id,'name'=>$key->name,'description'=>$key->description);
            array_push($data, $temp);

        }


    //    $info = array('title1'=>$this->getUser()->id,'title2'=> $this->getUser()->login,'title3'=> $this->getUser()->name);


    return view('shops',array('data'=>$data));
    }

    public function create(Request $request)
    {
        echo 'create';
        $data = $request->except('_token','save');
        //dd($data);
        // $validator = Validator::make($data,[
        //     'name' => 'required|unique:shops|max:60',
        //     'description' => 'max:200'
        //
        // ]);

//
        $shop = new Shop();
        $shop->name = $data['name'];
        $shop->description = $data["description"];
        $shop->user_id = $this->getuser()->id;
        $shop->save();
        return redirect('/account/shops');
    }

    public function update($id, Request $request)
    {


         // $idshop = Session::pull('idshop', 'default');
        // dd($id);
//dd($request);

        $data = $request->except('_token','save');
        $shop = Shop::find($id);
        //dd($data);
        $shop->name = $data['name'];
        $shop->description = $data['description'];
        $shop->save();

        return redirect('/account/shops');
    ///    dd($data);
    }

    public function delete($id)
    {
        echo 'delete '.$id;
        //$shop = Shop::find($id);
        //$shop->delete();
        Shop::destroy($id);
        return redirect('/account/shops');
    }

}
