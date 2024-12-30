<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'id_book';

    protected $fillable = [
        'title', 'author', 'isbn', 'image',
        'genre', 'language', 'published_date', 
        'total_copies', 'available_copies'
    ];

    // app/Models/Book.php

    public function isAvailable()
    {
        return $this->available_copies > 0;
    }

}
