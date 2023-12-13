<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.post.index', ['news' => $news]);
    }

    public function createPost(Request $request)
    {
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

        $news = new News;

        $news->title = $request->title;
        $news->description = $request->description;
        $news->image_name = $imagePath;
        $news->pdf_file = $pdfPath;

        $news->save();

        return redirect()->route('admin.post.index')->with('success', 'Post created successfully!');
    }

    public function updateThePost(Request $request, News $news)
    {
        $newsId = $request->input('id');

        $news = News::findOrFail($newsId);

        $news->update($request->only(['title', 'description']));

        return redirect()->route('admin.post.index')->with('success', 'Post created successfully!');
    }


    public function form()
    {
        return view('admin.post.create');
    }

    public function goToID($id)
    {
        $news = News::find($id);
        return view('admin.post.edit', ['news' => $news]);
    }
}
