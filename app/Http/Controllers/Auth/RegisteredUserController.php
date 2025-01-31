<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\User;
use App\Models\PhychotherapyType;
use Illuminate\Support\Facades\DB;
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
        // Validation
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
            'profile' => 'nullable|string',
            'status' => ['required', 'string', 'max:10'],
            'role' => ['required', 'integer'],
        ]);

        // Create user
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
            'profile' => $request->input('profile', null),
            'status' => $request->status,
            'role' => $request->role,
        ]);

        // Fire event and log in
        event(new Registered($user));
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 0) {
            return redirect()->route('admin-dashboard');
        } elseif ($user->role === 1) {
            return redirect()->route('dashboard');
        } elseif ($user->role === 2) {
            return redirect()->route('therapist-dashboard');
        }

        // Default fallback (if role is not recognized)
        return redirect()->route('user.home');
    }

    public function show(): View
    {
        $users = User::where('role', 0)->paginate(10);
        return view('admin.user-list', compact('users'));
    }
    public function changeRole(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $user = User::findOrFail($id);

        // Update additional fields
        $user->degree = $request->input('degree');
        $user->experience = $request->input('experience');
        $user->specialists = $request->input('specialists');
        $user->university = $request->input('university');
        $user->role = $request->input('role'); // Assign role as Admin (1)

        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
    public function dashboard()
    {
        // Paginate the users or any data you want to show
        $phychoTys = PhychotherapyType::paginate(10); // Paginate with 10 items per page

        // Prepare the data for the chart as before
        $psychologicalTypes = Answer::select('phychotherapy_type_id', DB::raw('count(*) as count'))
            ->groupBy('phychotherapy_type_id')
            ->get();

        // Retrieve all psychological types to display names with counts
        $types = PhychotherapyType::all();

        // Prepare data for chart
        $labels = [];
        $counts = [];

        foreach ($psychologicalTypes as $type) {
            $foundType = $types->firstWhere('id', $type->phychotherapy_type_id);
            $labels[] = $foundType ? ($foundType->name ?? 'Unknown Type') : 'Unknown Type'; // Handle null $foundType
            $counts[] = $type->count;
        }

        // Initialize existingChartLabels before using it
        $existingChartLabels = $labels;  // Here we assign the labels to existingChartLabels
        $existingChartData = $counts;    // Assign the counts to existingChartData

        // Fetch the number of users who contacted each therapist
        $contactCounts = DB::table('contacts')
            ->join('users as therapists', 'contacts.therapist_id', '=', 'therapists.id')
            ->select('therapists.name as therapist_name', DB::raw('count(contacts.id) as contact_count'))
            ->groupBy('therapists.id', 'therapists.name')
            ->get();

        // Prepare data for the chart
        $therapists = $contactCounts->pluck('therapist_name')->toArray();
        $contactCountsData = $contactCounts->pluck('contact_count')->toArray();

        // Fetch the admin list
        $totalUsers = User::where('role', 0)->count();
        $totalTherapists = User::where('role', 2)->count();
        $totalAdmins = User::where('role', 1)->count();
        $adminList = User::where('role', 1)->paginate(10); // Paginate the admin list with 10 per page

        return view('admin.admin-dashboard', [
            'totalUsers' => $totalUsers,
            'totalTherapists' => $totalTherapists,
            'totalAdmins' => $totalAdmins,
            'adminList' => $adminList,
            'labels' => $labels,
            'counts' => $counts,
            'phychoTys' => $phychoTys,
            'therapists' => $therapists,
            'contactCounts' => $contactCountsData,
            'existingChartLabels' => $existingChartLabels, // Pass it to the view
            'existingChartData' => $existingChartData,     // Pass it to the view
        ]);
    }

    public function changeRoleAdmin($id)
    {
        // Find the admin by ID
        $admin = User::findOrFail($id);

        // Check if the user is an admin (role = 1)
        if ($admin->role == 1) {
            // Change the role to 0 (regular user) or any other role you need
            $admin->role = 0; // Set to regular user
            $admin->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Admin role changed to User successfully!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find user by ID
        $user->delete(); // Delete the user
        return redirect()->back()->with('success', 'User deleted successfully!');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate the query input
        $request->validate([
            'query' => 'nullable|string|max:255',
        ]);

        // Search in 'name' and 'email' fields, and filter by 'role = 1'
        $users = User::where('role', 0)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%");
            })
            ->paginate(10); // Adjust the pagination count as needed

        return view('admin.user-list', compact('users'));
    }
    
}
