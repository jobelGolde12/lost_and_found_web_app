<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\LocationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        // Log::info('File received: ', $request->file('profile_pic'));
        Log::info('The image is => ' . json_encode($request->all()));
        if ($request->hasFile('profile_pic')) {
            $imagePath = $request->file('profile_pic')->store('images', 'public');
            Log::info('File received: ' . $request->file('profile_pic')->getClientOriginalName());
        }
       
        try {
            $user->info->updateOrCreate(
                ['user_id' => $user->id],
                [
                'profile_pic' => $imagePath ? asset(path: 'storage/' . $imagePath) : $user->info->profile_pic,
                'address' => $request->address,
                'bio' => $request->bio ?: 'none',
                'contact' => $request->contact,
                'facebook_link' => $request->facebook_link,
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating user info: ' . $e->getMessage());
            return back()->withErrors('Failed to update user info.');
        }

        return redirect()->route('user.edit', $user)->with('success', 'User information updated successfully.');
    }
}
