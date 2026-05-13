<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $chronicles = News::latest()->get();
        return view('news.index', compact('chronicles'));
    }

    public function create()
    {
        
        return view('admin.create');
    }

    public function store(Request $request)
{
    
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    
    $newsData = $request->only(['title', 'content']);

    
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('news_images', 'public');
        $newsData['image'] = $path;
    }

    
    News::create($newsData);

    // 5. Retour au QG
    return redirect()->route('admin.dashboard')->with('success', 'Le décret impérial est archivé !');
}
}