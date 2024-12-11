<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function dashboard(): View
    {
        // Count total users, admins, and therapists directly using query filtering
        $totalUsers = User::where('role', 0)->count();
        $totalAdmins = User::where('role', 1)->count();
        $totalTherapists = User::where('role', 2)->count();

        // Fetch all admin details
        $adminList = User::where('role', 1)->get();

        // Return data to the view
        return view('admin.admin-dashboard', compact('totalUsers', 'totalAdmins', 'totalTherapists', 'adminList'));
    }
}
