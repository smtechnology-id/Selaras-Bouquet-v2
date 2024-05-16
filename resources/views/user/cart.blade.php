@extends('layouts.index')

@section('cart')
    active
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <h2>Cart</h2>
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
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <!-- CART TABLE-->
                    <div class="table-responsive mb-4">
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
                                @foreach ($cart as $data)
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
                                            <span class="input-group-btn" style="margin-right: 10px">
                                                <form action="{{ route('minQtyCart') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{ $data->id }}" name="id">
                                                        <button type="submit"
                                                            class="quantity-left-minus btn btn-danger bi bi-dash-lg"
                                                            data-type="minus" data-field="">
                                                            <span class="glyphicon glyphicon-minus"></span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </span>
                                            <input type="text" id="quantity" name="quantity"
                                                class="form-control input-number" value="{{ $data->quantity }}"
                                                min="1" max="100" style="flex: 1; width:45px;" />
                                            <span class="input-group-btn" style="margin-left: 10px">
                                                <form action="{{ route('addQtyCart') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="hidden" value="{{ $data->id }}" name="id">
                                                        <button type="submit"
                                                            class="quantity-right-plus btn btn-success bi bi-plus"
                                                            data-type="plus" data-field="">
                                                            <span class="glyphicon glyphicon-plus"></span>
                                                        </button>
                                                    </div>
                                                </form>

                                            </span>
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <p class="mb-0 small">Rp. {{ number_format($data->price, 0, ',', '.') }} </p>
                                        </td>
                                        <td class="p-3 align-middle border-light">
                                            <a class="text-danger" href="{{ route('deleteCart', ['id' => $data->id]) }}"><i class="fas fa-trash-alt small text-danger"></i>Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- ORDER TOTAL-->
                    <div class="col-lg-4">
                        <div class="card border-0 rounded-0 p-lg-4 bg-light">
                            <div class="card-body">
                                <h5 class="text-uppercase mb-4">Cart total</h5>
                                <ul class="list-unstyled mb-0">
                                    <li class="border-bottom my-2"></li>
                                    <li class="d-flex align-items-center justify-content-between mb-4">
                                        <strong class="text-uppercase small font-weight-bold">Total</strong><span
                                            id="total">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- CART NAV-->
                    <div class="bg-light px-4 py-3">
                        <div class="row align-items-center text-center">
                            <div class="col-md-6 mb-3 mb-md-0 text-md-start">
                                <a class="btn btn-link p-0 text-dark btn-sm" href="{{route('product')}}"><i
                                        class="fas fa-long-arrow-alt-left me-2"> </i>Continue
                                    shopping</a>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <a class="btn btn-outline-dark btn-sm" href="{{route('prosesCheckout')}}">Procceed to checkout<i
                                        class="fas fa-long-arrow-alt-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>

        </section>
    </div>
    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">
            <div class="section-title">
                <h2>Available On</h2>
                <p>Kami memasarkan bouquet buatan kami di</p>
            </div>

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" />
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
@endsection
