<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Book\Models\Book;

class BookGetRepository
{
    private $model;

    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function bookList()
    {
        return $this->model->get();
    }    

    public function bookFindById($id)
    {
        return $this->model->find($id);
    }

    public function bookFindWithOption($keyword)
    {
        $this->model = $this->model->where('title', 'LIKE', "%$keyword%")
                                    ->orWhere('synopsis', 'LIKE', "%$keyword%")
                                    ->orWhere('category', 'LIKE', "%$keyword%")
                                    ->orWhere('year', 'LIKE', "%$keyword%");
        return $this->model->get();
    }
}