<?php

namespace App\Controllers;

use App\Models\Dasboard;

class DashboardController
{
    public function index()
    {
        return view('dashboard');
    }
}
