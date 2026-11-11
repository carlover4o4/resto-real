<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $guarded = ['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    }
}
