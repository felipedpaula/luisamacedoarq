<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'title',
        'subtitle',
        'slug',
        'resume',
        'body',
        'description',
        'img_default',
        'status',
        'date_start',
        'date_end',
    ];

    public function getProxEventosHome() {
        $eventos = Event::where('date_start', '>=', now())
                ->where('status', 1)
                ->orderBy('date_start', 'asc')
                ->take(6)
                ->get();

        return $eventos;
    }

    public function getUltimosEventosHome() {
        $eventos = Event::where('date_end', '<', now())
                ->where('status', 1)
                ->orderBy('date_end', 'desc')
                ->take(6)
                ->get();

        return $eventos;
    }

}
