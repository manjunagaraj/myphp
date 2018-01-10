<?php

namespace App\Http\Controllers;
use App\Product;
use App\Shop;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create(){
    	return view('front.create');
    }



public function add_product(Request $request){


	$produc=new Product;
	$produc->name=$request->name;
	$produc->save();
	return back();


	shops::createShop();
}

}
