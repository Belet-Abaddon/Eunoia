<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    public function getNewContacts(Request $request)
    {
        $contacts = Contact::where('therapist_id', auth()->id()) // Match logged-in therapist
            ->where('created_at', '>=', Carbon::now()->subWeek()) // Contacts within the last week
            ->paginate(10); // Paginate with 10 items per page

        return view('therapist.therapist-dashboard', compact('contacts'));
    }
    public function viewContactAnswers($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $contactDate = $contact->created_at->toDateString();

        // Fetch the answer based on user_id and contact date, eager load phychotherapyType
        $answer = Answer::with('phychotherapyType.questions')
            ->where('user_id', $contact->user_id)
            ->whereDate('created_at', $contactDate)
            ->first();

        // Fetch the user information
        $user = User::findOrFail($contact->user_id);

        return view('therapist.answers', compact('contact', 'answer', 'contactDate', 'user'));
    }
    public function showPatientsList()
    {
        // Fetch all unique users who have contacted the therapist more than once and paginate them
        $contacts = Contact::with('user')  // Eager load the user
            ->where('therapist_id', auth()->user()->id)  // Filter by therapist_id
            ->select('user_id')  // Select only user_id to avoid loading unnecessary data
            ->distinct()
            ->paginate(10);  // Paginate the results (10 per page)

        return view('therapist.patient-list', compact('contacts'));
    }
    // Show all records (answers) for a specific patient
    public function viewPatientRecords($userId)
    {
        // Retrieve all answers for the user, ordered by created_at
        $answers = Answer::where('user_id', $userId)->with('phychotherapyType.questions')->orderBy('created_at', 'desc')->get();

        // Retrieve the user information
        $user = User::findOrFail($userId);

        return view('therapist.patient-records', compact('answers', 'user'));
    }
}
