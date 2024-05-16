@extends('layouts.index')

@section('content')
    <!-- section -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('product') }}">Product</a></li>
                <li>Product-detail</li>
            </ol>
            <h2>Product Catalog</h2>
        </div>
    </section><!-- End Breadcrumbs -->
    <!-- product detail -->

    <div class="container">
        <div class="row">
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
            <div class="col-12 col-md-6">
                <img src="{{ asset('storage/product_images/' . $product->product_image) }}" class="img-fluid"
                    class="imageproductdetail" alt="">
            </div>
            <div class="col-12 col-md-6">
                <h1>{{ $product->product_title }}</h1>
                <p class="text-muted lead">Rp. {{ number_format($product->product_price, 0, ',', '.') }} </p>


                <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span
                        class="small text-gray mr-4" style="width: 52px;">Add on</span>
                    <div class="container">
                        <form action="{{ route('addToCart') }}" method="post" class="mb-3">
                            @csrf
                            <div class="input-group">
                                <input type="number" id="quantity" name="quantity" class="form-control input-number"
                                    value="1" min="1" max="100">
                                <input type="hidden" id="product_id" name="product_id" class="form-control"
                                    value="{{ $product->id }}">
                                <button type="submit" class="btn btn-dark btn-sm">Add To Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <!-- DETAILS TABS-->
    <div class="tab-content mb-5" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="p-4 p-lg-5 bg-white">
                <h6 class="text-uppercase">Product description </h6>
                <p class="text-muted text-sm mb-0">{{ $product->product_desc }}</p>
            </div>
        </div>
    </div>
    </div>
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
