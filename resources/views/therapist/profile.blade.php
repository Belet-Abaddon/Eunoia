<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-cyan-700 text-white flex flex-col">
            <div class="p-6">
                <h1 class="text-3xl font-bold">EUNOIA</h1>
            </div>
            <nav class="flex-1">
                <ul class="space-y-4 p-6">
                    <li>
                        <a href="/therapist-dashboard"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/patients-list"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-users"></i>
                            <span>Patients List</span>
                        </a>
                    </li>
                    <li>
                        <a href="/profile-therapist"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-id-card"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <!-- Logout Button with Form -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded w-full text-left">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-2xl font-bold mb-4">Profile</h2>

                <!-- Fetching therapist details from the authenticated user -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Info -->
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">Personal Information</h3>
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Country:</strong> {{ Auth::user()->country }}</p>
                        <!-- Assuming 'country' is used for phone prefix -->
                    </div>

                    <!-- Professional Info -->
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">Professional Information</h3>
                        <p><strong>Specialization:</strong> {{ Auth::user()->specialists ?? 'Not provided' }}</p>
                        <p><strong>Experience:</strong> {{ Auth::user()->experience }} years</p>
                        <p><strong>Degree:</strong> {{ Auth::user()->degree ?? 'Not provided' }}</p>
                        <p><strong>University:</strong> {{ Auth::user()->university ?? 'Not provided' }}</p>
                    </div>
                </div>

                <!-- Schedule Section -->
                <div class="mt-6">
                    <h3 class="text-xl font-semibold mb-4">Schedule</h3>

                    <!-- Group schedules by day -->
                    @php
                        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                        $groupedSchedules = collect($daysOfWeek)->mapWithKeys(function ($day) use ($schedules) {
                            return [$day => $schedules->where('date', $day)];
                        });
                    @endphp
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ($groupedSchedules as $day => $daySchedules)
                            @if ($daySchedules->isNotEmpty())
                                <div class="bg-gray-100 p-4 mb-4 rounded-lg">
                                    <h4 class="text-lg font-semibold">{{ $day }}</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        @foreach ($daySchedules as $index => $schedule)
                                                <div class="mb-4">
                                                    <p><strong>Start Time:</strong>
                                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}</p>
                                                    <p><strong>End Time:</strong>
                                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</p>
                                                    <p><strong>Zoom Link:</strong> <a href="{{ $schedule->zoom_link }}"
                                                            class="text-cyan-600" target="_blank">Join Zoom</a></p>
                                                </div>
                                                @if (($index + 1) % 2 == 0 && !$loop->last)
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-4">
                                                @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if ($schedules->isEmpty())
                        <p>No scheduled sessions available.</p>
                    @endif
                </div>

                <!-- Update Button -->
                <div class="mt-3">
                    <a href="/profile" class="bg-cyan-700 text-white px-6 py-2 rounded hover:bg-cyan-800">Edit
                        Profile</a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>