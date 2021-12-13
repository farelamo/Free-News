@extends('user.master')

@push('title')
    Latest News
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
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-0" role="tabpanel">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($news->items() as $n)
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{ $n['image'] }}" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color{{ ($n['category']['id'] % 4) + 1 }}">{{ $n['category']['name'] }}</span>
                                                            <h4>
                                                                <a href="{{ url('/news/' . $n['slug']) }}">
                                                                    {{ Str::limit($n['title'], 42) }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
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
                                <li class="page-item">
                                    @if ($news->onFirstPage())
                                        <span class="page-link">
                                            <span class="flaticon-arrow roted"></span>
                                        </span>
                                    @else
                                        <a class="page-link" href="{{ $news->previousPageUrl() }}">
                                            <span class="flaticon-arrow right-arrow roted"></span>
                                        </a>
                                    @endif
                                </li>
                                @foreach ($news->getUrlRange(1, $news->lastPage()) as $k => $v)
                                    <li class="page-item @if ($news->currentPage() == $k) active @endif">
                                        @if ($news->currentPage() == $k)
                                            <span class="page-link">{{ Str::of($k)->padLeft(2, '0') }}</span>
                                        @else
                                            <a class="page-link" href="{{ $v }}">{{ Str::of($k)->padLeft(2, '0') }}</a>                                            
                                        @endif
                                    </li>
                                @endforeach
                                <li class="page-item">
                                    @if ($news->currentPage() == $news->lastPage())
                                        <span class="page-link">
                                            <span class="flaticon-arrow"></span>
                                        </span>
                                    @else
                                        <a class="page-link" href="{{ $news->nextPageUrl() }}">
                                            <span class="flaticon-arrow right-arrow"></span>
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection