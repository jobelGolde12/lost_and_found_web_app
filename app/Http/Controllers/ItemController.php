<?php
namespace App\Http\Controllers;

use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
            'category' => 'required|integer', 
            'location' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'owner_phone_number' => 'nullable|string|max:255|min:11',
            'status' => 'required|string|max:255',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        ItemModel::create([
            'item_name' => $request->name,
            'item_description' => $request->description,
            'status' => $request->status, 
            'location' => $request->location,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
            'category_id' => $request->category, 
            'user_id' => $request->user_id,
            'owner_phone_number' => $request->owner_phone_number,
        ]);

       
        return response()->json(['success' => 'Item successfully created!'], 201);
    }

    // para sa profile (sa na himo ni user na item)
    public function viewItem($item){
        $getItem = ItemModel::find($item);
        return Inertia::render('user/ViewItem', [
            'item' => $getItem
        ]);
    }

    // para sa dashboard (sa na himo san kada user na item)
    public function viewItemInfo($item){
        $getItem = ItemModel::find($item);
        return Inertia::render('ViewItemInfo', [
            'item' => $getItem
        ]);
    }

    public function deleteItem($id){
        $item = ItemModel::find($id);
        $item->delete();

        $getItem = ItemModel::find($item);
        return Inertia::render('user/ViewItem', [
            'item' => $getItem
        ]);
    }
}
