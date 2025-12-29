<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    //
    protected $guarded = [];
    public function komentars(){
        return $this->hasMany(ulasan::class, 'berita_id');
    }
}
