@extends('user.master')

@push('title')
    About Us
@endpush

@push('styles')
    <style>
        .main-img, .ads-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .main-img {
            width: 750px;
            height: 362px;
        }
        .ads-img {
            width: 300px;
            height: 755px;
        }
    </style>
@endpush

@section('content')
    <div class="about-area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="about-right mb-90">
                        <div class="about-img">
                            <div class="main-img" style="background-image: url({{ $mainImg }});"></div>
                        </div>
                        <div class="section-tittle mb-30 pt-30">
                            <h3>About Us</h3>
                        </div>
                        <div class="about-prea">
                            <p class="about-pera1 mb-25">{{ $content }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-tittle mb-40">
                        <h3>Follow Us</h3>
                    </div>
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social h3 mb-0">
                                    <i class="fab fa-facebook"></i>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social h3 mb-0">
                                    <i class="fab fa-twitter"></i>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social h3 mb-0">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social h3 mb-0">
                                    <i class="fab fa-youtube"></i>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="news-poster d-none d-lg-block">
                        <div class="ads-img" style="background-image: url({{ $adsImg }});"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection