<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;

class UserGetRepository
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function userFindById($id)
    {
        return $this->model->find($id);
    }
}
