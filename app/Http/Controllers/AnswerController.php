<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    // Store answers, calculate percentage, and redirect to result page
    public function storeAnswers(Request $request)
    {
        // Initialize an array to hold the answer values
        $answers = $request->input('answers', []);
        // Calculate the total score and prepare the answers
        $totalScore = 0;
        foreach ($answers as $answer) {
            $totalScore += $answer;
        }

        // The maximum score possible
        $maxScore = count($answers) * 10; // Assuming each answer is between 1 and 10
        $percentage = ($totalScore / $maxScore) * 100;
        
        // Create the answer record
        $answer = Answer::create([
            'answer1' => $answers['1'] ?? null,
            'answer2' => $answers['2'] ?? null,
            'answer3' => $answers['3'] ?? null,
            'answer4' => $answers['4'] ?? null,
            'answer5' => $answers['5'] ?? null,
            'answer6' => $answers['6'] ?? null,
            'answer7' => $answers['7'] ?? null,
            'answer8' => $answers['8'] ?? null,
            'answer9' => $answers['9'] ?? null,
            'answer10' => $answers['10'] ?? null,
            'percentage' => $percentage,
            'phychotherapy_type_id' => $request->input('phychotherapy_type_id'), // Ensure this value is passed
            'user_id' => Auth::user()->id, // Assuming the user is logged in
        ]);

        // Redirect to the result page with the answer ID
        return redirect()->route('result.show', ['answerId' => $answer->id]);
    }

    // Show result and display the pie chart based on the percentage
    public function showResult($answerId)
    {
        $answer = Answer::findOrFail($answerId);
        $percentage = $answer->percentage;

        // Determine the message based on the percentage
        if ($percentage >= 70) {
            $message = "You need to talk with a Therapist.";
        } else {
            $message = "You will be fine.";
        }

        return view('users.result', compact('percentage', 'message'));
    }
}
