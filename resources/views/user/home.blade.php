@extends('user.master')

@push('title')
    Home
@endpush

@push('styles')
    <style>
        .main-img, .md-img, .sm-img, .lg1-img, .lg2-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 6px;
        }
        .main-img {
            width: inherit;
            height: 400px;
        }
        .md-img {
            width: inherit;
            height: 160px;
            border-radius: 5px !important;
            transform: scale(1);
            transition: all 0.5s ease-out 0s;
        }
        .sm-img {
            width: 120px;
            height: 100px;
        }
        .lg1-img {
            width: 360px;
            height: 420px;
        }
        .lg2-img {
            width: 360px;
            height: 335px;
        }
    </style>
@endpush

@section('content')
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <div class="row pt-5">
                    <div class="col-lg-8">
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <div class="main-img" style="background-image: url({{ url('/images/News/' . $trendingNow[0]['image']) }})"></div>
                                <div class="trend-top-cap">
                                    <span>{{ $trendingNow[0]['category']['name'] }}</span>
                                    <h2>
                                        <a href="{{ url('/news/' . $trendingNow[0]['slug']) }}">
                                            {{ Str::limit($trendingNow[0]['title'], 100) }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($trendingNow as $k => $v)
                                    @if ($k > 3)
                                        @break
                                    @endif
                                    @unless ($k == 0)
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <div class="md-img" style="background-image: url({{ url('/images/News/' . $v['image']) }})"></div>
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color{{ ($v['category']['id'] % 4) + 1 }}">{{ $v['category']['name'] }}</span>
                                                    <h4>
                                                        <a href="{{ url('/news/' . $v['slug']) }}">
                                                            {{ Str::limit($v['title'], 42) }}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endunless
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        @foreach ($trendingNow as $k => $v)
                            @if ($k > 8)
                                @break
                            @endif
                            @unless ($k < 4)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <div class="sm-img" style="background-image: url({{ url('/images/News/' . $v['image']) }})"></div>
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color{{ ($v['category']['id'] % 4) + 1 }}">{{ $v['category']['name'] }}</span>
                                        <h4>
                                            <a href="{{ url('/news/' . $v['slug']) }}">
                                                {{ Str::limit($v['title'], 42) }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            @endunless
                        @endforeach
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
                            @foreach ($weeklyNews as $row)
                                <div class="weekly-single">
                                    <div class="weekly-img">
                                        <div class="lg1-img" style="background-image: url({{ url('/images/News/' . $row['image']) }})"></div>
                                    </div>
                                    <div class="weekly-caption">
                                        <span class="color{{ ($row['category']['id'] % 4) + 1 }}">{{ $row['category']['name'] }}</span>
                                        <h4>
                                            <a href="{{ url('/news/' . $row['slug']) }}">
                                                {{ Str::limit($row['title'], 42) }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                            @foreach ($recentNews as $row)
                                <div class="single-recent mb-100">
                                    <div class="what-img">
                                        <div class="lg2-img" style="background-image: url({{ url('/images/News/' . $row['image']) }})"></div>
                                    </div>
                                    <div class="what-cap">
                                        <span class="color{{ ($row['category']['id'] % 4) + 1 }}">{{ $row['category']['name'] }}</span>
                                        <h4>
                                            <a href="{{ url('/news/' . $row['slug']) }}">
                                                {{ Str::limit($row['title'], 42) }}
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
