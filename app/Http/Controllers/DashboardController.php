<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()){
            $userRole= Auth::user()->is_admin;
        };
        return Inertia::render('Dashboard/Index', [
            'userRole'=>$userRole,
        ]);
    }
}
