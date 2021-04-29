<?php

namespace App\Domain\Book\Application;

use App\Domain\Book\Repositories\BookStoreRepository;

class BookStoringApplication
{
    private $repo;

    public function __construct(BookStoreRepository $bookStoreRepository)
    {
        $this->repo = $bookStoreRepository;
    }

    public function bookStore($request)
    {
        $data = $request->toArray();
        return $this->repo->saveAndGetId($data);
    }

    public function bookUpdate($request)
    {
        $data = $request->toArray();
        return $this->repo->saveAndGetId($data);
    }

    public function bookDelete($id)
    {
        return $this->repo->delete($id);
    }
}
