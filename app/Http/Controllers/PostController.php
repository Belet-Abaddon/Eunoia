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
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Response;

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
    public function showInAdminProfile()
    {
        // Get the currently authenticated admin user
        $users = Auth::user();

        // Retrieve the posts related to the authenticated admin user, ordered by 'created_at' in descending order
        $posts = $users->posts()->orderBy('created_at', 'desc')->get();

        // Pass the user and posts to the view
        return view('admin.admin-profile', compact('users', 'posts'));
    }

    public function create(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'caption' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
        ]);

        // Handle image and video upload if present
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('posts/images', 'public') : null;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('posts/videos', 'public') : null;

        // Create a new post
        Post::create([
            'caption' => $request->caption,
            'description' => $request->description,
            'image' => $imagePath,
            'video' => $videoPath,
            'user_id' => auth()->id(), // Assuming posts are linked to the authenticated user
        ]);

        // Redirect after creation
        return redirect()->route('admin.profile')->with('success', 'Post created successfully!');
    }
    public function updatePost(Request $request, $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Validate the incoming data
        $validated = $request->validate([
            'caption' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10240',
        ]);

        // Handle image and video upload if present
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('posts/images', 'public') : $post->image;
        $videoPath = $request->hasFile('video') ? $request->file('video')->store('posts/videos', 'public') : $post->video;

        // Update post data
        $post->update([
            'caption' => $request->caption,
            'description' => $request->description,
            'image' => $imagePath,
            'video' => $videoPath,
        ]);

        // Redirect after update
        return redirect()->route('admin.profile')->with('success', 'Post updated successfully!');
    }

    public function deletePost($postId)
    {
        // Get the currently authenticated admin user
        $user = Auth::user();

        // Retrieve the post to be deleted
        $post = $user->posts()->findOrFail($postId);

        // Delete the post
        $post->delete();

        // Redirect back to the profile page or wherever you want
        return redirect()->route('admin.profile')->with('success', 'Post deleted successfully!');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);  // Retrieve the post by its ID
        return view('admin.admin-profile', compact('post'));  // Make sure you pass 'post' in the compact function
    }


}