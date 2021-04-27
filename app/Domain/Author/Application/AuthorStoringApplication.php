<?php

namespace App\Domain\Author\Application;

use App\Domain\Author\Repositories\AuthorStoringRepository;

class AuthorStoringApplication
{
    private $repo;

    public function __construct(AuthorStoringRepository $authorStoringRepository)
    {
        $this->repo = $authorStoringRepository;
    }

    public function authorStore($request)
    {
        $data = $request->toArray();
        return $this->repo->saveAndGetId($data);
    }

    public function authorUpdate($id, $request)
    {
        $data = $request->toArray();
        return $this->repo->updateAndGetId($id, $data);
    }

    public function authorDelete($id)
    {
        return $this->repo->delete($id);
    }
}
