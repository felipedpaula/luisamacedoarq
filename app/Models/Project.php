<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'resume',
        'body',
        'img_default',
        'url_link',
        'status',
    ];
}
