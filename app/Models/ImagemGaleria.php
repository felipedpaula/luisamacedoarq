<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagemGaleria extends Model
{
    protected $table = 'gallery_images';

    public function getImagensByGaleriaId($id) {
        $imagens = ImagemGaleria::where('gallery_id', $id)->get();
        return $imagens;
    }

    public function getImagensHome() {

        $imagens = ImagemGaleria::join('galleries', 'gallery_images.gallery_id', '=', 'galleries.id')
                    ->select('gallery_images.img_title', 'gallery_images.src', 'galleries.title as galeria_titulo', 'galleries.slug as galeria_slug')
                    ->where('galleries.status', '1')
                    ->inRandomOrder()
                    ->limit(12)
                    ->get();

        return $imagens;
    }
}
