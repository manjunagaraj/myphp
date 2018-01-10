<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
   public function products()
    {
        return $this->belongsToMany('App\Products');
    }
 



public  function createShop(){
   	$user=Auth::user();
   	$order=$user->shops()->create(['name'=>'shop1']);

 
}
