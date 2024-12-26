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
                        <a href="#logout" class="flex items-center space-x-4 text-white hover:bg-cyan-500 p-3 rounded">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Profile</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Info -->
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">Personal Information</h3>
                        <p><strong>Name:</strong> John Doe</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Phone:</strong> +123 456 7890</p>
                    </div>

                    <!-- Professional Info -->
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">Professional Information</h3>
                        <p><strong>Specialization:</strong> Cognitive Behavioral Therapy</p>
                        <p><strong>Experience:</strong> 5 years</p>
                        <p><strong>Qualifications:</strong> Licensed Therapist, M.Sc. in Psychology</p>
                    </div>
                </div>

                <!-- Update Button -->
                <div class="mt-6">
                    <button class="bg-cyan-700 text-white px-6 py-2 rounded hover:bg-cyan-800">Edit Profile</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
