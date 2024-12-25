<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-50">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <header class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-cyan-700">Your Results</h1>
            <p class="text-gray-500 mt-3 text-lg">{{ $message }}</p>
        </header>

        <!-- Results Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Pie Chart -->
            <div class="flex justify-center items-center bg-white p-6 rounded-lg shadow-lg lg:col-span-1">
                <canvas id="resultChart" class="w-[300px] h-[300px]"></canvas>
            </div>

            <!-- Therapist List -->
            <div class="bg-white p-6 rounded-xl shadow-lg lg:col-span-2">
                <h2 class="text-2xl font-bold text-cyan-700 mb-6 text-center">Therapist List</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-cyan-600 text-white">
                                <th class="px-4 py-3 border border-gray-300">Name</th>
                                <th class="px-4 py-3 border border-gray-300">Specialists</th>
                                <th class="px-4 py-3 border border-gray-300">Schedule</th>
                                <!-- <th class="px-4 py-3 border border-gray-300">Zoom Link</th> -->
                                <th class="px-4 py-3 border border-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($therapists as $therapist)
                                <tr class="odd:bg-gray-50 even:bg-gray-100">
                                    <!-- Therapist Name -->
                                    <td class="px-4 py-3 border border-gray-300">
                                        <span class="font-semibold text-gray-800">{{ $therapist->name }}</span>
                                    </td>
                                    <!-- Specialists -->
                                    <td class="px-4 py-3 border border-gray-300">
                                        <span class="text-gray-600">{{ $therapist->specialists }}</span>
                                    </td>
                                    <!-- Schedule -->
                                    <td class="px-4 py-3 border border-gray-300">
                                        @if($therapist->schedules->isEmpty())
                                            <span class="text-red-500 text-sm">No schedules</span>
                                        @else
                                            <ul class="text-sm text-gray-600">
                                                @foreach ($therapist->schedules as $schedule)
                                                    <li>{{ $schedule->date }} |
                                                        {{ $schedule->start_time }} - {{ $schedule->end_time }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <!-- Zoom Link -->
                                    <!-- <td class="px-4 py-3 border border-gray-300">
                                        @if($therapist->schedules->isEmpty())
                                            <span class="text-gray-400 text-sm">N/A</span>
                                        @else
                                            <a href="{{ $therapist->schedules->first()->zoom_link }}"
                                                class="text-cyan-600 underline text-sm">
                                                Zoom
                                            </a>
                                        @endif
                                    </td> -->
                                    <!-- Contact Button -->
                                    <td class="px-4 py-3 border border-gray-300 text-center">
                                        <form action="{{ route('contacts.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="therapist_id" value="{{ $therapist->id }}">
                                            <button type="submit"
                                                class="bg-cyan-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-cyan-700 transition">
                                                Contact
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg text-center my-8">
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

        <!-- Psychology Websites Section -->
        <div class="mt-16 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-cyan-700 mb-6 text-center">Learn More About Psychology</h2>
            <p class="text-gray-500 text-center mb-6">
                Explore these trusted websites to learn more about psychology and mental health.
            </p>
            <ul class="space-y-4">
                @foreach ([['url' => 'https://www.apa.org', 'name' => 'American Psychological Association (APA)'], ['url' => 'https://www.verywellmind.com', 'name' => 'Verywell Mind'], ['url' => 'https://www.psychologytoday.com', 'name' => 'Psychology Today'], ['url' => 'https://www.nimh.nih.gov', 'name' => 'National Institute of Mental Health (NIMH)']] as $site)
                    <li>
                        <a href="{{ $site['url'] }}" target="_blank"
                            class="flex justify-between bg-gray-50 p-4 rounded-lg shadow hover:bg-cyan-50 transition">
                            <span class="text-lg font-medium text-cyan-700">{{ $site['name'] }}</span>
                            <span class="text-sm text-gray-500">{{ $site['url'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <footer class="bg-gray-800 text-gray-200 py-8 mt-16">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 PsycH Testing Online. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
    const ctx = document.getElementById('resultChart').getContext('2d');
    const percentage = {{ $percentage ?? 0 }}; // Default to 0 if undefined
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

    if (ctx) {
        new Chart(ctx, config);
    } else {
        console.error('Canvas context not found.');
    }
</script>

</body>

</html>
