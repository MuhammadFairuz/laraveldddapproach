<?php

namespace App\Domain\Author\Models;

use App\Domain\Book\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    // Declare the table it uses
    protected $table = 'authors';
    protected $primaryKey = 'id';

    // Declare the relationship to books
    // configure authors to have many books 
    public function books(){
        return $this->belongsToMany(Book::class, 'book_author')->withTimestamps();
    }

}
