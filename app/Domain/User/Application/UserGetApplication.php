<?php

namespace App\Domain\User\Application;

use App\Domain\User\Repositories\UserGetRepository;

class UserGetApplication
{
    private $repo;

    public function __construct(UserGetRepository $userGetRepository)
    {
        $this->repo = $userGetRepository;
    }

    public function userGetDetail($id)
    {
        return $this->repo->userFindById($id);
    }
    public function userGetList($search, $pagination = false, $page = 1, $limit = 15)
    {
        return $this->repo->userFindWithOption($search, $pagination, $page, $limit);
    }
}
