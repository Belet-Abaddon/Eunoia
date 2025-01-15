<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <header class="bg-white shadow sticky top-0 z-10 w-full">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-cyan-700">EUNOIA</h1>
            </div>
            <div class="flex items-center space-x-6">
                <!-- Check if the user role is 0 -->
                @if(auth()->user()->role == 0)
                    <a href="/"
                        class="text-cyan-700 text-lg font-medium hidden md:inline-block hover:text-cyan-500 hover:border-b-2 hover:border-cyan-500 transition-all duration-300">
                        <i class="fas fa-home text-2xl"></i>
                    </a>
                @endif
                <span class="text-cyan-700 font-medium text-lg">Hello, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-cyan-500 text-white px-6 py-3 rounded hover:bg-cyan-700 text-lg">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <section class="py-20 bg-gradient-to-r from-cyan-100 to-cyan-50 w-full">
        <div class="flex w-full gap-12 px-2">

            <!-- Post Content Section (55% width for post, 45% for comments) -->
            <div class="w-full lg:w-3/5 bg-white border border-cyan-700 rounded-lg shadow-2xl p-6 mb-3">
                <div class="flex items-center space-x-4 pb-2 border-b border-gray-200">
                    <div>
                        <span class="font-bold text-2xl text-cyan-700">{{ $post->user->name }}</span>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <div class="text-left mt-3">
                    <h3 class="text-4xl font-bold text-cyan-700 mb-6">{{ $post->caption }}</h3>
                    <p class="text-gray-800 text-lg mb-8 leading-relaxed">{{ $post->description }}</p>
                </div>
                <div class="flex gap-6 mb-6">

                    @if ($post->image && $post->video)

                        <div class="w-1/2">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->caption }}"
                                class="rounded-lg object-cover w-full h-96 transition-transform transform hover:scale-105 ease-in-out duration-500">
                        </div>
                        <div class="w-1/2">
                            <iframe class="w-full h-96 rounded-lg shadow-lg" src="{{ asset('storage/' . $post->video) }}"
                                title="Post Video" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen>
                            </iframe>
                        </div>
                    @elseif ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->caption }}"
                            class="rounded-lg object-cover w-full h-96 transition-transform transform hover:scale-105 ease-in-out duration-500">
                    @elseif ($post->video)
                        <iframe class="w-full h-96 rounded-lg shadow-lg" src="{{ asset('storage/' . $post->video) }}"
                            title="Post Video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    @endif
                </div>

            </div>

            <!-- Comments Section -->
            <section id="comments"
                class="w-full lg:w-2/5 bg-white border border-cyan-700 rounded-lg shadow-2xl p-6 h-[600px]">
                <h3 class="text-xl font-semibold text-cyan-700 mb-4">Comments</h3>
                <div class="space-y-6 max-h-[300px] overflow-y-auto">
                    @foreach($post->comments as $comment)
                        <div class="bg-white p-4 rounded-lg shadow-lg">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-cyan-700">{{ $comment->user->name }}</span>
                                <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mt-2 text-gray-700">{{ $comment->comment }}</p>

                            @if(Auth::check() && Auth::user()->id === $comment->user_id)
                                <!-- Edit and Delete buttons (only for the comment's author) -->
                                <div class="flex justify-end space-x-4 mt-4">
                                    <button class="text-cyan-700 hover:text-cyan-500"
                                        onclick="editComment({{ $comment->id }}, '{{ $comment->comment }}')">
                                        Edit
                                    </button>
                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Comment Form (same form for create and edit) -->
                <form action="{{ route('comment.store', $post->id) }}" method="POST" class="mt-8" id="commentForm">
                    @csrf
                    <input type="hidden" name="comment_id" id="comment_id">
                    <textarea name="comment" id="comment_textarea" rows="2"
                        class="w-full p-6 border border-cyan-700 rounded-lg mb-6 bg-gray-50 text-gray-800 shadow-sm focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        placeholder="Add a comment..." required></textarea>
                    <button type="submit" id="submitBtn"
                        class="inline-block px-8 py-4 bg-cyan-700 text-white font-semibold rounded-lg shadow-md hover:bg-cyan-800 transition-all duration-200 ease-in-out">
                        Post Comment
                    </button>
                </form>
            </section>
        </div>
        <button onclick="window.history.back()"
            class="bg-cyan-700 text-white px-6 py-3 rounded-lg hover:bg-cyan-800 transition-all duration-300 mb-6 ms-6">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </button>
    </section>
    <footer class="bg-gray-800 text-gray-200 py-8">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2024 Eunoia Online. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        // Function to enable editing mode
        function editComment(commentId, commentText) {
            // Change the form to be in edit mode
            document.getElementById('comment_textarea').value = commentText;
            document.getElementById('comment_id').value = commentId;
            document.getElementById('submitBtn').textContent = 'Save Comment'; // Change button text
            // Change the form action to update the comment
            document.getElementById('commentForm').action = "{{ url('comment/update') }}/" + commentId;
        }
    </script>
</body>

</html>