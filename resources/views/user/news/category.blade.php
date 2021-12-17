@extends('user.master')

@push('title')
    Category
@endpush

@push('styles')
    <style>
        .news-img {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 6px;
            width: inherit;
            height: 250px;
        }
    </style>
@endpush

@section('content')
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-3 col-md-3">
                            <div class="section-tittle mb-30">
                                <h3>News Categories</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="list-group">
                                @if (request()->is('category'))
                                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                        Semua Kategori
                                    </a>
                                @else
                                    <a href="{{ url('/category') }}" class="list-group-item list-group-item-action">
                                        Semua Kategori
                                    </a>
                                @endif
                                @foreach ($categories as $row)
                                    @if (request()->is('category/' . $row['slug']))
                                        <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                            {{ $row['name'] }}
                                        </a>
                                    @else
                                        <a href="{{ url('/category/' . $row['slug']) }}" class="list-group-item list-group-item-action">
                                            {{ $row['name'] }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="whats-news-caption">
                                <div class="row">
                                    @forelse ($news->items() as $n)
                                        <div class="col-md-4">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <div class="news-img" style="background-image: url({{ url('/images/News/' . $n['image']) }})"></div>
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color{{ ($n['category']['id'] % 4) + 1 }}">{{ $n['category']['name'] }}</span>
                                                    <h4>
                                                        <a href="{{ url('/news/' . $n['slug']) }}">
                                                            {{ Str::limit($n['title'], 32) }}
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center">
                                            <div class="display-1">¯\_(ツ)_/¯</div>
                                            <br>
                                            <div class="h1">No News Found In This Category.</div>
                                        </div>
                                    @endforelse
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
            <div class="row justify-content-end">
                <div class="col-xl-9">
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
