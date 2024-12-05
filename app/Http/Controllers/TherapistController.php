<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TherapistController extends Controller
{
    /**
     * Display the registration view.
     */
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,   
            'password'=>Hash::make($request->password),
            'age'=>$request->age,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'degree'=>$request->degree,
            'experience'=>$request->experience,
            'specialists'=>$request->specialists,
            'university' =>$request->university,
            'role'=>$request->role,
        ];
        $therapist=User::create($data);
        return redirect()->route('admin.therapistLists');
    }
    public function show():View{
        $therapists=User::where('role',3)->get();
        return view('admin.therapist-list',compact('therapists'));
    }
}
