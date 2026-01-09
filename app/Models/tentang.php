<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tentang extends Model
{
    //
    protected $guarded = [];
    public function gambartentangs()
    {
        return $this->hasMany(gambar_tentang::class, 'tentang_id');
    }
}
