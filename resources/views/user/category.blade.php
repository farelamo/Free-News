@extends('user.master')

@push('title')
    Category
@endpush

@section('content')
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
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
