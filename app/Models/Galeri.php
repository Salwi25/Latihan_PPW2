<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Galeri extends Model
{
    protected $table = 'galeri';

    public function albums(){
        return $this->belongsTo('App\Models\Buku', 'id_buku', 'id');
    }
}
