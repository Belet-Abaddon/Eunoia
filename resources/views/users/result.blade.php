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

        <!-- Pie Chart -->
        <div class="text-center mb-8 w-[300px] h-[300px]">
            <canvas id="resultChart" class=""></canvas>
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
</body>

</html>
