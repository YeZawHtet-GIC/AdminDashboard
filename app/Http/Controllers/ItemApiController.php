<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\ApiItemStoreRequest;
use App\Http\Requests\ApiItemUpdateRequest;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::all();
        // Transform each item to include the image URL
        $transformedData = $data->map(function ($item) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'category_id' => $item->category_id,
                'expire_date' => $item->expire_date,
                'image_url' => asset("storage/gallery/{$item->image}"), // Adjust the path as needed
            ];
        });

        return response()->json($transformedData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiItemStoreRequest $request)
    {
        $category_id = Category::find($request->category_id);

        if (!$category_id) {
            return response()->json(["message" => "Category ID Not Found!"]);
        }
        $image = $request->image;
        $newImageName = "api_" . uniqid() . "." . $image->extension();
        $image->storeAs("public/gallery", $newImageName);
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->expire_date = $request->expire_date;
        $item->image = $newImageName;
        $item->save();
        return response()->json('New Item Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Item::find($id);
        if ($data) {
            // Transform each item to include the image URL
            $transformedData =
                [
                    'name' => $data->name,
                    'price' => $data->price,
                    'category_id' => $data->category_id,
                    'expire_date' => $data->expire_date,
                    'image_url' => asset("storage/gallery/{$data->image}"), // Adjust the path as needed
                ];
            return response()->json($transformedData);
        }
        return response()->json("Item Not Found!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        if ($item) {
            // Transform each item to include the image URL
            $transformedData =
                [
                    'name' => $item->name,
                    'price' => $item->price,
                    'category_id' => $item->category_id,
                    'expire_date' => $item->expire_date,
                    'image_url' => asset("storage/gallery/{$item->image}"), // Adjust the path as needed
                ];

            return response()->json($transformedData);
        }
        return response()->json("Item Not Found!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiItemUpdateRequest $request, $id)
    {
        $item = Item::find($id);
        $category = Category::find($request->category_id);

        if (!$item) {
            return response()->json(["message" => "Item Not Found!"]);
        }

        if (!$category) {
            return response()->json(["message" => "Category ID Not Found!"]);
        }

        // Checking Image Provide or Not
        if ($request->image) {
            $image = $request->image;
            $imageName = "Api_" . uniqid() . "." . $image->extension();
            $image->storeAs("public/gallery", $imageName);
            $item->image = $imageName;
        }

        // Update item details
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category_id = $request->category_id;
        $item->expire_date = $request->expire_date;
        $item->update();
        return response()->json(["message" => "Item Updated Successfully!"]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if ($item) {
            $item->delete();
            return response()->json("Item Deleted Successfully!");
        }
        return response()->json("Item Not Found!");
    }
}
