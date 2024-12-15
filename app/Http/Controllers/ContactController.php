<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'therapist_id' => 'required|exists:users,id',
        ]);

        // Create the contact
        Contact::create([
            'user_id' => Auth::id(), // The logged-in user
            'therapist_id' => $request->therapist_id, // The therapist being contacted
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Contacted Therapist Successfully!');
    }
}
