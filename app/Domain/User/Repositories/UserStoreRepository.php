<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Models\User;

class UserStoreRepository
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

    public function save($data)
    {
        $this->model->name = $data['name'] ?? null;
        $this->model->password = $data['password'] ?? null;
        $this->model->email = $data['email'] ?? null;

        $this->model->save();
    }

    public function saveAndGetId($data)
    {
        $this->save($data);
        return $this->model->id;
    }
}
