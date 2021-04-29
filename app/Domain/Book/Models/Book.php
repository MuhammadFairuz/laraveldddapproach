<?php

namespace App\Domain\Book\Models;

use App\Domain\Author\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Declare the tables it uses
    protected $table = 'books';
    protected $primaryKey = 'id';

    
    // Declare the relationship to authors
    // configure books to have many authors 
    public function authors(){
        return $this->belongsToMany(Author::class, 'book_author')->withTimestamps();
    }
}
