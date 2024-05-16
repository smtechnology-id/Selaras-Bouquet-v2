@extends('layouts.index')

@section('pesanan')
    active
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <h2>Pesanan Saya</h2>
        </div>
    </section>
    <!-- End Breadcrumbs -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <section class="py-5">
            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card border-0 rounded-0 p-lg-4 bg-light">
                            <div class="card-body">
                                <h5 class="text-uppercase mb-4">Pesanan total</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="border-bottom my-2"></li>
                                    <li class="d-flex align-items-center justify-content-between mb-4">
                                        <strong class="text-uppercase small font-weight-bold">Total</strong><span
                                            id="total">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mb-4">
                                        <strong class="text-uppercase small font-weight-bold">Kode Pesanan</strong><span
                                            id="total">{{ $kodePesanan }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 rounded-0 p-lg-4 bg-light">
                            <div class="card-body">
                                <h5 class="text-uppercase mb-4">Instruksi Pembayaran</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="border-bottom my-2"></li>
                                    <li class="d-flex align-items-center justify-content-between mb-4">
                                        <span id="total">-> Silahkan Lakukan Pembayaran dengan Total <strong>Rp.
                                                {{ number_format($totalPrice, 0, ',', '.') }}</strong> Ke Nomor
                                            Rekening dibawah</span>

                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mb-4">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <td>Bank</td>
                                                    <td>Atas Nama</td>
                                                    <td>Nomor Rekening</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BANK BCA</td>
                                                    <td>ADMIN</td>
                                                    <td>123345677</td>
                                                </tr>
                                                <tr>
                                                    <td>Dana</td>
                                                    <td>ADMIN</td>
                                                    <td>123345677</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </li>
                                    <li class="d-flex align-items-center justify-content-between mb-4">
                                        <p>-> Simpan Bukti Transaksi nya dan isikan Form Konfirmasi Pembayaran Di Bawah,
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <!-- ORDER TOTAL-->

                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
                        <p>Silahkan Cek Kembali Pesanan Anda Dan Isi Form Dibawah @includeIf('view.name', ['some' => 'data'])</p>
                        <table class="table text-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th class="border-0 p-3" scope="col">
                                        <strong class="text-sm text-uppercase">Product</strong>
                                    </th>
                                    <th class="border-0 p-3" scope="col">
                                        <strong class="text-sm text-uppercase">Price</strong>
                                    </th>
                                    <th class="border-0 p-3" scope="col">
                                        <strong class="text-sm text-uppercase">Quantity</strong>
                                    </th>
                                    <th class="border-0 p-3" scope="col">
                                        <strong class="text-sm text-uppercase">Total</strong>
                                    </th>
                                    <th class="border-0 p-3" scope="col">
                                        <strong class="text-sm text-uppercase">Aksi</strong>
                                    </th>
                                    <th class="border-0 p-3" scope="col">
                                        <strong class="text-sm text-uppercase"></strong>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="border-0">
                                @foreach ($order as $data)
                                    <tr>
                                        <th class="ps-0 py-3 border-light" scope="row">
                                            <div class="d-flex align-items-center">
                                                <a><img src="{{ asset('storage/product_images/' . $data->product->product_image) }}"
                                                        alt="..." width="200px" /></a>
                                                <div class="ms-3">
                                                    <strong class="h6"><a>{{ $data->product_title }}</a></strong>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="p-3 align-middle border-light">
                                            <p class="mb-0 small">Rp.
                                                {{ number_format($data->product->product_price, 0, ',', '.') }} </p>
                                        </td>
                                        <td class="p-3 align-middle border-light"
                                            style="display: flex; align-items: center">
                                            <input type="text" id="quantity" readonly name="quantity"
                                                class="form-control input-number" value="{{ $data->quantity }}"
                                                min="1" max="100" style="flex: 1; width:45px;" />
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <p class="mb-0 small">Rp. {{ number_format($data->price, 0, ',', '.') }} </p>
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <a class="text-danger"
                                                href="{{ route('deleteOrderProduct', ['id' => $data->id]) }}"><i
                                                    class="fas fa-trash-alt small text-danger"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card border-0 rounded-0 p-lg-4 bg-light">
                                <div class="card-body">
                                    <h5 class="text-uppercase mb-4">Form Konfirmasi Pembayaran</h5>
                                    <form action="{{ route('orderPost') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-2">
                                            <label for="kode_pesanan">Kode Pesanan</label>
                                            <input type="text" name="kode_pesanan" readonly value="{{ $kodePesanan }}" id="kode_pesanan" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="total_price">Total Harga</label>
                                            <input type="text" name="total_price" readonly value="{{ $totalPrice }}" id="total_price" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="telp">Telp</label>
                                            <input type="text" name="telp" id="telp" class="form-control">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="address">Alamat Pengiriman</label>
                                            <textarea name="address" id="address" cols="30" rows="3" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="payment_proof">Upload Bukti Pembayaran</label>
                                            <input type="file" name="payment_proof" id="payment_proof" class="form-control" required> 
                                        </div>

                                        <div class="form-group mb-2 mt-2">
                                            <button type="submit" class="btn btn-outline-dark">Proses Pesanan</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


        </section>
    </div>
    >
@endsection
