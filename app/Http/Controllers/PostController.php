<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function gotodetail()
    {
        return view('users.detail');
    }
    public function postList()
    {
        // Retrieve posts with user info and paginate
        $posts = Post::with('user')->latest()->paginate(6); // You can change the number 6 as per your needs
        return view('users.posts', compact('posts'));
    }
    // app/Http/Controllers/PostController.php

    public function showPostDetailFromHome($id)
    {
        // Retrieve the post by ID
        $post = Post::with('user')->findOrFail($id);

        // Return the detail view with the post data
        return view('users.detail', compact('post'));
    }
    public function showPostDetailFromPosts($id)
    {
        // Retrieve the post by ID
        $post = Post::with('user', 'comments.user')->findOrFail($id);

        // Pass the post to the detail view
        return view('users.detail', compact('post'));
    }
    public function store($postId, Request $request)
    {
        // Validate the input
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        // Create the comment
        Comment::create([
            'comment' => $request->input('comment'),
            'commentTime' => now(),
            'post_id' => $postId, // Associate with the post
            'user_id' => Auth::id(), // The logged-in user's ID
        ]);

        // Redirect back to the post detail page with a success message
        return redirect()->route('userPosts.postDetail', $postId)->with('success', 'Comment posted successfully.');
    }
    // Update existing comment
    public function update(Request $request, $commentId)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id === auth()->id()) {
            $comment->comment = $request->comment;
            $comment->save();
        }

        // Redirect back to the post detail page after updating the comment
        return redirect()->route('userPosts.postDetail', $comment->post_id)->with('success', 'Comment updated successfully.');
    }

    // Delete a comment
    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->user_id === auth()->id()) {
            $comment->delete();
        }

        // Redirect back to the post detail page after deleting the comment
        return redirect()->route('userPosts.postDetail', $comment->post_id)->with('success', 'Comment deleted successfully.');
    }
}