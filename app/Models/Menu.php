<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];
    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function detailtransaksi(){
        return $this->belongsTo(DetailTransaksi::class);
    }
}
