<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $imageFilePath = null;
        $videoFilePath = null;
        $validatedData = $request->validate([
            'caption' => 'required|string|max:255',
            'description' => 'required|max:255',
            'image' => 'mimes:png,jpg',
            'video' => 'mimes:mp4'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');
            $imageFilePath = $file->store('uploads', 'public');
        }
        if ($request->file('video')) {
            $file = $request->file('video');
            $videoFilePath = $file->store('uploads', 'public');
        }

        $data = [
            'caption' => $validatedData['caption'],
            'description' => $validatedData['description'],
            'user_id' => Auth::user()->id,
            'image' => $imageFilePath,
            'video' => $videoFilePath
        ];
        $post = Post::create($data);
        return redirect()->route('admin.posts');
    }
    public function show(): View
    {
        $posts = Post::all()->map(function ($post) {
            $post->image_url = $post->image ? Storage::url($post->image) : null;
            $post->video_url = $post->video ? Storage::url($post->video) : null;
            return $post;
        });
        return view('admin.posts', compact('posts'));
    }
    public function update(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:posts,id',
            'caption' => 'required|string|max:255',
            'description' => 'required|max:255',
            'image' => 'nullable|mimes:png,jpg',
            'video' => 'nullable|mimes:mp4',
        ]);

        $post = Post::findOrFail($validatedData['id']);

        // Update fields
        $post->caption = $validatedData['caption'];
        $post->description = $validatedData['description'];

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image); // Delete the old image
            }
            $post->image = $request->file('image')->store('uploads', 'public');
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            if ($post->video) {
                Storage::disk('public')->delete($post->video); // Delete the old video
            }
            $post->video = $request->file('video')->store('uploads', 'public');
        }

        $post->save();

        return redirect()->route('admin.posts')->with('success', 'Post updated successfully!');
    }
    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully!');
    }
}