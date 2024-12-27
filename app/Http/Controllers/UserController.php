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
            'profile_pic' => 'nullable|file|mimes:jpeg,png,jpg,gif',
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
            'contact' => 'nullable|string',
            'facebook_link' => 'nullable|string',
        ]);
        $imagePath = null;
        if ($request->hasFile('profile_pic')) {
            $imagePath = $request->file('profile_pic')->store('images', 'public');
        }
        $user->info->updateOrCreate(
            ['user_id' => $user->id],
            [
            'profile_pic' => $imagePath ? asset('storage/' . $imagePath) : null,
            'address' => $request->address,
            'bio' => $request->bio ?: 'none',
            'contact' => $request->contact,
            'facebook_link' => $request->facebook_link,
        ]);

        return redirect()->route('user.edit', $user)->with('success', 'User information updated successfully.');
    }
}
