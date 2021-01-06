<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;

class FrontendController extends Controller
{
    public function home($value='')
    {
    	$items =Item::all();
    	
    	return view('frontend.mainpage' ,compact('items'));
    }

    public function itemdetail($id)
    {
    	$item=Item::find($id);
    	return view('frontend.Itemdetail',compact('item'));
    }

    public function signin($value='')
  {
    return view('frontend.signinpage');
  }

  public function signup($value='')
  {
    return view('frontend.signuppage');
  }

  public function itemsbysubcategory($id)
  {
    $mysubcategory = Subcategory::find($id);
    return view('frontend.itembysubcategory',compact('mysubcategory'));
  }

  // public function bysubcategory(Request $request)
  // {
  //   $id = $request->id;
  //   $items = Item::where('subcategory_id',$id)->get();
  //   return $items;
  // }

  public function cart($value='')
  {
    return view('frontend.cartpage');
  }

}
