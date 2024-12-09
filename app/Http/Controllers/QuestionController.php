<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PhychotherapyType;

class QuestionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'description' => 'required|max:255',
            'phychotherapy_type_id' => 'required|integer',
        ]);
        $data = [
            'question' => $validatedData['question'],
            'description' => $validatedData['description'],
            'phychotherapy_type_id' => $validatedData['phychotherapy_type_id'],
        ];
        $question = Question::create($data);
        return redirect()->route('admin.questionList');
    }
    public function show():View{
        $questions=Question::get();
        $psychoTys = PhychotherapyType::get();
        return view('admin.question',compact('questions','psychoTys'));
    }
    public function update(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $question = Question::findOrFail($id);
    
        // Update basic fields
        $question->question = $request->input('question');
        $question->description = $request->input('description');
        $question->phychotherapy_type_id = $request->input('phychotherapy_type_id');

        // Save updated category
        $question->save();
    
        return redirect()->back();
    }
}
