<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function reportLostItem(){
        $categories = ItemCategories::all();
        return Inertia::render('user/ReportLostItem', [
            'categories' => $categories
        ]);
    }
    public function reportFoundItem(){
        $categories = ItemCategories::all();
        return Inertia::render('user/ReportFoundItem', [
            'categories' => $categories
        ]);
    }
}
