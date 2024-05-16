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
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{$orders->user->name}}</td>
                                    </tr>
                                    <tr>
                                       <td>Alamat Pengiriman</td>
                                       <td>:</td>
                                       <td>{{$orders->address}}</td>
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
                                       <td>{{$orders->status_order}}</td>
                                    </tr>
                                </table>
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
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

        </section>
    </div>
    
@endsection
