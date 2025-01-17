@extends('layouts.index')

@section('home')
    active
@endsection

@section('content')
<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">
                                Welcome to <span>Selaras</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Share your happiness with us!
                                <a href="product.html"
                                    class="btn-get-started animate__animated animate__fadeInUp">Product</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{ asset('assets/img/slide/slide-2.jpg') }})">
                  <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">
                                Bouquet untuk <span>Wisuda</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Dengan bangga kami mempersembahkan Bouquet Wisuda Elegan,
                                sebuah karya indah yang dirancang khusus untuk merayakan
                                momen berharga dalam kehidupan seorang lulusan. Bouquet ini
                                merupakan pilihan sempurna untuk menghiasi acara wisuda,
                                memberikan kesan yang tak terlupakan, dan menyampaikan
                                selamat kepada mereka yang berhasil menyelesaikan perjalanan
                                pendidikan mereka.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url('{{ asset('assets/img/slide/slide-2.jpg') }}')">
                  <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">
                                Bouquet untuk <span>Ulang tahun</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Kami dengan senang hati mempersembahkan Bouquet Ulang Tahun
                                Istimewa, sebuah karya indah yang dirancang khusus untuk
                                merayakan momen bersejarah dalam hidup seseorang. Bouquet
                                ini adalah pilihan sempurna untuk memberikan kejutan yang
                                tak terlupakan dan menyampaikan ucapan selamat ulang tahun
                                dengan cara yang istimewa.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-item" style="background-image: url('{{ asset('assets/img/slide/slide-3.jpg') }}')">
                  <div class="carousel-container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__fadeInDown">
                                Dan <span>Lainnya</span>
                            </h2>
                            <p class="animate__animated animate__fadeInUp">
                                Tersedia berbagai macam Bouquet dan gift box yang bisa disesuaikan dengan request
                                pembeli,catalog product hanya sebagian sample, untuk custom dan pemesanan bisa
                                mengarah ke link yang tersedia
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured animate__animated animate__fadeInDown">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="icon-box">
                        <i class="bi bi-flower1"></i>
                        <h3><a href="">Money + Flower bouquet</a></h3>
                        <p>
                            mempersembahkan Money Flower dengan harga mulai dari 75K.
                            Money Flower adalah hadiah kreatif yang unik dan istimewa, di
                            mana uang kertas di kombinasi dengan bunga bunga, Hadiah ini
                            tidak hanya memberikan kebahagiaan visual, tetapi juga
                            memberikan nilai tambah berupa kejutan berupa uang kepada
                            penerimanya.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <i class="bi bi-flower2"></i>
                        <h3><a href="">Money + Baby flower bouquet</a></h3>
                        <p>
                            mempersembahkan Money Flower dengan harga mulai dari 65K.
                            Money Flower adalah pilihan hadiah yang unik dan kreatif, di
                            mana uang kertas dilipat sedemikian rupa sehingga membentuk
                            bunga yang indah. Selain memberikan keindahan visual, Money
                            Flower juga melambangkan keberuntungan dan kemakmuran.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <i class="bi bi-gift"></i>
                        <h3><a href="">Giftbox</a></h3>
                        <p>
                            mempersembahkan Giftbox Mewah dengan harga mulai dari 90K.
                            Giftbox ini merupakan pilihan yang sempurna untuk memberikan
                            kejutan istimewa kepada orang terkasih tanpa harus
                            mengeluarkan budget yang besar. Dengan desain yang menakjubkan
                            dan isi yang menarik, giftbox ini akan memikat hati penerima
                            dan menciptakan momen yang berkesan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  <img src="{{ asset('assets/img/about.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3>Selaras Bouquet</h3>
                    <p class="fst">
                        Kami dengan antusias dan dedikasi menyediakan penjualan bouquet
                        yang indah dan bermakna bagi pelanggan kami. Setiap bouquet yang
                        kami tawarkan dirancang dengan cermat dan diisi dengan
                        bunga-bunga artificial untuk memberikan pengalaman
                        yang memukau. Berikut ini adalah detail tentang penjualan
                        bouquet kami:
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-check-circle"></i> Desain yang Indah di setiap
                            bouquet dirancang oleh orang yang berpengalaman. memiliki
                            keahlian dalam menggabungkan bunga-bunga, warna, dan tekstur
                            yang berbeda untuk menciptakan tampilan yang indah. Baik itu
                            rangkaian bouquet yang elegan, gaya modern, atau gaya yang
                            lebih klasik, kami berusaha untuk menghadirkan desain yang
                            mencerminkan keindahan dan kreativitas.
                        </li>
                        <li>
                            <i class="bi bi-check-circle"></i> Personalisasi yang Unik di
                            setiap bunga, kami memahami bahwa setiap pelanggan memiliki
                            preferensi dan kebutuhan yang berbeda. Oleh karena itu, kami
                            menyediakan opsi personalisasi untuk bouquet kami. Anda dapat
                            memilih warna bunga, ukuran bouquet, jenis bunga yang
                            diinginkan, dan menambahkan hiasan tambahan, seperti pita,
                            daun, atau bahan dekoratif lainnya. Dengan personalisasi ini,
                            Anda dapat membuat bouquet menjadi lebih sesuai dengan
                            keinginan dan keunikan Anda.
                        </li>
                        <li>
                            <i class="bi bi-check-circle"></i> Kami memastikan bahwa
                            setiap bouquet dikirim dengan aman dan tepat waktu. Kami
                            bekerja sama dengan jasa pengiriman terpercaya untuk
                            mengantarkan bouquet Anda ke tujuan dengan kehati-hatian.
                        </li>
                    </ul>
                    <p>
                        Dengan penjualan bouquet kami, Anda dapat memilih rangkaian
                        bunga yang memukau untuk berbagai kesempatan, mulai dari ulang
                        tahun, pernikahan, perayaan, hingga ungkapan cinta dan simpati.
                        Kami berharap bahwa setiap bouquet yang kami tawarkan akan
                        memberikan keindahan, kebahagiaan, dan memperkuat hubungan Anda
                        dengan orang-orang terkasih.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <!-- End Services Section -->

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
                    <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-3.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-1.png') }}" class="img-fluid" alt="" />
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/clients/client-2.png') }}" class="img-fluid" alt="" />
                </div>
                
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
</main>
<!-- End #main -->

@endsection