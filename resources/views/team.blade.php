@extends('layouts.index')

@section('team')
    active
@endsection

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Available on</li>
            </ol>
            <h2>Available on</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/team/team-4.jpg" alt="">
                        <h4>WhatsApp</h4>
                        <p><button type="button" class="btn" style="background-color: #c16fd1;" data-toggle="button"
                                aria-pressed="false" autocomplete="off">
                                <a href="" style="color: white;">Contact us on WhatsApp</a>
                            </button></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/team/team-1.jpg" alt="">
                        <h4>Tiktok</h4>
                        <p><button type="button" class="btn" style="background-color: #c16fd1;" data-toggle="button"
                                aria-pressed="false" autocomplete="off">
                                <a href="" style="color: white;">See us on Tiktok</a>
                            </button></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/team/team-2.jpg" alt="">
                        <h4>Instagram</h4>
                        <p><button type="button" class="btn" style="background-color: #c16fd1;" data-toggle="button"
                                aria-pressed="false" autocomplete="off">
                                <a href="" style="color: white;">See us on Instagram</a>
                            </button></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/team/team-3.jpg" alt="">
                        <h4>Shopee</h4>
                        <p><button type="button" class="btn" style="background-color: #c16fd1;" data-toggle="button"
                                aria-pressed="false" autocomplete="off">
                                <a href="" style="color: white;">See us on Shopee</a>
                            </button></p>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Team Section -->
@endsection
