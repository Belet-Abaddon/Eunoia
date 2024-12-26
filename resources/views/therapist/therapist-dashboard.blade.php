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
                        <a href="#logout" class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 bg-gray-100 p-6">
            <!-- Total Patients Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <!-- Total Patients Card -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center">
                    <div class="flex-shrink-0">
                        <div class="text-white bg-cyan-600 rounded-full h-12 w-12 flex items-center justify-center">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-700">Total Patients</h3>
                        <p class="text-2xl font-bold text-gray-900">15</p>
                    </div>
                </div>
            </div>

            <!-- Placeholder for Other Content -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-700">Dashboard Content</h2>
                <p class="text-gray-600 mt-2">This is where other dashboard content will go.</p>
            </div>
        </main>
    </div>
</body>

</html>