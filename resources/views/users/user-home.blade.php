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
            <nav class="hidden md:flex items-center space-x-10">
                <a href="#home" class="text-gray-700 hover:text-cyan-500 text-lg">Home</a>
                <a href="#about-us" class="text-gray-700 hover:text-cyan-500 text-lg">About Us</a>
                <a href="#our-services" class="text-gray-700 hover:text-cyan-500 text-lg">Our Services</a>
                <a href="#posts" class="text-gray-700 hover:text-cyan-500 text-lg">Posts</a>
                <a href="#contact" class="text-gray-700 hover:text-cyan-500 text-lg">Contact</a>
            </nav>

            <!-- Right Side: Notification Bell and Sign Up/Login -->
            <div class="flex items-center space-x-10">
                @guest
                    <a href="{{ route('register') }}"
                        class="bg-cyan-500 text-white px-6 py-3 rounded hover:bg-cyan-700 text-lg">Sign Up</a>
                @endguest

                @auth
                    <!-- Notification Icon and Dropdown -->
                    <div class="relative">
                        <button id="notification-bell" class="text-gray-700 hover:text-cyan-500">
                            <i class="fas fa-bell text-2xl"></i>
                        </button>
                        <!-- Dropdown Menu -->
                        <div id="notification-dropdown"
                            class="absolute right-0 mt-2 w-80 bg-white shadow-xl rounded-lg overflow-hidden hidden border border-gray-200">
                            @forelse ($contacts as $contact)
                                <div class="p-4 border-b">
                                    <div class="text-sm">
                                        <!-- Therapist Name -->
                                        <strong class="block text-gray-900 font-semibold text-base mb-1">
                                            {{ $contact->therapist->name }}
                                        </strong>

                                        <!-- Schedule Details -->
                                        <div class="mt-2 space-y-2">
                                            @foreach ($contact->therapist->schedules as $schedule)
                                                <div class="bg-gray-50 p-2 rounded-lg shadow-sm">
                                                    <span class="block text-gray-600 text-xs font-medium">
                                                        Date: <span class="text-gray-800">{{ $schedule->date }}</span>
                                                    </span>
                                                    <span class="block text-gray-600 text-xs font-medium">
                                                        Start Time: <span class="text-gray-800">{{ $schedule->start_time }}</span>
                                                    </span>
                                                    <span class="block text-gray-600 text-xs font-medium">
                                                        End Time: <span class="text-gray-800">{{ $schedule->end_time }}</span>
                                                    </span>
                                                    <a href="{{ $schedule->zoom_link }}" target="_blank"
                                                        class="mt-1 inline-block text-cyan-600 hover:text-cyan-800 text-sm font-medium">
                                                        Join Zoom
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="px-4 py-2 text-sm text-gray-500 text-center">
                                    No new notifications
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <a href="/profile" class="text-gray-700 font-medium text-lg">Hello, {{ Auth::user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-cyan-500 text-white px-6 py-3 rounded hover:bg-cyan-700 text-lg">Logout</button>
                    </form>
                @endauth
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
            <h2 class="text-4xl font-bold text-cyan-700 text-center mb-12">About Us</h2>
            <p class="text-gray-700 text-center max-w-4xl mx-auto mb-16 leading-relaxed">
                At <strong>EUNOIA Online</strong>, we are dedicated to revolutionizing mental health care by providing
                innovative, reliable, and accessible psychological testing solutions.
                Our focus is on empowering individuals, families, and professionals with tools that foster
                self-awareness, personal growth, and emotional resilience.
                We aim to bridge the gap between technology and mental health, creating a seamless platform where users
                can access the support they need, anytime, anywhere.
            </p>

            <!-- Core Values Section -->
            <h3 class="text-3xl font-semibold text-cyan-700 text-center mb-8">Our Core Values</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all text-center">
                    <i class="fas fa-hand-holding-heart text-cyan-700 text-4xl mb-4"></i>
                    <h4 class="text-xl font-bold text-cyan-700">Empathy</h4>
                    <p class="text-gray-700 mt-2">We place empathy at the heart of our mission, ensuring every solution
                        we design resonates with the needs of individuals.</p>
                </div>
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all text-center">
                    <i class="fas fa-brain text-cyan-700 text-4xl mb-4"></i>
                    <h4 class="text-xl font-bold text-cyan-700">Innovation</h4>
                    <p class="text-gray-700 mt-2">We constantly innovate, integrating advanced technologies to make
                        mental health solutions more effective and accessible.</p>
                </div>
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all text-center">
                    <i class="fas fa-users text-cyan-700 text-4xl mb-4"></i>
                    <h4 class="text-xl font-bold text-cyan-700">Inclusivity</h4>
                    <p class="text-gray-700 mt-2">We strive to create solutions that cater to diverse backgrounds,
                        ensuring everyone feels represented and supported.</p>
                </div>
                <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all text-center">
                    <i class="fas fa-globe text-cyan-700 text-4xl mb-4"></i>
                    <h4 class="text-xl font-bold text-cyan-700">Global Reach</h4>
                    <p class="text-gray-700 mt-2">We envision a world where everyone, regardless of location, has access
                        to quality mental health resources.</p>
                </div>
            </div>

            <!-- Therapists Section -->
            <h3 class="text-3xl font-semibold text-cyan-700 text-center mb-8">Meet Our Therapists</h3>
            <p class="text-gray-700 text-center max-w-3xl mx-auto mb-12 leading-relaxed">
                Our team of dedicated therapists is here to support your mental health journey. Get to know more about
                them below.
            </p>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($therapists as $therapist)
                    <div class="bg-cyan-50 p-6 rounded-lg shadow-lg hover:shadow-xl transition-all text-center">
                        @if($therapist->profile)
                            <img src="{{ asset('storage/' . $therapist->profile) }}" alt="Therapist"
                                class="rounded-full w-36 h-36 mx-auto mb-4 object-cover">
                        @else
                            <img src="default-profile.jpg" alt="Therapist"
                                class="rounded-full w-36 h-36 mx-auto mb-4 object-cover"> <!-- Default image -->
                        @endif
                        <h4 class="text-xl font-bold text-cyan-700">{{ $therapist->name }}</h4>
                        <p class="text-gray-600">{{ $therapist->specialists }}</p>
                        <p class="text-gray-600">{{ $therapist->degree }}</p>
                    </div>
                @endforeach
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

    <!-- Posts Section with Carousel -->
    <section id="posts" class="py-16 bg-white">
        <h2 class="text-3xl font-bold text-cyan-700 text-center mb-8">Latest Posts</h2>
        @if($latestPosts->count() > 0)
            <div class="relative overflow-hidden">
                <!-- Carousel Wrapper -->
                <div id="carouselItems" class="flex transition-transform duration-300">
                    @foreach($latestPosts as $post)
                        <div class="min-w-[350px] flex-shrink-0 p-6"> <!-- Increased card width and padding -->
                            <div class="bg-cyan-50 border border-cyan-700 rounded-lg shadow-lg p-6">
                                <!-- Increased card padding -->
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Blog Image"
                                    class="rounded-lg object-cover w-full mb-4" style="height: 250px;">
                                <!-- Increased image height -->
                                <div class="p-4">
                                    <h2 class="text-2xl font-semibold text-cyan-700">{{ $post->caption }}</h2>
                                    <div class="flex justify-between mt-4">
                                        <a href="{{ route('userHome.postDetail', $post->id) }}"
                                            class="inline-block px-4 py-2 bg-cyan-700 text-white text-sm rounded hover:bg-cyan-800">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- See More Button -->
                    <div class="min-w-[350px] flex-shrink-0 p-6">
                        <div
                            class="bg-cyan-50 border border-cyan-700 rounded-lg shadow-lg flex items-center justify-center h-full p-6">
                            <a href="{{route('user.posts')}}"
                                class="inline-block px-6 py-3 bg-cyan-700 text-white font-bold rounded-lg hover:bg-cyan-800">
                                See More Posts
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Left and Right Arrows -->
                <button id="prevBtn"
                    class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-cyan-700 text-white p-2 rounded-full hover:bg-cyan-800">
                    &#10094;
                </button>
                <button id="nextBtn"
                    class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-cyan-700 text-white p-2 rounded-full hover:bg-cyan-800">
                    &#10095;
                </button>
            </div>
        @else
            <p class="text-center text-gray-500">No blog posts available.</p>
        @endif
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-cyan-50">
        <div class="container mx-auto px-6 md:px-12 lg:px-20">
            <h2 class="text-4xl font-bold text-cyan-700 text-center mb-12">Get in Touch</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Organization Information -->
                <div class="space-y-8">
                    <!-- Address -->
                    <div class="flex items-center">
                        <div class="bg-cyan-100 p-4 rounded-full mr-4">
                            <i class="fas fa-map-marker-alt text-cyan-700 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-cyan-700">Our Address</h3>
                            <p class="text-gray-600">123 Main Street, Yangon, Myanmar</p>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="flex items-center">
                        <div class="bg-cyan-100 p-4 rounded-full mr-4">
                            <i class="fas fa-phone text-cyan-700 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-cyan-700">Call Us</h3>
                            <p class="text-gray-600">+959407123478</p>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="flex items-center">
                        <div class="bg-cyan-100 p-4 rounded-full mr-4">
                            <i class="fas fa-envelope text-cyan-700 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-cyan-700">Email Us</h3>
                            <p class="text-gray-600">eunoia@organization.com</p>
                        </div>
                    </div>
                    <!-- Working Hours -->
                    <div class="flex items-center">
                        <div class="bg-cyan-100 p-4 rounded-full mr-4">
                            <i class="fas fa-clock text-cyan-700 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-cyan-700">Working Hours</h3>
                            <p class="text-gray-600">Mon-Fri: 9 AM - 5 PM</p>
                        </div>
                    </div>
                </div>

                <!-- Decorative Contact Box -->
                <div class="bg-cyan-700 text-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                    <p class="mb-4">
                        Reach out to us for inquiries, collaborations, or support. Our team is here to assist you!
                    </p>
                    <p>
                        <strong>Need help?</strong> Send us an email, or give us a call during our business hours. We’re
                        happy to assist!
                    </p>
                    <div class="mt-6">
                        <a href="mailto:eunoia@organization.com"
                            class="inline-block px-6 py-3 bg-white text-cyan-700 font-bold rounded-lg shadow hover:bg-gray-100">
                            Email Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Eunoia Online. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Add your sections here -->

    <!-- JavaScript for Notification Dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bell = document.getElementById('notification-bell');
            const dropdown = document.getElementById('notification-dropdown');

            bell.addEventListener('click', function () {
                dropdown.classList.toggle('hidden'); // Show or hide the dropdown
            });

            // Close the dropdown if clicked outside
            document.addEventListener('click', function (e) {
                if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    </script>
    <script>
        const carouselItems = document.getElementById('carouselItems');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        let scrollPosition = 0;
        const cardWidth = 300 + 16; // Card width + margin (adjust as needed)

        prevBtn.addEventListener('click', () => {
            scrollPosition = Math.max(scrollPosition - cardWidth, 0);
            carouselItems.style.transform = `translateX(-${scrollPosition}px)`;
        });

        nextBtn.addEventListener('click', () => {
            scrollPosition = Math.min(scrollPosition + cardWidth, carouselItems.scrollWidth - carouselItems.offsetWidth);
            carouselItems.style.transform = `translateX(-${scrollPosition}px)`;
        });
    </script>

</body>

</html>