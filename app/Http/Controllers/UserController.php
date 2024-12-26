<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\LocationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function reportLostItem(){
        $categories = ItemCategories::all();
        $locations = LocationModel::all();
        return Inertia::render('user/ReportLostItem', [
            'categories' => $categories,
            'locations' => $locations
        ]);
    }
    public function reportFoundItem(){
        $categories = ItemCategories::all();
        $locations = LocationModel::all();
        return Inertia::render('user/ReportFoundItem', [
            'categories' => $categories,
            'locations' => $locations
        ]);
    }
    public function goToSettings(){
        return Inertia::render('user/Settings');
    }

    public function edit(User $user)
    {
        $userInfo = $user->info; 

        return Inertia::render('user/EditProfile', [
            'user' => $user,
            'userInfo' => $userInfo,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'profile_pic' => 'nullable|string',
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
            'contact' => 'nullable|string',
            'social_links' => 'nullable|json',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('profile_pic')->store('images', 'public');
        }
        $user->info->updateOrCreate(
            ['user_id' => $user->id],
            [
            'profile_pic' => $imagePath ? asset('storage/' . $imagePath) : null,
            'address' => $request->address,
            'bio' => $request->bio ?: 'none',
            'contact' => $request->contact,
            'social_links' => $request->social_links,
        ]);

        return redirect()->route('user.edit', $user)->with('success', 'User information updated successfully.');
    }
}
