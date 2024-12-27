<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Answer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">
    <div class="flex flex-col items-center p-6">
        <!-- User Information and Pie Chart -->
        <div class="bg-white shadow-md rounded-lg w-full max-w-4xl p-6 mb-6">
            <div class="flex flex-col lg:flex-row items-start lg:items-center lg:justify-between">
                <!-- User Information -->
                <div class="w-full lg:w-1/2 p-4">
                    <h2 class="text-3xl font-bold text-gray-700 mb-4">User Information</h2>
                    <ul class="text-gray-600 text-lg">
                        <li><strong class="font-semibold mb-3">Name:</strong> {{ $user->name }}</li>
                        <li><strong class="font-semibold mb-3">Email:</strong> {{ $user->email }}</li>
                        <li><strong class="font-semibold mb-3">Age:</strong> {{ $user->age }}</li>
                        <li><strong class="font-semibold mb-3">Gender:</strong> {{ ucfirst($user->gender) }}</li>
                        <li><strong class="font-semibold mb-3">Country:</strong> {{ $user->country }}</li>
                    </ul>
                </div>

                <!-- Pie Chart -->
                <div class="flex justify-center items-center w-full lg:w-1/2 p-4">
                    <canvas id="percentageChart" class="w-[200px] h-[200px]"></canvas>
                </div>
            </div>
        </div>

        <!-- Answer Table -->
        <div class="bg-white shadow-md rounded-lg w-full max-w-4xl p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">
                Answer for Contact ID: {{ $contact->id }} (Date: {{ $contactDate }})
            </h2>

            @if ($answer)
                    <!-- Display Phychotherapy Type -->
                    <div class="mb-6">
                        <h2><strong>Psychotherapy Type:</strong> {{ $answer->phychotherapyType->name }}</h2>
                    </div>

                    <!-- Questions and Answers Table -->
                    <table class="min-w-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-cyan-600 text-white">
                                <th class="px-4 py-2">Question</th>
                                <th class="px-4 py-2">Answer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through questions related to the phychotherapyType -->
                            @foreach ($answer->phychotherapyType->questions as $question)
                                            <tr class="border-b">
                                                <td class="px-4 py-2">{{ $question->question }}</td>
                                                <td class="px-4 py-2">
                                                    <!-- Dynamically show the corresponding answer -->
                                                    @php
                                                        $answerField = 'answer' . $loop->iteration; // This will generate answer1, answer2, etc.
                                                    @endphp
                                                    {{ $answer->$answerField }}
                                                </td>
                                            </tr>
                            @endforeach

                            <!-- Display the percentage -->
                            <tr class="border-b">
                                <td class="px-4 py-2">Percentage</td>
                                <td class="px-4 py-2">{{ $answer->percentage }}%</td>
                            </tr>
                        </tbody>
                    </table>
            @else
                <p class="text-gray-600">No answer found for this contact.</p>
            @endif
            <div class="mt-6">
                <a href="{{ route('therapist.dashboard') }}"
                    class="text-white bg-cyan-600 px-4 py-2 rounded hover:bg-cyan-800">Back to Contacts</a>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('percentageChart').getContext('2d');
        const percentage = {{ $answer->percentage ?? 0 }};
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Achieved', 'Remaining'],
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#0d98ba', '#ff9999'], // Light Green and Light Red
                    hoverBackgroundColor: ['#5EC9CC', '#ff6666'] // Slightly Darker Green and Red for Hover
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

</body>

</html>