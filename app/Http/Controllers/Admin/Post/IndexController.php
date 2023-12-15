<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('admin.post.index', ['posts' => $posts]);
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'image_name' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('image_name')) {
            $imageFile = $request->file('image_name');
            $imageFileName = $imageFile->getClientOriginalName();

            $imagePath = $imageFile->storeAs('images', $imageFileName, 'public');
        }

        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFileName = $pdfFile->getClientOriginalName();

            $pdfPath = $pdfFile->storeAs('pdfs', $pdfFileName, 'public');
        }

        $posts = new Posts;

        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->image_name = $imagePath;
        $posts->pdf_file = $pdfPath;

        $posts->save();

        return redirect()->route('admin.post.index')->with('success', 'Post created successfully!');
    }

    public function updateThePost(Request $request, Posts $posts)
    {
        $request->validate([
            'title' => 'required|string|max:15',
            'description' => 'required|string|max:50',
        ]);

        $postId = $request->input('id');

        $posts = Posts::findOrFail($postId);

        $posts->update($request->only(['title', 'description']));

        return redirect()->route('admin.post.index')->with('success', 'Post created successfully!');
    }


    public function form()
    {
        return view('admin.post.create');
    }

    public function goToID($id)
    {
        $posts = Posts::find($id);
        return view('admin.post.edit', ['news' => $posts]);
    }
}
