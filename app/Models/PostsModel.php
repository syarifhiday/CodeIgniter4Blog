<?php

namespace App\Models;

use CodeIgniter\Model;

class PostsModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'thumbnail',
        'content',
        'meta_desc',
        'permalink'
    ];

}