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
        // Handle the profile file upload
        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public'); // Store the file in 'profiles' folder
        }

        // Prepare the data to be inserted
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'degree' => $request->degree,
            'experience' => $request->experience,
            'specialists' => $request->specialists,
            'university' => $request->university,
            'profile' => $profilePath,  // Store the file path if a profile is uploaded
            'status' => 'active',  // Default status to 'active'
            'role' => $request->role,
        ];

        // Create the therapist (User)
        $therapist = User::create($data);

        // Redirect to therapist list page after successful creation
        return redirect()->route('admin.therapistLists');
    }
    public function show(): View
    {
        $therapists = User::where('role', 2)->paginate(10); // Display 10 therapists per page
        return view('admin.therapist-list', compact('therapists'));
    }
    public function destroy($id)
    {
        // Find the category type by ID and delete
        $theprapist = User::findOrFail($id);
        $theprapist->delete();

        // Redirect back with a success message
        return redirect()->route('admin.therapistLists')->with('success', 'Category type deleted successfully.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate the query input
        $request->validate([
            'query' => 'nullable|string|max:255',
        ]);

        // Search in 'name' and 'email' fields, and filter by 'role = 1'
        $therapists = User::where('role', 2)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%");
            })
            ->paginate(10); // Adjust the pagination count as needed

        return view('admin.therapist-list', compact('therapists'));
    }
}
