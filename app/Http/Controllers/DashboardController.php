<?php

namespace App\Http\Controllers;

use App\Models\ItemCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $categories = ItemCategories::all();
        if (Auth::check() && Auth::user()->type === 'user') { 
            return Inertia::render('Dashboard', [
                'categories' => $categories
        ]); 
        }
        return Inertia::render('Dashboard', [
            'categories' => $categories
    ]); 
    }
}
