<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use App\Models\ItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $categories = ItemCategories::all();
        $items = ItemModel::all();
        if (Auth::check() && Auth::user()->role === 'user') { 
            return Inertia::render('Dashboard', [
                'categories' => $categories,
                'items' => $items
        ]); 
        }else if (Auth::check() && Auth::user()->role === 'admin') { 
            return Inertia::render('admin/Home', [
                'categories' => $categories
        ]); 
        }
    }
}
