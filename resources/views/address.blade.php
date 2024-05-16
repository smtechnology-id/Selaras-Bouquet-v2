@extends('layouts.index')

@section('address')
    active
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Contact</li>
            </ol>
            <h2>Contact</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Our Address</h3>
                        <p>test</p>
                    </div>
                </div>

                <div class="col align-items-stretch" style="height: 500px;">
                    <div class="info-box mb-4" style="height: 500px;">
                        <iframe src="" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
