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

                <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                    <div class="mb-1 w-full">
                        <div class="mb-4">
                            <h1 class="text-xl sm:text-2xl font-semibold text-gray-900">All questions</h1>
                        </div>
                        <div class="sm:flex">
                            <div class="hidden sm:flex items-center sm:divide-x sm:divide-gray-100 mb-3 sm:mb-0">
                                <form class="lg:pr-3" action="{{ route('question.search') }}" method="GET" id="search-form">
                                    <label for="users-search" class="sr-only">Search</label>
                                    <div class="mt-1 relative lg:w-64 xl:w-96 flex items-center space-x-2">
                                        <input type="text" name="query" id="search-input"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                            placeholder="Search for questions or types">
                                        <button type="submit"
                                            class="px-4 py-2 bg-cyan-600 text-white font-semibold rounded-lg shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-600 focus:ring-opacity-75">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="flex items-center space-x-2 sm:space-x-3 ml-auto">
                                <button type="button" data-modal-toggle="add-user-modal"
                                    class="w-1/2 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center sm:w-auto">
                                    <svg class="-ml-1 mr-2 h-6 w-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Add question
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto">
                        <div class="align-middle inline-block min-w-full">
                            <div class="shadow overflow-hidden">
                                <table class="table-fixed min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Id
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Question
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Description
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Psychological Type
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Created At
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Updated At
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td class="p-4 text-sm text-gray-900">
                                                    {{ $question->id }}
                                                </td>
                                                <td class="p-4 text-sm text-gray-900">
                                                    {{ $question->question }}
                                                </td>
                                                <td class="p-4 text-sm text-gray-900">
                                                    {{ $question->description }}
                                                </td>
                                                <td class="p-4 text-sm text-gray-900">
                                                    {{ $question->phychotherapyType->name }}
                                                </td>
                                                <td class="p-4 text-sm text-gray-900">
                                                    {{ $question->created_at }}
                                                </td>
                                                <td class="p-4 text-sm text-gray-900">
                                                    {{ $question->updated_at }}
                                                </td>
                                                <td class="p-4 whitespace-nowrap space-x-2">
                                                    <button type="button" data-modal-toggle="user-modal"
                                                        onclick="openModal('{{ $question->id }}', '{{ $question->question }}', '{{ $question->description }}', '{{ $question->phychotherapy_type_id }}')"
                                                        data-modal-toggle="user-modal"
                                                        class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Edit question
                                                    </button>
                                                    <button type="button" data-modal-toggle="delete-user-modal"
                                                        onclick="openingModal('{{ $question->id }}')"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                                        <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Delete question
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-white sticky sm:flex items-center w-full sm:justify-between bottom-0 right-0 border-t border-gray-200 p-4">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <a href="{{ $questions->previousPageUrl() }}"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="{{ $questions->nextPageUrl() }}"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer p-1 hover:bg-gray-100 rounded inline-flex justify-center mr-2">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <span class="text-sm font-normal text-gray-500">Showing <span
                                class="text-gray-900 font-semibold">{{ $questions->firstItem() }}-{{ $questions->lastItem() }}</span>
                            of <span class="text-gray-900 font-semibold">{{ $questions->total() }}</span></span>
                    </div>
                    <div class="flex items-center space-x-3">
                        @if ($questions->onFirstPage())
                            <span
                                class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                                Previous
                            </span>
                        @else
                            <a href="{{ $questions->previousPageUrl() }}"
                                class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                                Previous
                            </a>
                        @endif
                        @if ($questions->hasMorePages())
                            <a href="{{ $questions->nextPageUrl() }}"
                                class="flex-1 text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center">
                                Next
                            </a>
                        @else
                            <span
                                class="flex-1 text-white bg-gray-300 font-medium inline-flex items-center justify-center rounded-lg text-sm px-3 py-2 text-center cursor-not-allowed">
                                Next
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Edit User Modal -->
                <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                    id="user-modal">
                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="bg-white rounded-lg shadow relative">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">
                                    Edit question data
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                    data-modal-toggle="user-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <form action="{{route('admin.questionUpdate')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-6 gap-6">
                                        <input type="hidden" name="id" id="model-id" value="">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="question"
                                                class="text-sm font-medium text-gray-900 block mb-2">Question</label>
                                            <input type="text" name="question" id="model-question"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="Bonnie" required>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="description"
                                                class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                            <input type="text" name="description" id="model-des"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="description" required>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="psychotherapy_type"
                                                class="text-sm font-medium text-gray-900 block mb-2">
                                                Psychotherapy Type
                                            </label>
                                            <select name="phychotherapy_type_id" id="model-psT"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                required>
                                                <option value="" disabled selected>Select a type</option>
                                                @foreach($psychoTys as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="items-center p-6 border-t border-gray-200 rounded-b">
                                <button
                                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Save all</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Add User Modal -->
                <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                    id="add-user-modal">
                    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="bg-white rounded-lg shadow relative">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-5 border-b rounded-t">
                                <h3 class="text-xl font-semibold">
                                    Add new question
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                    data-modal-toggle="add-user-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                <form action="{{ route('admin.questionCreate') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="question"
                                                class="text-sm font-medium text-gray-900 block mb-2">Question</label>
                                            <input type="text" name="question" id="question"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="Bonnie" required>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="description"
                                                class="text-sm font-medium text-gray-900 block mb-2">Description</label>
                                            <input type="text" name="description" id="description"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                placeholder="description" required>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="psychotherapy_type"
                                                class="text-sm font-medium text-gray-900 block mb-2">
                                                Psychotherapy Type
                                            </label>
                                            <select name="phychotherapy_type_id" id="phychotherapy_type"
                                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                                required>
                                                <option value="" disabled selected>Select a type</option>
                                                @foreach($psychoTys as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="items-center p-6 border-t border-gray-200 rounded-b">
                                <button
                                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    type="submit">Add question</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete User Modal -->
                @foreach ($questions as $question)
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full"
                        id="delete-user-modal-{{ $question->id }}">
                        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="bg-white rounded-lg shadow relative">
                                <!-- Modal header -->
                                <div class="flex justify-end p-2">
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                        data-modal-toggle="delete-user-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 pt-0 text-center">
                                    <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete
                                        this user?</h3>
                                    <a href="{{ route('admin.questionDelete', ['id' => $question->id]) }}"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </a>
                                    <a href="#"
                                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                        data-modal-toggle="delete-user-modal">
                                        No, cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </main>
            <p class="text-center text-sm text-gray-500 my-10">
                &copy; 2024 Eunoia Online. All Rights Reserved.
            </p>
        </div>

    </div>



    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
        integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
        data-cf-beacon='{"rayId":"8e058c9b5aeb4933","version":"2024.10.5","r":1,"token":"3a2c60bab7654724a0f7e5946db4ea5a","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}}}'
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Add User Modal
            const addUserButton = document.querySelector('[data-modal-toggle="add-user-modal"]');
            const addUserModal = document.getElementById('add-user-modal');
            const addUserCloseButton = addUserModal.querySelector('[data-modal-toggle="add-user-modal"]');

            addUserButton.addEventListener('click', () => {
                addUserModal.classList.remove('hidden');
            });

            addUserCloseButton.addEventListener('click', () => {
                addUserModal.classList.add('hidden');
            });


        });
    </script>
    <script>
        function openModal(id, question, description, phychotherapy_type_id) {
            document.getElementById('model-id').value = id;
            document.getElementById('model-question').value = question;
            document.getElementById('model-des').value = description;
            document.getElementById('model-psT').value = phychotherapy_type_id;


            document.getElementById('user-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('user-modal').classList.add('hidden');
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function openingModal(id) {
                console.log('Opening modal for ID:', id); // Check if the function is called
                document.getElementById('delete-user-modal-' + id).classList.remove('hidden');
            }
            function closeingModal(id) {
                document.getElementById('delete-user-modal-' + id).classList.add('hidden');
            }
            window.openingModal = openingModal;
            window.closeingModal = closeingModal;
        });
    </script>
</body>

</html>