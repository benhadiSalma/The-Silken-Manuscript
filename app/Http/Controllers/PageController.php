<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{

    public function landing()
    {
        return view('welcome');
    }


    public function index(Request $request)
    {

        $query = Book::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        $books = $query->get();

        return view('index', compact('books'));
    }

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
