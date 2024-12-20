<?php
namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|integer', // Assuming `category` is the ID
            'location' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'owner_phone_number' => 'nullable|string|max:255|min:11',
        ]);

        // Handle image upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Save the item to the database
        ItemModel::create([
            'item_name' => $request->name,
            'item_description' => $request->description,
            'status' => 'lost', // Default to 'lost'
            'location' => $request->location,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
            'category_id' => $request->category, // Assuming the category ID is passed
            'user_id' => $request->user_id,
            'owner_phone_number' => $request->owner_phone_number,
        ]);

        // Redirect or return a response
        return response()->json(['success' => 'Item successfully created!'], 201);
    }
}
