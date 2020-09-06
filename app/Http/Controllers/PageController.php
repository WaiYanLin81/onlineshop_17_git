<?php

namespace App\Http\Controllers;
use App\Item;
use App\Brand;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function mainfun()
    {
      $discountItems = Item::all();
    $brands = Brand::take(6)->get();
    $categories = Category::take(8)->get();
    	return view('main',compact('discountItems','brands','categories'));
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
    	return view('promotions');
    }
      public function shoppingcartfun()
    {
    	return view('shoppingcart');
    }
      public function subcategoryfun()
    {
    	return view('subcategory');
    }

      public function detailfun($id)
    {
      $item = Item::find($id);
      $items = Item::where('subcategory_id',31)->get();
      return view('detail',compact('item','items'));
    }

     public function fliteritems($id)
  {
    $item = Item::all();
    $subcategory = Subcategory::find($id);
    $subcategory->setRelation('items', $subcategory->items()->paginate(3));
    return view('fliteritems',compact('subcategory'));
  }

  

  public function itemsbybrand($id)
  {
    $brand = Brand::find($id);
    return view('itemsbybrand',compact('brand'));
  }

  public function itemsbycategory($id)
  {
    $category = Category::find($id);
    return view('itemsbycategory',compact('category'));
  }
}
