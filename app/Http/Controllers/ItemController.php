<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $items = Item::paginate(3);
        return view("item.index", compact("items"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view("item.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {

        $image = $request->image;
        $newName = "gallery_" . uniqid() . "." . $image->extension();
        $image->storeAs("public/gallery", $newName);
        $item = new Item;
        $item->image = $newName;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category;
        $item->expire_date = $request->epdate;
        $item->save();
        return redirect()->route("item.create")->with('success', "New Item Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view("item.detail", compact("item"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newImage = "gallery_" . uniqid() . "." . $image->extension();
            $image->storeAs("public/gallery", $newImage);
        
            // Delete the old image if it exists
            if ($item->image) {
                Storage::delete("public/gallery/{$item->image}");
            }
        
            $item->image = $newImage;
        }
        
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category;
        $item->expire_date = $request->epdate;
        $item->update();
        
        return redirect()->route('item.index')->with('update', 'Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if ($item) {
            $item->delete();
        }
        return redirect()->route('item.index')->with('delete', 'Deleted Successfully');
    }
}
