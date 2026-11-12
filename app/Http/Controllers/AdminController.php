<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Kategori;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $menu = Menu::with('kategori')->get();
        return view('admin.admin',compact('menu'));
    }

    public function tambah(){
        $kategori = Kategori::all();
        return view('admin.tambah',compact('kategori'));
    }

    public function posttambah(Request $request){
        $request->validate([
            'name'=>'required',
            'harga'=>'required|integer',
            'foto'=>'required|file|image',
            'kategori_id'=>'required'
        ]);

        Menu::create([
            'name'=>$request->name,
            'harga'=>$request->harga,
            'foto'=>$request->file('foto')->store('img','public'),
            'kategori_id'=>$request->kategori_id
        ]);

        return redirect()->route('admin');
    }

    public function edit(Menu $menu){
        $kategori = Kategori::all();
        return view('admin.edit',compact('menu','kategori'));
    }

    public function postedit(Menu $menu,Request $request){
        $validate = $request->validate([
            'name'=>'required',
            'harga'=>'required|integer',
            'foto'=>'required|file|image',
            'kategori_id'=>'required'
        ]);

        $validate['foto']=$request->file('foto')->store('img','public');

        $menu->update($validate);
        return redirect()->route('admin');
    }

    public function hapus(Menu $menu){
        $menu->delete();
        return redirect()->route('admin');
    }

    public function laporan(){
         $transaksi = Transaksi::with('detailtransaksi.user')->latest()->get();
        return view('admin.laporan',compact('transaksi'));
    }

    public function lunas(Transaksi $transaksi){
        $transaksi->update([
            'pembayaran'=>'lunas'
        ]);        
        return redirect()->route('laporan');
    }
}
