<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ScheduleController extends Controller
{
    public function show()
    {
        $therapists = User::where('role', 2)->get();
        $schedules = Schedule::with('therapist')->get();
        return view('admin.schedule', compact('therapists', 'schedules'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'therapist_id' => 'required|exists:users,id',
            'date' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'zoom_link' => 'required|url',
        ]);

        Schedule::create($validatedData);

        return redirect()->route('admin.schedule')->with('success', 'Schedule created successfully.');
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $schedule = Schedule::findOrFail($id);

        // Update basic fields
        $schedule->therapist_id = $request->input('therapist_id');
        $schedule->date = $request->input('date');
        $schedule->start_time = $request->input('start_time');
        $schedule->end_time = $request->input('end_time');

        // Save updated schedule
        $schedule->save();

        return redirect()->back();
    }
    public function destroy($id)
    {
        // Find the schedule by ID and delete
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        // Redirect back with a success message
        return redirect()->route('admin.schedule')->with('success', 'Schedule deleted successfully.');
    }
}
