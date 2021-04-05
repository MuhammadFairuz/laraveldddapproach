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

    public function save($data, $update = false)
    {
        if ($update) {
            $this->model->name = $data['name'] ?? $this->model->name;
            $this->model->password = $data['password'] ?? $this->model->password;
            $this->model->email = $data['email'] ?? $this->model->email;
        } else {
            $this->model->name = $data['name'] ?? null;
            $this->model->password = $data['password'] ?? null;
            $this->model->email = $data['email'] ?? null;
        }

        $this->model->save();
    }

    public function saveAndGetId($data)
    {
        $this->save($data);
        return $this->model->id;
    }

    public function updateAndGetId($id, $data)
    {
        $this->model = $this->model->find($id);
        $this->save($data);
        return $this->model->id;
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }
}
