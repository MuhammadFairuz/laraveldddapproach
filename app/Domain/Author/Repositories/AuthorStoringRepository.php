<?php

namespace App\Domain\Author\Repositories;

use App\Domain\Author\Models\Author;
use App\Domain\Author\Models\Repositories;

class AuthorStoringRepository
{
    private $model;

    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function save($data, $update = false)
    {
        if ($update) {
            $this->model->name = $data['name'] ?? $this->model->name;
        } else {
            $this->model->name = $data['name'] ?? null;
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
