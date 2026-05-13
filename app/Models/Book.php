<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function fans()
{
    return $this->belongsToMany(User::class, 'book_user');
}
}
