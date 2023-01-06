<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image_path'
    ];

    // protected $table = 'posts';

    // protected $primaryKey = 'title';
    // protected $attributes = [
    //     'title' => 'No title defined'
    // ];


}
