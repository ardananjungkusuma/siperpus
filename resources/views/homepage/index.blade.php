@extends('homepage.templates.master')
@section('title')
Homepage | SIPERPUS
@endsection
@section('content')
<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".1s">Temukan buku favoritmu
                            sekarang!</h3>
                        <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                            <a href="#" class="boxed-btn3">Cari Buku</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- service_area_start  -->
<div class="service_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="about_img wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                    <img src="{{ asset('assets/home/img/about/about.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about_info pl-68">
                    <div class="section_title wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".3s">
                        <h3>Why Choose Us?</h3>
                    </div>
                    <p class="wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">Esteem spirit temper too say
                        adieus who direct esteem.It esteems luckily or picture placing drawing. Apartments frequently or
                        motionless on reasonable.</p>
                    <div class="about_btn wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".5s">
                        <a class="boxed-btn3" href="apply.html">About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service_area_end  -->

<!-- about_area_start  -->
{{-- <div class="about_area">

</div> --}}
<!-- about_area_end  -->

<div class="works_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center mb-90">
                    <span class="wow lightSpeedIn" data-wow-duration="1s" data-wow-delay=".1s"></span>
                    <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">How it Works</h3>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">We provide online instant cash
                        loans with quick approval that suit your term</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="single_works wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                    <span>
                        01
                    </span>
                    <h3>Apply for loan</h3>
                    <p>We will customize a loan based on the
                        amount of cash your company need term</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="single_works wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <span>
                        02
                    </span>
                    <h3>Application review</h3>
                    <p>We will customize a loan based on the
                        amount of cash your company need term</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="single_works wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                    <span>
                        03
                    </span>
                    <h3>Get funding fast</h3>
                    <p>We will customize a loan based on the
                        amount of cash your company need term</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="accordion_area">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-6">
                <div class="faq_ask pl-68">
                    <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Frequently ask</h3>
                    <div id="accordion">
                        <div class="card wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".3s">
                            <div class="card-header" id="headingOnee">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOnee"
                                        aria-expanded="true" aria-controls="collapseOnee">
                                        Adieus who direct esteem It esteems luckily?
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOnee" class="collapse show" aria-labelledby="headingOnee"
                                data-parent="#accordion">
                                <div class="card-body">
                                    Esteem spirit temper too say adieus who direct esteem esteems luckily or picture
                                    placing drawing.
                                </div>
                            </div>
                        </div>
                        <div class="card wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Who direct esteem It esteems?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion"
                                style="">
                                <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems
                                    luckily or picture placing drawing.
                                </div>
                            </div>
                        </div>
                        <div class="card wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Duis consectetur feugiat auctor?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordion" style="">
                                <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems
                                    luckily or picture placing drawing.
                                </div>
                            </div>
                        </div>
                        <div class="card wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".6s">
                            <div class="card-header" id="headingThree4">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseThree4" aria-expanded="false"
                                        aria-controls="collapseThree4">
                                        Consectetur feugiat auctor?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree4" class="collapse" aria-labelledby="headingThree4"
                                data-parent="#accordion" style="">
                                <div class="card-body">Esteem spirit temper too say adieus who direct esteem esteems
                                    luckily or picture placing drawing.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- testimonial_area  -->
<div class="testimonial_area  ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class="Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                            programmes to help alleviate human suffering through animal welfare when
                                            people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class=" Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                            programmes to help alleviate human suffering through animal welfare when
                                            people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_carousel">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="single_testmonial d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/testmonial/author.png" alt="">
                                        <div class="quote_icon">
                                            <i class="Flaticon flaticon-quote"></i>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <p>"Working in conjunction with humanitarian aid agencies, we have supported
                                            programmes to help alleviate human suffering through animal welfare when
                                            people might depend on livestock as their only source of income or food.</p>
                                        <span>- Micky Mouse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area  -->

<div class="apply_loan overlay">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7">
                <div class="loan_text wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
                    <h3>Mari Bergabung Menjadi Anggota Perpustakaan</h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="loan_btn wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".4s">
                    <a class="boxed-btn3" href="/auth/register">Bergabung Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection