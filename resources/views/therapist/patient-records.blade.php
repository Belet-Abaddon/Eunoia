<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Answers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-8 text-center">Records for {{ $user->name }}</h2>

        <!-- Loop through each date and display answers for each day -->
        @php
            $dates = $answers->groupBy(function($date) {
                return \Carbon\Carbon::parse($date->created_at)->format('Y-m-d');
            });
        @endphp

        <!-- Display each date -->
        @foreach ($dates as $date => $answerGroup)
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-cyan-700">{{ \Carbon\Carbon::parse($date)->format('F j, Y') }}</h3>
                    <button 
                        class="bg-cyan-600 text-white px-4 py-2 rounded-lg focus:outline-none hover:bg-cyan-700"
                        onclick="toggleAnswers('{{ $date }}')">
                        View Answers
                    </button>
                </div>

                <!-- Answers for this date (Initially hidden) -->
                <div id="answers-{{ $date }}" class="mt-4 hidden">
                    @foreach ($answerGroup as $answer)
                        <div class="border-b pb-4 mb-4">
                            <div class="font-semibold text-cyan-700 mb-2">
                                <h4>Psychotherapy Type: {{ $answer->phychotherapyType->name }}</h4>
                                <span class="text-sm text-gray-500">Percentage: {{ $answer->percentage }}%</span>
                            </div>

                            <!-- Show questions and answers in simple format -->
                            @foreach ($answer->phychotherapyType->questions as $index => $question)
                                <div class="mb-4">
                                    <p class="font-semibold">Question {{ $index + 1 }}: {{ $question->question }}</p>
                                    <p><strong>Answer:</strong> {{ $answer["answer" . ($index + 1)] }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Back to Patients List -->
        <div class="mt-6 text-center">
            <a href="{{ route('patients.list') }}" class="bg-cyan-600 text-white px-8 py-3 rounded-lg hover:bg-cyan-800 transition">Back to Patients List</a>
        </div>
    </div>

    <script>
        // Toggle the visibility of the answers for each date
        function toggleAnswers(date) {
            const answersDiv = document.getElementById('answers-' + date);
            if (answersDiv.classList.contains('hidden')) {
                answersDiv.classList.remove('hidden');
            } else {
                answersDiv.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
