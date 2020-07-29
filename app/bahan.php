<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    protected $fillable = ['kode','nama','jenis','tempat_penyimpanan','jumlah','harga','satuan'];
    protected $table = 'bahan';

    public function bahanLog()
    {
        return $this->hasMany(logbookPengguna::class,'nama');
    }

}
