<?php

namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // protected $fillable = [
    //     'item_name',
    //     'item_description',
    //     'status',
    //     'location',
    //     'image_url',
    //     'category_id',
    // ];

    // const form = useForm({
    //     name: '',
    //     image: null,
    //     description: '',
    //     category: '',
    //     location: ''
    // })
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]); 
        ItemModel::create([
            'item_name' => $request->name,
            'item_description' => $request->description,
            'status' => 'lost',
            'location' => $request->location,
            'image_url' => $request->image,
            'category_id' => $request->category, //in convert an category sa category id
        ]);
    }
}
