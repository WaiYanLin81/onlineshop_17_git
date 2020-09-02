<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function mainfun()
    {
      $items = Item::all()->take(6);
    	return view('main',compact('items'));
    }
     public function brandfun()
    {
    	return view('brand');
    }
      public function itemdetailfun()
    {
    	return view('itemdetail');
    }
      public function loginfun()
    {
    	return view('login');
    }
      public function registerfun()
    {
    	return view('register');
    }
      public function promotionfun()
    {
    	return view('promotion');
    }
      public function shoppingcartfun()
    {
    	return view('shoppingcart');
    }
      public function subcategoryfun()
    {
    	return view('subcategory');
    }
}
