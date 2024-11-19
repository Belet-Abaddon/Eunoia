<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'age' => ['required', 'integer'],
            'gender' => ['required', 'string', 'max:10'],
            'country' => ['required', 'string', 'max:100'],
            'degree' => 'nullable|string',
            'experience' => 'nullable|integer',
            'specialists' => 'nullable|string',
            'university' => 'nullable|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'degree' => $request->input('degree', null),
            'experience' => $request->input('experience', null),
            'specialists' => $request->input('specialists', null),
            'university' => $request->input('university', null),
            'role' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
    public function show():View{
        $users=User::where('role',0)->get();
        return view('admin.user-list',compact('users'));
    }
}
