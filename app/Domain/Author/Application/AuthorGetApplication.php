<?php

namespace App\Domain\Author\Application;

use App\Domain\Author\Repositories\AuthorGetRepository;

class AuthorGetApplication
{
    private $repo;

    public function __construct(AuthorGetRepository $authorGetRepository)
    {
        $this->repo = $authorGetRepository;
    }

    public function authorGetList()
    {
        return $this->repo->authorList();
    }

    public function authorGetListWithOption($keyword)
    {
        return $this->repo->authorFindWithOption($keyword);
    }

    public function authorGetDetail($id)
    {
        return $this->repo->authorFindById($id);
    }
    
}
