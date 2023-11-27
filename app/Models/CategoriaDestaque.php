<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDestaque extends Model
{
    use HasFactory;

    protected $table = 'categorias_destaques';


    public function destaques(){
        return $this->hasMany(Destaque::class , 'categoria_id');
    }

}
