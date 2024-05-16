@extends('layouts.index')

@section('orders')
    active
@endsection
@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <h2>Pesanan Saya</h2>
    </div>
</section>
<div class="container">
    <div class="row">
        @foreach ($orders as $data)
        <div class="col-md-12 mb-5">
            <div class="card">
                <h5 class="card-header">Kode Pesanan : {{$data->kode_pesanan}}</h5>
                <div class="card-body">
                    <p class="card-text">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{$data->user->name}}</td>
                            </tr>
                            <tr>
                               <td>Alamat Pengiriman</td>
                               <td>:</td>
                               <td>{{$data->address}}</td>
                            </tr>
                            <tr>
                               <td>Total Harga</td>
                               <td>:</td>
                               <td>Rp. {{ number_format($data->total_price, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                               <td>Tanggal Pesanan</td>
                               <td>:</td>
                               <td>{{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('l, d F Y H:i') }}</td>

                            </tr>
                            <tr>
                               <td>Status Pesanan</td>
                               <td>:</td>
                               <td>{{$data->status_order}}</td>
                            </tr>
                        </table>
                    </p>
                    <a href="{{route('detailOrder', ['kodePesanan' => $data->kode_pesanan])}}" class="btn btn-outline-dark">Detail Pesanan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
