<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psychological Testing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Custom delay for dropdown visibility */
        .dropdown-menu {
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .group:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
        }

        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>
<body class="bg-light-green text-gray-800 font-sans">
    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <h1 class="text-2xl font-bold text-cyan-700">EUNOIA</h1>
            </div>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="#home" class="text-gray-700 hover:text-cyan-500">Home</a>
                <a href="#about-us" class="text-gray-700 hover:text-cyan-500">About Us</a>

                <!-- Dropdown Menu -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-cyan-500">Our Services</button>
                    <div class="absolute left-0 mt-2 w-48 bg-white shadow-md rounded dropdown-menu">
                        @foreach ($phychoTys as $phychoTy)
                        <a href="#psych-assessment" class="block px-4 py-2 text-sm hover:bg-cyan-100">{{$phychoTy->name}}</a>
                        @endforeach
                        <!-- <a href="#psych-assessment" class="block px-4 py-2 text-sm hover:bg-cyan-100">Psychological Assessment</a>
                        <a href="#psychometric-testing" class="block px-4 py-2 text-sm hover:bg-cyan-100">Psychometric Testing</a>
                        <a href="#adhd-testing" class="block px-4 py-2 text-sm hover:bg-cyan-100">ADHD Testing</a>
                        <a href="#autism-testing" class="block px-4 py-2 text-sm hover:bg-cyan-100">Autism/ASD Testing</a>
                        <a href="#intelligence-testing" class="block px-4 py-2 text-sm hover:bg-cyan-100">Intelligence Testing</a>
                        <a href="#personality-testing" class="block px-4 py-2 text-sm hover:bg-cyan-100">Personality Testing</a> -->
                    </div>
                </div>

                <a href="#blog" class="text-gray-700 hover:text-cyan-500">Blog</a>
                <a href="#contact" class="text-gray-700 hover:text-cyan-500">Contact</a>
            </nav>

            <!-- Call and Book Online Buttons -->
            <div class="flex items-center space-x-4">
                <a href="#book-online" class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-700">Sign Up</a>
            </div>
        </div>
    </header>

    <!-- Add your sections here -->

</body>
</html>
