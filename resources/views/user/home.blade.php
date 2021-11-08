@extends('user.master')

@push('title')
    Home
@endpush

@section('content')
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row pt-5">
                    <div class="col-lg-8">
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="https://via.placeholder.com/740x400?text=placeholder" alt="">
                                <div class="trend-top-cap">
                                    <span>Appetizers</span>
                                    <h2><a href="details.html">Welcome To The Best Model Winner<br> Contest At Look of the year</a></h2>
                                </div>
                            </div>
                        </div>
                        <div class="trending-bottom">
                            <div class="row">
                                @for ($i = 0; $i < 3; $i++)
                                    <div class="col-lg-4">
                                        <div class="single-bottom mb-35">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="https://via.placeholder.com/240x160?text=placeholder" alt="">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1">Lifestyple</span>
                                                <h4><a href="details.html">Get the Illusion of Fuller Lashes by “Mascng.”</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @for ($i = 0; $i < 5; $i++)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img">
                                    <img src="https://via.placeholder.com/120x100?text=placeholder" alt="">
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color1">Concert</span>
                                    <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="weekly-news-area pt-50">
        <div class="container">
            <div class="weekly-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            @for ($i = 0; $i < 5; $i++)
                                <div class="weekly-single">
                                    <div class="weekly-img">
                                        <img src="https://via.placeholder.com/360x420?text=placeholder" alt="">
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color1">Strike</span>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>Whats New</h3>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="properties__button">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-0-tab" data-toggle="tab" href="#nav-0" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                        @for ($i = 1; $i < 6; $i++)
                                            <a class="nav-item nav-link" id="nav-{{ $i }}-tab" data-toggle="tab" href="#nav-{{ $i }}" role="tab" aria-controls="nav-profile" aria-selected="false">{{ $i }}</a>                                            
                                        @endfor
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-0" role="tabpanel">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @for ($i = 0; $i < 6; $i++)
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="https://via.placeholder.com/360x355?text=placeholder" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                @for ($i = 1; $i < 6; $i++)
                                    <div class="tab-pane fade" id="nav-{{ $i }}" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                @for ($j = 0; $j < 6; $j++)
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="single-what-news mb-100">
                                                            <div class="what-img">
                                                                <img src="https://via.placeholder.com/360x355?text=placeholder" alt="">
                                                            </div>
                                                            <div class="what-cap">
                                                                <span class="color1">Night party</span>
                                                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="recent-articles">
        <div class="container">
            <div class="recent-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <img src="https://via.placeholder.com/360x335?text=placeholder" alt="">
                                    </div>
                                    <div class="what-cap">
                                        <span class="color1">Night party</span>
                                        <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
