<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\PhychotherapyTypeRequest;
use App\Models\PhychotherapyType;
use Illuminate\Support\Facades\Auth;

class PhychotherapyTypeController extends Controller
{
    public function store(Request $request): View
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
        return view('admin.psycho-ty', compact('phychoTy'));
    }
    
}
