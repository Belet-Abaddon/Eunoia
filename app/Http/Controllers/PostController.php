<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function store(Request $request) : RedirectResponse
    {
        $imageFilePath = null;
        $videoFilePath = null;
        $validatedData = $request->validate([
            'caption' => 'required|string|max:255',
            'description' => 'required|max:255',
            'image' => 'mimes:png,jpg',
            'video' => 'mimes:mp4'
        ]);

        if($request->file('image')) {
            $file = $request->file('image');
            $imageFilePath = $file->store('uploads');
        }
        if($request->file('video')) {
            $file = $request->file('video');
            $videoFilePath = $file->store('uploads');
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
    public function show():View{
        $posts=Post::get();
        return view('admin.posts',compact('posts'));
    }
}