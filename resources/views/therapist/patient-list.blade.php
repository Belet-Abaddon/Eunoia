<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients List</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <div class="container mx-auto p-8">
            <h2 class="text-2xl font-bold mb-4">Patients List</h2>

            <!-- Patients Table -->
            <table class="min-w-full table-auto border-collapse border border-gray-300 mb-6">
                <thead>
                    <tr class="bg-cyan-600 text-white">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Age</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Country</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                                            @php
                                                // Fetch user details for the contact
                                                $user = $contact->user;
                                            @endphp
                                            <tr class="border-b">
                                                <td class="px-4 py-2">{{ $user->name }}</td>
                                                <td class="px-4 py-2">{{ $user->email }}</td>
                                                <td class="px-4 py-2">{{ $user->age }}</td>
                                                <td class="px-4 py-2">{{ ucfirst($user->gender) }}</td>
                                                <td class="px-4 py-2">{{ $user->country }}</td>
                                                <td class="px-4 py-2">
                                                    <a href="{{ route('patient.records', $user->id) }}" class="text-cyan-600 hover:text-cyan-800">View All
                                                        Records</a>
                                                </td>
                                            </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $contacts->links() }} <!-- Display pagination links -->
            </div>
        </div>
    </div>
</body>

</html>