@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h5 class="text-uppercase mb-4">Detail Pesanan</h5>
            <table class="table table-borderless">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $orders->user->name }}</td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman</td>
                    <td>:</td>
                    <td>{{ $orders->address }}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>:</td>
                    <td>Rp. {{ number_format($orders->total_price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pesanan</td>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($orders->created_at)->translatedFormat('l, d F Y H:i') }}</td>

                </tr>
                <tr>
                    <td>Status Pesanan</td>
                    <td>:</td>
                    <td>{{ $orders->status_order }}</td>
                </tr>
            </table>
            <a target=".blank" href="{{ route('admin.downloadPaymentProof', ['payment_proof' => $orders->payment_proof]) }}"
                class="btn btn-primary">Download Bukti Pembayaran</a>
            @if ($orders->status_order == 'Paid From User')
                <a href="{{ route('admin.confirmOrder', ['kode_pesanan' => $orders->kode_pesanan]) }}"
                    class="btn btn-success">Terima Pesanan</a>
            @endif
        </div>
    </div>
    <div class="row">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Gambar Produk</td>
                    <td>Nama Produk</td>
                    <td>Quantity</td>
                    <td>Harga Satuan</td>
                    <td>Harga Total</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($order as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td> <img src="{{ asset('storage/product_images/' . $data->product->product_image) }}"
                                style="width: 150px; height: 150px; object-fit: cover" class="rounded"></td>
                        <td>{{ $data->product->product_title }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>Rp. {{ number_format($data->product->product_price, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($data->price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
