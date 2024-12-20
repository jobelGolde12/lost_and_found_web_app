<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;

class ItemController extends Controller
{
   
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'user_id' => 'required|string|max:255',
            'owner_phone_number' => 'nullable|string|max:255|min:11',
        ]); 
        ItemModel::create([
            'item_name' => $request->name,
            'item_description' => $request->description,
            'status' => 'lost',
            'location' => $request->location,
            'image_url' => $request->image,
            'category_id' => $request->category, //in convert an category sa category id
            'user_id' => $request->user_id,
            'owner_phone_number' => $request->owner_phone_number,
        ]);
    }
}
