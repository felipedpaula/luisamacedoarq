<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'title',
        'subtitle',
        'slug',
        'resume',
        'body',
        'description',
        'author',
        'img_default',
        'status',
    ];


    public function type(){
           return $this->belongsTo(TypeContent::class , 'type_id');
    }

    public function getConteudosHome() {
        $conteudos = Content::orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();

        return $conteudos;
    }

}
