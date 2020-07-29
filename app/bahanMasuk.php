<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahanMasuk extends Model
{
    protected $fillable =['user_id', 'nama','jumlah','nama_pengguna'];
    
    protected $table ="bahan_masuk";

    public function BahanMasuk()
    {
        return $this->belongsTo(bahan::class,'nama');
    }

    public function pengguna()
    {
        return $this->belongsTo(user::class, 'id', 'name');
    }

    public function bahan()
    {
        return $this->belongsTo(bahan::class, 'nama');
    }

    public function actionBy()
    {
        return $this->hasOne(user::class, 'id', 'nama_pengguna');
    }

    public function User()
    {
    return $this->belongsTo(pengguna::class, 'id');
    }
}
