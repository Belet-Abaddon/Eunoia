<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychological Testing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Dropdown visibility with transition */
        .dropdown-menu {
            transition: opacity 0.3s ease, visibility 0.3s ease;
            position: absolute;
            right: 0;
            top: 100%;
            width: 300px;
            z-index: 10;
        }

        .group:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
        }

        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
        }

        /* Notification bell spacing */
        .notification-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .notification-bell {
            margin-right: 20px;
        }
    </style>
</head>

<body class="bg-light-green text-gray-800 font-sans">
    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <h1 class="text-3xl font-bold text-cyan-700">EUNOIA</h1>
            </div>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-gray-700 hover:text-cyan-500 text-lg">Home</a>
                <a href="#about-us" class="text-gray-700 hover:text-cyan-500 text-lg">About Us</a>
                <a href="#our-services" class="text-gray-700 hover:text-cyan-500 text-lg">Our Services</a>
                <a href="#blog" class="text-gray-700 hover:text-cyan-500 text-lg">Blog</a>
                <a href="#contact" class="text-gray-700 hover:text-cyan-500 text-lg">Contact</a>
            </nav>

            <!-- Right Side: Notification Bell and Sign Up/Login -->
            <div class="flex items-center space-x-6">
                <!-- Notification Icon and Dropdown -->
                <div class="relative group notification-container">
                    <button class="text-gray-700 notification-bell">
                        <i class="fas fa-bell text-2xl"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div class="dropdown-menu bg-white shadow-md rounded-lg py-2">
                        @foreach ($contacts as $contact)
                            <div class="px-4 py-2 flex items-center space-x-2 border-b">
                                <div class="flex-1 text-sm">
                                    <strong>{{ $contact->therapist->name }}</strong><br>
                                    <span class="text-gray-600">Zoom Link:</span>
                                    <a href="{{ $contact->therapist->schedules->first()->zoom_link }}" target="_blank"
                                        class="inline-block text-white bg-cyan-600 hover:bg-cyan-700 px-4 py-2 rounded-full text-sm transition">
                                        Join Zoom
                                    </a><br>
                                    <span class="text-xs text-gray-500">Time:
                                        {{ $contact->created_at->format('h:i A, M d, Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                        @if ($contacts->isEmpty())
                            <div class="px-4 py-2 text-sm text-gray-500">No new notifications</div>
                        @endif
                    </div>
                </div>

                <!-- Sign Up / User Greeting -->
                <div>
                    @guest
                        <a href="{{ route('register') }}"
                            class="bg-cyan-500 text-white px-6 py-3 rounded hover:bg-cyan-700 text-lg">Sign Up</a>
                    @endguest

                    @auth
                        <span class="text-gray-700 font-medium text-lg">Hello, {{ Auth::user()->name }}</span>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Add your sections here -->

    <script>
        // Optional: Toggle dropdown menu
        const bellIcon = document.querySelector('.fa-bell');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        bellIcon.addEventListener('click', () => {
            dropdownMenu.classList.toggle('opacity-100');
            dropdownMenu.classList.toggle('visibility-visible');
        });
    </script>
</body>

</html>
