<?php

namespace App\Http\Resources\V1\Book;

use App\Http\Resources\V1\Author\AuthorItem;
use Illuminate\Http\Resources\Json\JsonResource;

class BookItem extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'synopsis' => $this->synopsis,
            'category' => $this->category,
            'year' => $this->year,
            'authors' => AuthorItem::collection($this->authors)
        ];
    }
}
