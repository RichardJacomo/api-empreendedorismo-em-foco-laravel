<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'img' => $this->img,
            'title' => $this->title,
            'text' => $this->text,
            'category' => $this->category,
            'link1' => $this->link1,
            'link2' => $this->link2,
            'link3' => $this->link3,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
