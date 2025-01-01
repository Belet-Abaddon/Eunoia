<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                        <a href="/dashboard"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/posts"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-pen"></i>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="/psychological-type"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-brain"></i>
                            <span>Psychological Type</span>
                        </a>
                    </li>
                    <li>
                        <a href="/questions"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-question-circle"></i>
                            <span>Question</span>
                        </a>
                    </li>
                    <li>
                        <a href="/users"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/therapists"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-user-md"></i>
                            <span>Therapists</span>
                        </a>
                    </li>
                    <li>
                        <a href="/schedule"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Schedule</span>
                        </a>
                    </li>
                    <li>
                        <!-- Sign Out Button -->
                        <button type="button"
                            class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded w-full text-left">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Sign Out</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6">
            <!-- Placeholder for Main Content -->
            <h1 class="text-3xl font-bold text-gray-700">Welcome to the Admin Dashboard</h1>
            <!-- Total Statistics Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Total Users Card -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="text-white bg-blue-600 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                        <p class="text-2xl font-bold text-gray-900">{{$totalUsers}}</p>
                    </div>
                </div>

                <!-- Total Admins Card -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="text-white bg-green-600 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-user-shield text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Admins</h3>
                        <p class="text-2xl font-bold text-gray-900">{{$totalAdmins}}</p>
                    </div>
                </div>

                <!-- Total Therapists Card -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="text-white bg-cyan-600 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-user-md text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Therapists</h3>
                        <p class="text-2xl font-bold text-gray-900">{{$totalTherapists}}</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
