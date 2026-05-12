<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{
    public function create()
{
    return view('create_book');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required',
        'genre' => 'required',
        'synopsis' => 'required',
    ]);

    Book::create($validated);

    
    return redirect()->route('index')->with('success', 'The manuscript has been successfully inscribed in the archives.');
}
}
