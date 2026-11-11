@extends('template.layout')
@section('title', 'Keranjang')
@section('content')
<div class="page-wrap">
    <div class="page-heading"><div><div class="eyebrow">Your selection</div><h1 class="page-title">Keranjang Belanja</h1><p class="page-subtitle">Periksa pesananmu sebelum menyelesaikan pembayaran.</p></div></div>
    <div class="row g-4">
        <div class="col-lg-8">@include('template.cardkeranjang')</div>
        <div class="col-lg-4">@include('template.cardpembayaran')</div>
    </div>
</div>
@endsection