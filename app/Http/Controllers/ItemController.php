<?php

namespace App\Http\Controllers;

use App\Item;
use App\Brand;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        return view('item.item_list',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands=Brand::all();
          $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('item.item_new',compact('brands','categories', 'subcategories'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //valitation
        $request->validate([
            "name"=>"required",
            "photo"=>"required",
            "price"=>"required",
            "diccount"=>"sometime|srequired",
            "description"=>"required",
            "brand"=>"required",
            "subcategory"=>"required",


        ]);

        //upload file-photo
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }

        //store
        $item = new Item;
        $item->name = $request->name;
        $item->codeno = uniqid();

        $item->photo= $path;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;


        $item->save();


        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item.item_show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands=Brand::all();
          $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('item.item_edit',compact('item', 'brands','categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
         $request->validate([
            "name"=>"required",
            "photo"=>"sometimes|required",
            "price"=>"required",
            "diccount"=>"sometimes|srequired",
            "description"=>"required",
            "brand"=>"required",
            "subcategory"=>"required",


        ]);

        //upload file-photo
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // brandimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

            $path = '/storage/'.$filePath;
        }else{
            $path=$request->oldphoto;
        }

        //store
       
        $item->name = $request->name;
        // $item->codeno = uniqid();

        $item->photo= $path;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;


        $item->save();


        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index');
    }

     public function filterCategory(Request $request)
    {
        $cid = $request->cid;
        $subcategories = Subcategory::where('category_id',$cid)->get();
        return $subcategories;
    }
}
