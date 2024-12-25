<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class SettingsController extends Controller
{
    // Trash Page
    public function trash()
    {
        return Inertia::render('Settings/Trash', [
            'title' => 'Trash',
        ]);
    }

    // Notifications Page
    public function notifications()
    {
        return Inertia::render('Settings/Notifications', [
            'title' => 'Notifications',
        ]);
    }

    // Privacy Page
    public function privacy()
    {
        return Inertia::render('Settings/Privacy', [
            'title' => 'Privacy Settings',
        ]);
    }
}
