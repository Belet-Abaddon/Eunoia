<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EUNOIA</title>
    <link rel="stylesheet" href="https://demo.themesberg.com/windster/app.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-141734189-6');
    </script>


    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-THQTXJ7');</script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add some styling for the chart container */
        .chart-container {
            width: 80%;
            margin: 0 auto;
            margin-bottom: 30px;
            /* Add some space between charts */
        }

        .charts-wrapper {
            display: flex;
            flex-direction: column;
            /* Stack the charts vertically */
            align-items: center;
        }

        .chat-size {
            width: 80%;
            /* Ensure canvas respects the width of its parent */
            height: 200px;
            margin: 20px;
            /* Set a fixed height or adjust as needed */
        }
    </style>

</head>

<body class="bg-gray-50">
    <nav class="bg-white border-b border-gray-200 fixed z-30 w-full">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar"
                        class="lg:hidden mr-2 text-gray-600 hover:text-gray-900 cursor-pointer p-2 hover:bg-gray-100 focus:bg-gray-100 focus:ring-2 focus:ring-gray-100 rounded">
                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <a href="https://demo.themesberg.com/windster/"
                        class="text-xl font-bold flex items-center lg:ml-2.5">
                        <span class="self-center whitespace-nowrap">EUNOIA</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="flex overflow-hidden bg-white pt-16">
        <aside id="sidebar"
            class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75"
            aria-label="Sidebar">
            <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex-1 px-3 bg-white divide-y space-y-1">
                        <ul class="space-y-2 pb-2">
                            <li>
                                <form action="#" method="GET" class="lg:hidden">
                                    <label for="mobile-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                                </path>
                                            </svg>
                                        </div>
                                        <input type="text" name="email" id="mobile-search"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5"
                                            placeholder="Search">
                                    </div>
                                </form>
                            </li>
                            <li>
                                <a href="/admin-dashboard"
                                    class="text-base text-gray-900 font-normal rounded-lg flex items-center p-2 hover:bg-gray-100 group">
                                    <svg class="w-6 h-6 text-gray-900 transition duration-75" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                    </svg>
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="psycho-ty"
                                    class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM160 240c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 48 48 0c8.8 0 16 7.2 16 16l0 32c0 8.8-7.2 16-16 16l-48 0 0 48c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-48-48 0c-8.8 0-16-7.2-16-16l0-32c0-8.8 7.2-16 16-16l48 0 0-48z" />
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Psychological Type</span>
                                </a>
                            </li>
                            <li>
                                <a href="question"
                                    class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM105.8 229.3c7.9-22.3 29.1-37.3 52.8-37.3l58.3 0c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L216 328.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24l0-13.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1l-58.3 0c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM160 416a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Question</span>
                                </a>
                            </li>
                            <li>
                                <a href="user-list"
                                    class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3zM609.3 512l-137.8 0c5.4-9.4 8.6-20.3 8.6-32l0-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2l61.4 0C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="therapist-list"
                                    class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path
                                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-96 55.2C54 332.9 0 401.3 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7c0-81-54-149.4-128-171.1l0 50.8c27.6 7.1 48 32.2 48 62l0 40c0 8.8-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16s7.2-16 16-16l0-24c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 24c8.8 0 16 7.2 16 16s-7.2 16-16 16l-16 0c-8.8 0-16-7.2-16-16l0-40c0-29.8 20.4-54.9 48-62l0-57.1c-6-.6-12.1-.9-18.3-.9l-91.4 0c-6.2 0-12.3 .3-18.3 .9l0 65.4c23.1 6.9 40 28.3 40 53.7c0 30.9-25.1 56-56 56s-56-25.1-56-56c0-25.4 16.9-46.8 40-53.7l0-59.1zM144 448a24 24 0 1 0 0-48 24 24 0 1 0 0 48z" />
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Therapists</span>
                                </a>
                            </li>
                            <li>
                                <a href="schedule"
                                    class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path
                                            d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l80 0 0 56-80 0 0-56zm0 104l80 0 0 64-80 0 0-64zm128 0l96 0 0 64-96 0 0-64zm144 0l80 0 0 64-80 0 0-64zm80-48l-80 0 0-56 80 0 0 56zm0 160l0 40c0 8.8-7.2 16-16 16l-64 0 0-56 80 0zm-128 0l0 56-96 0 0-56 96 0zm-144 0l0 56-64 0c-8.8 0-16-7.2-16-16l0-40 80 0zM272 248l-96 0 0-56 96 0 0 56z" />
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Schedule</span>
                                </a>
                            </li>
                            <li>
                                <a href="admin-profile"
                                    class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                                    <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464l349.5 0c-8.9-63.3-63.3-112-129-112l-91.4 0c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304l91.4 0C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7L29.7 512C13.3 512 0 498.7 0 482.3z" />
                                    </svg>
                                    <span class="ml-3 flex-1 whitespace-nowrap">Profile</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Logout Button with Form -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                                <svg class="w-5 h-5 text-gray-900 flex-shrink-0 transition duration-75"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <!-- Font Awesome Icon -->
                                    <path
                                        d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
                                </svg>
                                <span class="ml-3">Sign Out</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>

        <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
            <main>
                <div class="bg-white p-6 shadow-md w-full max-w-4xl">
                    <h1 class="text-2xl font-bold text-gray-800 mb-6">Profile</h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Personal Information Section -->
                        <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                            <!-- User Profile -->
                            <div class="flex items-center mb-4">
                                <div class="ml-4">
                                    <h2 class="text-xl font-semibold text-gray-800">{{ $users->name }}</h2>
                                    <p class="text-sm text-gray-500">{{ $users->email }}</p>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-3">
                                <p class="mb-2"><span class="font-semibold text-gray-800">Country:</span>
                                    {{ $users->country }}</p>
                                <p class="mb-2"><span class="font-semibold text-gray-800">Specialization:</span>
                                    {{ $users->specialization }}</p>
                                <p class="mb-2"><span class="font-semibold text-gray-800">Experience:</span>
                                    {{ $users->experience }} years</p>
                                <p class="mb-2"><span class="font-semibold text-gray-800">Degree:</span>
                                    {{ $users->degree }}</p>
                                <p class="mb-2"><span class="font-semibold text-gray-800">University:</span>
                                    {{ $users->university }}</p>
                            </div>

                            <div class="mt-6 text-center">
                                <button
                                    class="bg-teal-600 text-white py-2 px-6 rounded hover:bg-teal-700 shadow-md">Edit
                                    Profile</button>
                            </div>
                        </div>

                        <!-- Add or Edit Post Form -->
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h2 class="text-lg font-semibold text-gray-700 mb-3">
                                {{ isset($post) ? 'Edit Post' : 'Add New Post' }}
                            </h2>
                            <!-- Post Form -->
                            <form id="post-form"
                                action="{{ isset($post) ? route('post.update', $post->id) : route('post.create') }}"
                                method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                @if (isset($post))
                                    @method('PUT')
                                @endif

                                <!-- Caption -->
                                <div>
                                    <label for="caption" class="block text-gray-700 font-medium">Caption</label>
                                    <input type="text" id="caption" name="caption"
                                        value="{{ old('caption', isset($post) ? $post->caption : '') }}"
                                        class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-teal-400 focus:outline-none"
                                        placeholder="Enter caption">
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-gray-700 font-medium">Description</label>
                                    <textarea id="description" name="description" rows="3"
                                        class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-teal-400 focus:outline-none"
                                        placeholder="Enter description">{{ old('description', isset($post) ? $post->description : '') }}</textarea>
                                </div>

                                <!-- Image Upload -->
                                <div>
                                    <label for="image" class="block text-gray-700 font-medium">Upload Image</label>
                                    <input type="file" id="image" name="image"
                                        class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-teal-400 focus:outline-none">
                                    <div id="existing-image-container" class="hidden">
                                        <img id="existing-image" src="" alt="Post Image" class="mt-2 w-32">
                                    </div>
                                </div>

                                <!-- Video Upload -->
                                <div>
                                    <label for="video" class="block text-gray-700 font-medium">Upload Video</label>
                                    <input type="file" id="video" name="video"
                                        class="w-full mt-1 p-2 border border-gray-300 rounded focus:ring focus:ring-teal-400 focus:outline-none">
                                    <div id="existing-video-container" class="hidden">
                                        <video id="existing-video" controls class="mt-2 w-32">
                                            <source src="" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div>
                                    <button type="submit"
                                        class="bg-teal-600 text-white py-2 px-4 rounded hover:bg-teal-700 w-full">
                                        {{ isset($post) ? 'Save' : 'Create' }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <!-- Posts Section -->
                <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Posts</h2>
                    <div class="space-y-6">
                        @foreach($posts as $post)
                            <div class="p-6 bg-white rounded-lg shadow hover:shadow-lg transition-shadow">
                                <div class="flex items-center mb-4">
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ $users->name }}</h3>
                                        <p class="text-sm text-gray-500">Posted on {{ $post->created_at->format('F d, Y') }}
                                        </p>
                                    </div>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-700 mb-3">{{ $post->caption }}</h4>
                                <p class="text-gray-600 text-sm mb-4">{{ $post->description }}</p>
                                <div class="flex gap-4 mb-4">
                                    @if ($post->image && $post->video)
                                        <div class="flex space-x-4">
                                            <div class="w-1/2">
                                                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                                    class="w-full h-64 object-cover rounded-lg mb-4">
                                            </div>
                                            <div class="w-1/2">
                                                <video controls class="w-full h-64 object-cover rounded-lg mb-4">
                                                    <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        </div>
                                    @elseif ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image"
                                            class="w-full h-64 object-cover rounded-lg mb-4">
                                    @elseif ($post->video)
                                        <video controls class="w-full h-64 rounded-lg mb-4">
                                            <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                                <div class="flex gap-4 justify-end">
                                        <a href="{{ route('userPosts.postDetail', $post->id) }}"
                                            class="text-cyan-600 hover:text-cyan-800 flex items-center space-x-2">
                                            <span class="">Comment</span>
                                        </a>
                                    <button type="button"
                                        class="bg-teal-600 text-white py-2 px-4 rounded hover:bg-teal-700 shadow-md"
                                        onclick="editPost({{ $post->id }}, '{{ $post->caption }}', '{{ $post->description }}', '{{ asset('storage/' . $post->image) }}', '{{ asset('storage/' . $post->video) }}')">
                                        Update
                                    </button>
                                    <!-- Delete Button -->
                                    <form action="{{ route('post.delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 shadow-md">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </main>
            <p class="text-center text-sm text-gray-500 my-10">
                &copy; 2019-2021 <a href="https://themesberg.com" class="hover:underline"
                    target="_blank">Themesberg</a>.
                All rights reserved.
            </p>

        </div>

    </div>



    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8e055ad18ca48249","version":"2024.10.5","r":1,"token":"3a2c60bab7654724a0f7e5946db4ea5a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}'
        crossorigin="anonymous"></script>
    <script>
        // Function to populate the form when the "Update" button is clicked
        function editPost(postId, caption, description, imageUrl, videoUrl) {
            const form = document.getElementById('post-form');

            // Set the form's action URL for update
            form.action = `/post/update/${postId}`;  // Adjust the route for updating

            // Set the method to POST and add _method field for PUT
            form.method = 'POST';
            form.innerHTML += '<input type="hidden" name="_method" value="PUT">'; // Add the _method field for PUT

            // Populate the form fields with the existing post data
            document.getElementById('caption').value = caption;
            document.getElementById('description').value = description;

            // Show existing image if available
            const existingImageContainer = document.getElementById('existing-image-container');
            const existingImage = document.getElementById('existing-image');
            if (imageUrl) {
                existingImage.src = imageUrl;
                existingImageContainer.classList.remove('hidden');  // Show the image container
            }

            // Show existing video if available
            const existingVideoContainer = document.getElementById('existing-video-container');
            const existingVideo = document.getElementById('existing-video');
            if (videoUrl) {
                existingVideo.querySelector('source').src = videoUrl;
                existingVideoContainer.classList.remove('hidden');  // Show the video container
            }

            // Change button text to "Save"
            const submitButton = form.querySelector('button');
            submitButton.textContent = 'Save';
        }
    </script>
</body>

</html>