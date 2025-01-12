<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-10">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-cyan-700">EUNOIA</h1>
            <div class="flex items-center space-x-6">
                <a href="/"
                    class="text-cyan-700 text-lg font-medium hidden md:inline-block hover:text-cyan-500 hover:border-b-2 hover:border-cyan-500 transition-all duration-300">
                    <i class="fas fa-home text-2xl"></i>
                </a>
                <span class="text-cyan-700 font-medium text-lg">Hello, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-cyan-500 text-white px-6 py-3 rounded hover:bg-cyan-700 text-lg">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <!-- All Posts Section -->
    <section id="all-posts" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-semibold text-cyan-700 text-center mb-12">All Posts</h2>

            <!-- Posts -->
            <div class="space-y-8">
                @foreach($posts as $post)
                    <div
                        class="bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 max-w-3xl mx-auto">
                        <div class="flex items-center space-x-4 p-6 border-b border-gray-200">
                            <div>
                                <span class="font-bold text-2xl text-cyan-700">{{ $post->user->name }}</span>
                                <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-cyan-700 mb-4">{{ $post->caption }}</h3>
                            <p class="text-gray-700 text-base mb-4">{{ $post->description }}</p>

                            <!-- Conditional Rendering for Image and Video (Side by Side) -->
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

                        <!-- Interaction Buttons -->
                        <div class="flex justify-between items-center p-6 border-t border-gray-200">
                            <a href="{{ route('userPosts.postDetail', $post->id) }}"
                                class="text-cyan-600 hover:text-cyan-800 flex items-center space-x-2">
                                <span class="font-semibold">Comment</span>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }} <!-- Laravel pagination links -->
            </div>
        </div>
    </section>

    <!-- FontAwesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>