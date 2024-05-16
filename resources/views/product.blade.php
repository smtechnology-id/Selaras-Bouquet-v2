@extends('layouts.index')

@section('product')
    active
@endsection
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Product</li>
                </ol>
                <h2>Product Catalog</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($category as $data)
                                <li data-filter=".data-{{ $data->id }}">{{ $data->category_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container">

                    @foreach ($product as $product)
                        <div class="col-lg-4 col-md-6 portfolio-item data-{{ $product->category_id }}">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('storage/product_images/' . $product->product_image) }}" class="img-fluid" alt="" style="height: 250px; object-fit: cover">
                                <div class="portfolio-info">
                                    <h4>{{$product->product_title}}</h4>
                                    <p>{{$product->product_title}}</p>
                                    <div class="portfolio-links">
                                        <a href="{{route('productDetail', ['id' => $product->id])}}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="App 1"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->

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

    </main><!-- End #main -->

    <!-- ======
@endsection
