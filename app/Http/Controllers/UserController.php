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
        $validatedData = $request->validate([
            'profile_pic' => 'nullable|string',
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
            'contact' => 'nullable|string',
            'social_links' => 'nullable|json',
        ]);

        $user->info->update($validatedData);

        return redirect()->route('users.edit', $user)->with('success', 'User information updated successfully.');
    }
}
