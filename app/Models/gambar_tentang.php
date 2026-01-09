<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gambar_tentang extends Model
{
    //
    protected $guarded = [];
    public function tentang()
    {
        return $this->belongsTo(tentang::class, 'tentang_id');
    }
}
