<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeContent extends Model
{
    use HasFactory;

    protected $table = 'content_types';


    public function contents(){
        return $this->hasMany(Content::class , 'type_id');
    }

}
