<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class MainController extends Controller
{
    public function menu(){
        $menu = Menu::with('kategori')->get();
        return view('customer.menu',compact('menu'));
    }

    public function postkeranjang(Request $request,Menu $menu){
        $request->validate([
            'qty'=>'required|integer|min:1'
        ]);

        DetailTransaksi::create([
            'user_id'=>Auth::id(),
            'menu_id'=>$menu->id,
            'qty'=>$request->qty,
            'totalharga'=>$request->qty * $menu->harga,
            'status'=>'keranjang',
        ]);
        return redirect()->route('keranjang');
    }

    public function keranjang(){
        $detailtransaksi = DetailTransaksi::with('menu')->where('user_id',Auth::id())->where('status','keranjang')->get();
        $totalharga = $detailtransaksi->sum('totalharga');
        return view('customer.keranjang',compact('detailtransaksi','totalharga'));
    }

    public function postbayar(Request $request){
    $request->validate([
        'bukti_pembayaran' => 'required|image'
    ]);

    $detailtransaksi = DetailTransaksi::where('user_id', Auth::id())->where('status', 'keranjang')->get();

    if ($detailtransaksi->isEmpty()) 
    {
        return back()->with('error', 'Keranjang masih kosong!');
    }

    

    $transaksi = Transaksi::create([
        'user_id' => Auth::id(),
        'totalharga' => $detailtransaksi->sum('totalharga'),
        'invoice' => 'INV-'.Str::random(8),
        'bukti_pembayaran' => $request->file('bukti_pembayaran')->store('img', 'public'),
        'pembayaran' => 'belumbayar'
    ]);

    DetailTransaksi::where('user_id', Auth::id())
        ->where('status', 'keranjang')
        ->update([
            'transaksi_id' => $transaksi->id,
            'status' => 'cekout',
        ]);

    return redirect()->route('riwayat');
    }

    public function riwayat(){
    $transaksi = Transaksi::with('detailtransaksi.menu')
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

    return view('customer.riwayat', compact('transaksi'));
    }

    public function hapus(Menu $menu){
        $menu->delete();
        return redirect()->route('keranjang');
    }

}
