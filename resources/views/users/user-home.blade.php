<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

<body>
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
    <!-- Hero Section -->
    <section id="home" class="bg-cyan-100 text-center py-40"
        style="background-image: url('/image/cover.jpg'); background-size: cover; background-position: center;">
        <h1 class="text-4xl font-bold text-cyan-600">Welcome to EUNOIA</h1>
        <p class="mt-4 font-bold text-gray-800">Your trusted online platform for psychological and cognitive testing.
        </p>
        <a href="#our-services"
            class="mt-6 inline-block bg-cyan-500 text-white px-6 py-3 rounded hover:bg-cyan-700">Explore Our
            Services</a>
    </section>

    <!-- About Section -->
    <section id="about-us" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-cyan-700 text-center mb-8">About Us</h2>
            <p class="text-gray-700 text-center max-w-3xl mx-auto mb-12">
                At EUNOIA Online, we are committed to providing reliable and accessible psychological testing
                services to help individuals and professionals. Our mission is to empower mental health awareness
                through technology.
            </p>

            <!-- Mission Section -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-bullseye text-cyan-700 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-cyan-700 text-center">Our Mission</h3>
                    <p class="text-gray-700 text-center mt-4">
                        Our mission is to make mental health testing more accessible, affordable, and effective by
                        leveraging
                        cutting-edge technology. We aim to provide individuals with accurate, actionable insights to
                        enhance their
                        mental well-being.
                    </p>
                </div>

                <!-- Vision Section -->
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-eye text-cyan-700 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-cyan-700 text-center">Our Vision</h3>
                    <p class="text-gray-700 text-center mt-4">
                        Our vision is to be a global leader in online psychological testing, creating a world where
                        mental health
                        is prioritized, and everyone has access to the tools they need to live healthier, more balanced
                        lives.
                    </p>
                </div>

                <!-- Philosophy Section -->
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-quote-left text-cyan-700 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-cyan-700 text-center">Our Philosophy</h3>
                    <p class="text-gray-700 text-center mt-4">
                        "Mental health is not a destination, but a journey." We believe in supporting every step of that
                        journey,
                        offering tools and insights to help individuals grow and thrive mentally and emotionally.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Our Services Section -->
    <section id="our-services" class="py-16 bg-cyan-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-cyan-700 text-center mb-8">Our Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                <!-- Psychometric Testing Box -->
                @foreach ($phychoTys as $phychoTy)
                    <a href="{{ route('user.questions', $phychoTy->id) }}"
                        class="bg-white shadow-lg rounded p-6 text-center hover:shadow-xl transition-all">
                        <h3 class="text-xl font-semibold text-cyan-700">{{ $phychoTy->name }}</h3>
                        <p class="text-gray-600 mt-2">{{ $phychoTy->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-cyan-700 text-center mb-8">Contact Us</h2>
            <p class="text-center text-gray-700 mb-12 max-w-2xl mx-auto">
                Have any questions? Reach out to us, and we’ll be happy to assist you with any information or support.
            </p>

            <!-- Contact Form -->
            <div class="flex flex-col md:flex-row justify-between gap-8">
                <div class="w-full md:w-1/2">
                    <form action="#" method="POST" class="bg-cyan-50 p-6 rounded-lg shadow-lg">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-semibold text-cyan-700">Full Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold text-cyan-700">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-sm font-semibold text-cyan-700">Message</label>
                            <textarea id="message" name="message" rows="4"
                                class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-cyan-700 text-white py-3 rounded-lg hover:bg-cyan-800 transition-all">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information with Icons -->
                <div class="w-full md:w-1/2">
                    <div class="bg-cyan-50 p-6 rounded-lg shadow-lg space-y-6">
                        <h3 class="text-2xl font-bold text-cyan-700">Our Contact Info</h3>

                        <!-- Address -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-cyan-700 text-xl"></i>
                            <p class="text-gray-700">
                                <strong>Address:</strong> 123 Mental Health St, Suite 456, City, Country
                            </p>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone-alt text-cyan-700 text-xl"></i>
                            <p class="text-gray-700">
                                <strong>Phone:</strong> +1 (123) 456-7890
                            </p>
                        </div>

                        <!-- Email -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-cyan-700 text-xl"></i>
                            <p class="text-gray-700">
                                <strong>Email:</strong> contact@psychtesting.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Google Map Embed -->
            <div class="mt-12">
                <h3 class="text-xl font-bold text-cyan-700 text-center mb-6">Find Us On The Map</h3>
                <div class="w-full h-64 rounded-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=YOUR_GOOGLE_MAP_EMBED_URL" width="100%"
                        height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 PsycH Testing Online. All Rights Reserved.</p>
        </div>
    </footer>

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