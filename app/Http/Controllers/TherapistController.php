<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
    public function store(Request $request): View
    {
        
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:' . User::class,
        //     'password' => 'required|string|min:8',
        //     'age' => 'required|integer',
        //     'gender' => 'required|string|max:10',
        //     'country' => 'required|string|max:100',
        //     'degree' => 'required|string',
        //     'experience' => 'required|integer',
        //     'specialists' => 'required|string',
        //     'university' => 'required|string',
        // ]);
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
            'role'=>3,
        ];
        $therapist=User::create($data);
        return view('admin.therapist-list',compact('therapist'));
    }
    public function show():View{
        $therapists=User::where('role',3)->get();
        return view('admin.therapist-list',compact('therapists'));
    }
}
