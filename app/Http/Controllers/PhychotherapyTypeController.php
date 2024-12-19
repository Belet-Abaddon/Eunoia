<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\PhychotherapyTypeRequest;
use App\Models\PhychotherapyType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PhychotherapyTypeController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|max:255',
        ]);
        $data = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ];
        $phychoTy = PhychotherapyType::create($data);
        return redirect()->route('admin.psychoTyList');
    }

    public function show(): View
    {
        $phychoTys = PhychotherapyType::paginate(5); // Display 10 items per page
        return view('admin.psycho-ty', compact('phychoTys'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $psychoType = PhychotherapyType::findOrFail($id);

        // Update basic fields
        $psychoType->name = $request->input('name');
        $psychoType->description = $request->input('description');

        // Save updated category
        $psychoType->save();

        return redirect()->back();
    }
    public function destroy($id)
    {
        // Find the category type by ID and delete
        $phychoTy = PhychotherapyType::findOrFail($id);
        $phychoTy->delete();

        // Redirect back with a success message
        return redirect()->route('admin.psychoTyList')->with('success', 'Category type deleted successfully.');
    }
    public function showPhychoTyList(): View
    {
        $phychoTys = PhychotherapyType::get();
        return view('users.user-home', compact('phychoTys'));
    }
}
