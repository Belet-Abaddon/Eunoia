<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">
    @include('users.user-header')

    <div class="container mx-auto p-6">
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-cyan-700">Your Results</h1>
            <p class="text-gray-600 mt-2">{{ $message }}</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Pie Chart -->
            <div class="text-center mb-8 w-full flex justify-center">
                <div class="w-[300px] h-[300px]">
                    <canvas id="resultChart"></canvas>
                </div>
            </div>

            <!-- Therapist List -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h2 class="text-2xl font-bold text-cyan-700 mb-4">Therapist List</h2>
                <ul class="space-y-4">
                    @foreach ($therapists as $therapist)
                        <li class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow">
                            <div>
                                <p class="text-lg font-semibold text-gray-800">Name: {{ $therapist->name }}</p>
                                <p class="text-sm text-gray-600">Specialists: {{ $therapist->specialists }}</p>
                            </div>

                            <form action="{{ route('contacts.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="therapist_id" value="{{ $therapist->id }}">
                                <button type="submit"
                                    class="bg-cyan-600 text-white px-4 py-2 rounded-lg hover:bg-cyan-700 transition">
                                    Contact
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div><br>
        @if (session('success'))
            <div
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 w-[80%] mx-auto text-center">
                {{ session('success') }}
            </div>
        @endif


        <!-- Go Home Button -->
        <div class="text-center mt-12">
            <a href="{{ route('user.home') }}"
                class="bg-cyan-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-cyan-700 transition">
                Go Home
            </a>
        </div>
        <!-- Section for Psychology Websites -->
        <div class="mt-12 bg-white p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl font-bold text-cyan-700 mb-4 text-center">Learn More About Psychology</h2>
            <p class="text-gray-600 text-center mb-6">
                Explore these trusted websites to learn more about psychology and mental health.
            </p>
            <ul class="space-y-4">
                <li>
                    <a href="https://www.apa.org" target="_blank"
                        class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow hover:bg-cyan-50 transition">
                        <span class="text-lg font-medium text-cyan-700">American Psychological Association (APA)</span>
                        <span class="text-sm text-gray-500">www.apa.org</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.verywellmind.com" target="_blank"
                        class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow hover:bg-cyan-50 transition">
                        <span class="text-lg font-medium text-cyan-700">Verywell Mind</span>
                        <span class="text-sm text-gray-500">www.verywellmind.com</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.psychologytoday.com" target="_blank"
                        class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow hover:bg-cyan-50 transition">
                        <span class="text-lg font-medium text-cyan-700">Psychology Today</span>
                        <span class="text-sm text-gray-500">www.psychologytoday.com</span>
                    </a>
                </li>
                <li>
                    <a href="https://www.nimh.nih.gov" target="_blank"
                        class="flex items-center justify-between bg-gray-50 p-4 rounded-lg shadow hover:bg-cyan-50 transition">
                        <span class="text-lg font-medium text-cyan-700">National Institute of Mental Health
                            (NIMH)</span>
                        <span class="text-sm text-gray-500">www.nimh.nih.gov</span>
                    </a>
                </li>
            </ul>
        </div>
        <script>
            const ctx = document.getElementById('resultChart').getContext('2d');
            const percentage = {{ $percentage }};
            const data = {
                labels: ['Percentage', 'Remaining'],
                datasets: [{
                    data: [percentage, 100 - percentage],
                    backgroundColor: ['#4ade80', '#e5e7eb'],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'pie',
                data: data,
            };

            const resultChart = new Chart(ctx, config);
        </script>
    </div>
    <footer class="bg-gray-800 text-gray-200 py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 PsycH Testing Online. All Rights Reserved.</p>
        </div>
    </footer>
</body>

</html>