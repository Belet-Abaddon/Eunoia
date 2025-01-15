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
    public function show(): View
    {
        $questions = Question::with('phychotherapyType')->paginate(10);
        $psychoTys = PhychotherapyType::get();
        return view('admin.question', compact('questions', 'psychoTys'));
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
    public function destroy($id)
    {
        // Find the category type by ID and delete
        $question = Question::findOrFail($id);
        $question->delete();

        // Redirect back with a success message
        return redirect()->route('admin.questionList')->with('success', 'Category type deleted successfully.');
    }
    public function showQuestions($phychotherapyTypeId)
    {
        $phychotherapyType = PhychotherapyType::findOrFail($phychotherapyTypeId);
        $questions = Question::where('phychotherapy_type_id', $phychotherapyTypeId)->get();
        return view('users.question', compact('phychotherapyType', 'questions'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate the query
        $request->validate([
            'query' => 'nullable|string|max:255',
        ]);

        // Search in 'question', 'description', and related 'phychotherapy_type' name
        $questions = Question::where('question', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhereHas('phychotherapyType', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->paginate(10); // Adjust the pagination count as needed
            $psychoTys = PhychotherapyType::get();
        return view('admin.question', compact('questions','psychoTys'));
    }
}
