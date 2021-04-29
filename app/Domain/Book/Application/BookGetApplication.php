<?php

namespace App\Domain\Book\Application;

use App\Domain\Book\Repositories\BookGetRepository;

class BookGetApplication
{
    private $repo;

    public function __construct(BookGetRepository $bookGetRepository)
    {
        $this->repo = $bookGetRepository;
    }

    public function bookGetList()
    {
        return $this->repo->bookList();
    }

    public function bookGetListWithOption($keyword)
    {
        return $this->repo->bookFindWithOption($keyword);
    }

    public function bookGetDetail($id)
    {
        return $this->repo->bookFindById($id);
    }
    
}
