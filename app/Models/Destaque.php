<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destaque extends Model
{
    use HasFactory;

    protected $table = 'destaques';

    protected $fillable = [
        'categoria_id' ,
        'title',
        'subtitle' ,
        'body',
        'url_link',
        'txt_link',
        'img_src',
        'date_start',
        'date_end',
        'order' ,
        'status'
    ];


    public function categoria(){
        return $this->belongsTo(CategoriaDestaque::class , 'categoria_id');
    }

    public function getDestaques($bloco_slug, $limit = null) {

        $destaques = Destaque::join('categorias_destaques as categ', 'destaques.categoria_id', '=', 'categ.id')
                    ->select(
                        'destaques.title',
                        'destaques.subtitle',
                        'destaques.body',
                        'destaques.url_link',
                        'destaques.txt_link',
                        'destaques.img_src',
                        'destaques.date_start',
                        'destaques.date_end',
                        'destaques.order',
                        'destaques.status',
                        'categ.title as categ_title',
                        'categ.slug as categ_slug')
                    ->where('destaques.status', '1')
                    ->where('categ.slug', $bloco_slug)
                    ->orderBy('destaques.order', 'asc')
                    ->limit($limit)
                    ->get();

        return $destaques;
    }

}
