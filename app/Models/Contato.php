<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'client_contact';

    protected $fillable = [
        'name',
        'email',
        'tel',
        'message',
        'polarity'
    ];
}
