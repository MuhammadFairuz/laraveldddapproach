<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Author\Models\Author;
use App\Domain\Book\Models\Book;
use Illuminate\Database\Eloquent\Model;

class BookStoreRepository
{
    private $model;

    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function save($data, $update = false)
    {
        if ($update) {
            $this->model->title = $data['title'] ?? $this->model->title;
            $this->model->synopsis = $data['synopsis'] ?? $this->model->synopsis;
            $this->model->category = $data['categoty'] ?? $this->model->category;
            $this->model->year = $data['year'] ?? $this->model->year;

        } else {
            $this->model->title = $data['title'] ?? null;
            $this->model->synopsis = $data['synopsis'] ?? null;
            $this->model->category = $data['category'] ?? null;
            $this->model->year = $data['year'] ?? null;
            
        }

        $this->model->save();

        $author = $this->model->whereIn('id', $data['author_ids'])->get();
        $this->model->authors()->attach($author);

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
        return $this->model->where('id', $id)->forceDelete();
    }
}