<?php

namespace App\Domain\Book\Repositories;

use App\Domain\Author\Models\Author;
use App\Domain\Book\Models\Book;

class BookStoreRepository
{
    private $model;

    public function __construct(Book $book, Author $author)
    {
        $this->modelBook = $book;
        $this->modelAuthor = $author;
    }

    public function getModel()
    {
        return $this->modelBook;
        return $this->modelAuthor;
    }

    public function save($data, $update = false)
    {
        if ($update) {
            $this->modelBook->title = $data['title'] ?? $this->modelBook->title;
            $this->modelBook->synopsis = $data['synopsis'] ?? $this->modelBook->synopsis;
            $this->modelBook->category = $data['categoty'] ?? $this->modelBook->category;
            $this->modelBook->year = $data['year'] ?? $this->modelBook->year;

        } else {
            $this->modelBook->title = $data['title'] ?? null;
            $this->modelBook->synopsis = $data['synopsis'] ?? null;
            $this->modelBook->category = $data['category'] ?? null;
            $this->modelBook->year = $data['year'] ?? null;
            
        }

        $this->modelBook->save();

        $author = $this->modelAuthor->whereIn('id', $data['author_ids'])->get();
        $this->modelBook->authors()->attach($author);

    }

    public function saveAndGetId($data)
    {
        $this->save($data);
        return $this->modelBook->id;
    }

    public function updateAndGetId($id, $data)
    {
        $this->modelBook = $this->modelBook->find($id);
        $this->save($data);
        return $this->modelBook->id;
    }

    public function delete($id)
    {
        // $author = $this->modelAuthor->find($id);
        // $this->modelBook->authors()->detach($author);

        // $this->modelBook->where('id', $id)->delete();
        $this->modelBook->authors()->detach();
        $this->modelAuthor->find($id)->delete();
        $this->modelBook->delete();
    }
}
