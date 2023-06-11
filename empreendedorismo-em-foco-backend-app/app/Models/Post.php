<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'number',
        'img',
        'title',
        'text',
        'category',
        'idUrl',
        'link1',
        'link2',
        'link3',
    ];
}
