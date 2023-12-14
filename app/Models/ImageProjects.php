<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProjects extends Model
{
    protected $table = 'images_project';

    public function getImagesByProjectId($id) {
        $imagens = ImageProjects::where('project_id', $id)->get();
        return $imagens;
    }
}
