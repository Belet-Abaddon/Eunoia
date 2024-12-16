<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AnswerController extends Controller
{
    // Store answers, calculate percentage, and redirect to result page
    public function storeAnswers(Request $request)
    {
        // Get the submitted answers
        $answers = $request->input('answers', []);

        // Ensure exactly 10 answers are collected
        $mappedAnswers = array_fill(1, 10, null);

        $index = 1;
        foreach ($answers as $questionId => $answer) {
            if ($index > 10) {
                break; // Stop if more than 10 answers are provided
            }
            $mappedAnswers[$index] = $answer;
            $index++;
        }

        // Calculate the total score
        $totalScore = array_sum($mappedAnswers);

        // Calculate the percentage
        $maxScore = count($answers) * 10; // Each answer is between 1 and 10
        $percentage = ($totalScore / $maxScore) * 100;

        // Insert the data into the database
        $answer = Answer::create([
            'answer1' => $mappedAnswers[1],
            'answer2' => $mappedAnswers[2],
            'answer3' => $mappedAnswers[3],
            'answer4' => $mappedAnswers[4],
            'answer5' => $mappedAnswers[5],
            'answer6' => $mappedAnswers[6],
            'answer7' => $mappedAnswers[7],
            'answer8' => $mappedAnswers[8],
            'answer9' => $mappedAnswers[9],
            'answer10' => $mappedAnswers[10],
            'percentage' => $percentage,
            'phychotherapy_type_id' => $request->input('phychotherapy_type_id'),
            'user_id' => Auth::user()->id,
        ]);

        // Redirect to the result page
        return redirect()->route('result.show', ['answerId' => $answer->id]);
    }


    // Show result and display the pie chart based on the percentage
    public function showResult($answerId)
    {
        $answer = Answer::findOrFail($answerId);
        $percentage = $answer->percentage;
        $therapists = User::where('role', 2)->with('schedules')->get();

        // Determine the message based on the percentage
        if ($percentage >= 70) {
            $message = "You need to talk with a Therapist.";
        } else {
            $message = "You will be fine.";
        }

        return view('users.result', compact('percentage', 'message', 'therapists'));
    }
}
