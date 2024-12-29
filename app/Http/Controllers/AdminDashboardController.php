<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('role', 0)->count();
        $totalTherapists = User::where('role', 2)->count();
        $totalAdmins = User::where('role', 1)->count(); // Assuming role 1 is admin

        return view('admin.admin-dashboard', compact('totalUsers', 'totalTherapists', 'totalAdmins'));
    }
}
