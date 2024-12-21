<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\LocationModel;
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
}
