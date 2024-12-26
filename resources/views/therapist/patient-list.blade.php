<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Therapist Dashboard - Patient List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
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
        <main class="flex-1 p-6">
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-xl font-bold mb-4">Patient List</h2>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 border">#</th>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Email</th>
                                <th class="px-4 py-2 border">Contact</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">1</td>
                                <td class="px-4 py-2 border">John Doe</td>
                                <td class="px-4 py-2 border">john@example.com</td>
                                <td class="px-4 py-2 border">+123456789</td>
                                <td class="px-4 py-2 border">
                                    <button
                                        class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-700">View</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">2</td>
                                <td class="px-4 py-2 border">Jane Smith</td>
                                <td class="px-4 py-2 border">jane@example.com</td>
                                <td class="px-4 py-2 border">+987654321</td>
                                <td class="px-4 py-2 border">
                                    <button
                                        class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-700">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>