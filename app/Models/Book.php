<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowed_books', 'book_id', 'user_id');
    }

    public function coverUrl()
    {
        return $this->picture
            ? Storage::disk('covers')->url($this->picture)
            : '/img/books/cover-placeholder.jpg';
    }
}
