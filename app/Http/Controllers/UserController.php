<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function reportLostItem(){
        return Inertia::render('user/ReportLostItem');
    }
    public function reportFoundItem(){
        return Inertia::render('user/ReportFoundItem');
    }
}
