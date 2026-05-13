<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Book $book)
    {
        $user = auth()->user();
        
        // The toggle() method automatically attaches or detaches the relationship in the pivot table
        $status = $user->favorites()->toggle($book->id);
        
        $isFavorited = count($status['attached']) > 0;

        return response()->json([
            'status' => 'success',
            'isFavorited' => $isFavorited
        ]);
    }
}
