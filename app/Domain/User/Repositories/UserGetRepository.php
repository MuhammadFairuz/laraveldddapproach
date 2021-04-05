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

    public function userFindWithOption($search, $pagination, $page, $limit)
    {
        $offset = $page * $limit;

        $this->model = $this->model->where('name', 'like', "%$search%")->offset($offset)->limit($limit);
        if ($pagination){
            return $this->model->pagination();
        } else {
            return $this->model->get();
        }
    }
}
