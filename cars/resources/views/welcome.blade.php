@extends('layouts.base')
@section('content')

<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #110e0e;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    .swiper-container {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #000;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 400px;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: auto;
        /* object-fit: cover; */
    }

    .swiper-button-next,
    .swiper-button-prev {
        padding: 10px;
        color: white;
        background: rgb(16, 31, 77);
        background: linear-gradient(90deg, rgba(16, 31, 77, 0) 0%, rgba(25, 61, 105, 0.5046219171262255) 25%, rgba(14, 16, 80, 0.7511205165660014) 51%, rgba(0, 0, 0, 1) 100%);
    }
</style>
<div class="container-fluid">
    <div id="image-slider-row" class="row">
        <div class="col pl-0 pr-0">
            <div class="sloganBox">
                <p><em>"Driving Dreams, Delivering Excellence. At Black Clover,
                        we believe that owning a car is not just a transaction,
                        it's an experience that should be filled with excitement and satisfaction.
                        Your dream car awaits, and
                        we're here to help you turn it into a reality."</em></p>
            </div>
        </div>
        <div class="col pl-0 pr-0">
            <div id="imageSlider" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="/images/cars/bmw_x5_xdrive40i.jpg" alt="image_slide_1"></div>
                    <div class="swiper-slide"><img src="/images/cars/jeep_wrangler_sport.jpg" alt="image_slide_2"></div>
                    <div class="swiper-slide"><img src="/images/cars/chevrolet_malibu_lt.jpg" alt="image_slide_3"></div>
                    <div class="swiper-slide"><img src="/images/cars/hyundai_tucson_limited.jpg" alt="image_slide_4"></div>
                    <div class="swiper-slide"><img src="/images/cars/lexus_rx_350_f_sport.jpg" alt="image_slide_5"></div>
                    <div class="swiper-slide"><img src="/images/cars/nissan_sentra_sv.jpg" alt="image_slide_6"></div>
                    <div class="swiper-slide"><img src="/images/cars/volvo_xc60_t5_inscription.jpg" alt="image_slide_7"></div>
                    <div class="swiper-slide"><img src="/images/cars/ford_fusion_se.jpg" alt="image_slide_8"></div>
                    <div class="swiper-slide"><img src="/images/cars/crv_exl.jpg" alt="image_slide_9"></div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="col pl-0 pr-0">
            <div class="sloganBox">
                <p><em>"Unleash the Road Ahead. At Black Clover, we don't just sell cars;
                        we ignite your passion for the open road. Our mission is to empower you with the freedom to explore, create memories,
                        and embark on unforgettable journeys.
                        Embrace the thrill of driving and set your sights on new horizons with Black Clover, where your driving experience comes first."</em></p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container-fluid introduction-banner">

        <div class="container text-box">
            <div class="text-center ">
                <h2>Introduction</h2>
            </div>
            <p>The Black Clover Website project aims to elevate the online car dealership experience
                by revamping Black Clover's current website into a cutting-edge platform. As the
                leading car dealership company specializing in selling cars online, Black Clover
                seeks to enhance its market position and provide customers with an immersive and user-friendly interface.</p>
        </div>
    </div>

    <div class="container-fluid service-cover">
        <div class="row">
            <div class="col car-service">
                <h3>BLACK CLOVER SERVICES</h3>
            </div>
            <div class="col sell-trade-banner">
                <h3>SELL AND TRADE</h3>
            </div>
        </div>


    </div>
    <div class="container-fluid brands-cover">
        <div class=" container">
            <div class="row">
                <div class="col container-fluid">
                    <h3>Brands</h3>
                    <p>We are proud to represent dealership connection with universal brands.</p>
                </div>

            </div>
            <div class="row">
                <div class="col logo-container"><img src="/images/car-logo/BMW-Flat-White.svg" alt="BMW-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Buick-Flat-White.svg" alt="Buick-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Chevy-Flat-White.svg" alt=Chevy-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Chrysler-Flat-White.svg" alt="Chrysler-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Dodge-Flat-White.svg" alt="Dodge-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Ford-Flat-White.svg" alt="Ford-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/GMC-Flat-White.svg" alt="GMC-logo"></div>
            </div>
            <div class="row">
                <div class="col logo-container"><img src="/images/car-logo/Honda-Flat-White.svg" alt="Honda-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Hyundai-Flat-White.svg" alt="Hyundai-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Infiniti-Logo-White.svg" alt="Infiniti-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Jaguar-Flat-White.svg" alt="Jaguar-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Jeep-Flat-White.svg" alt="Jeep-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Kia-Flat-White.svg" alt="Kia-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Lexus-Flat-White.svg" alt="Lexus-logo"></div>
            </div>
            <div class="row">
                <div class="col logo-container"><img src="/images/car-logo/LR-Flat-White.svg" alt="LR-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/MINI-Flat-White.svg" alt="MINI-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Nissan-Flat-White.svg" alt="Nissan-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/RAM-Flat-White.svg" alt="RAM-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Toyota-Flat-White.svg" alt="Toyota-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/Volvo-Spread-Word-Mark-–-White.svg" alt="Volvo-logo"></div>
                <div class="col logo-container"><img src="/images/car-logo/VW-Flat-White.svg" alt="VW-logo"></div>
            </div>
        </div>
    </div>
</div>
<script>
    var swiper = new Swiper(".mySwiper", {
        pagination: {
            el: ".swiper-pagination",
            type: "progressbar",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    var swiperNextButton = $(".swiper-button-next");
    var swiperPrevButton = $(".swiper-button-prev");
    swiperNextButton.html("");
</script>
@endsection