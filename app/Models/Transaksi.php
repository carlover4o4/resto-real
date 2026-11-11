<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detailtransaksi(){
        return $this->hasMany(DetailTransaksi::class);
    }
}
