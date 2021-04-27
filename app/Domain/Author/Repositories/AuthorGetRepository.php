<?php

namespace App\Domain\Author\Repositories;

Use App\Domain\Author\Models\Author;

class AuthorGetRepository
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

    public function authorList()
    {
        return $this->model->get();
    }    

    public function authorFindById($id)
    {
        return $this->model->find($id);
    }

    public function authorFindWithOption($keyword)
    {
        $this->model = $this->model->where('name', 'LIKE', "%$keyword%");
        return $this->model->get();
    }

}