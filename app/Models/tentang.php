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
    public static function getname(){
        return self::value('nama');
    }
    public static function getdeskripsi(){
        return self::value('deskripsi');
    }
    public static function getno(){
        return self::value('no_telp');
    }
    public static function getgmail(){
        return self::value('gmail');
    }
    public static function getalamat(){
        return self::value('alamat');
    }
}
