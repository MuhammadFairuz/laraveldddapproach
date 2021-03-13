<?php

namespace App\Domain\User\Application;

use App\Domain\User\Repositories\UserStoreRepository;
use App\Exceptions\EmailHasBeenCompormised;

class UserStoringApplication
{
    private $repo;

    public function __construct(UserStoreRepository $userStoreRepository)
    {
        $this->repo = $userStoreRepository;
    }

    public function userStore($request)
    {
        $data = $request->toArray();
        return $this->repo->saveAndGetId($data);
    }
}
