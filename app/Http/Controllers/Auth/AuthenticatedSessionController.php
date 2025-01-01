<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        // Check the user's role and redirect based on it
        $user = Auth::user();

        if ($user->role == 0) {
            // If role is user, redirect to the user home page
            return redirect()->intended('/');
        } elseif ($user->role == 1) {
            // If role is admin, redirect to the admin dashboard
            return redirect()->intended('/admin-dashboard');
        } elseif ($user->role == 2) {
            // If role is therapist, redirect to the therapist dashboard
            return redirect()->intended('/therapist-dashboard');
        }

        // If no role matches (this line can be customized further)
        return redirect()->route('login')->withErrors([
            'role' => 'Your role is not authorized to access the dashboard.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
