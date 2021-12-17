@extends('user.master')

@push('title')
    {{ $news->title }}
@endpush

@push('styles')
    <style>
        .img-nav, .img-recent {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .img-nav {
            width: 60px;
            height: 60px;
        }
        .img-recent {
            width: 80px;
            height: 80px;
        }
        .heart {
            width: 100px;
            height: 100px;
            background: url("https://cssanimation.rocks/images/posts/steps/heart.png") no-repeat;
            background-position: 0 0;
            cursor: pointer;
            transition: background-position 1s steps(28);
            transition-duration: 0s;
            top: -35px;
            left: -35px;
        }
        .heart.is-active {
            transition-duration: 1s;
            background-position: -2800px 0;
        }
        .like-info p {
            left: 40px;
        }
    </style>
@endpush

@section('content')
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ url('/images/News/' . $news->image) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $news->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        {{ $news->author->profile->name }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        {{ $news->updated_at->format('jS F Y') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-tag"></i>
                                        {{ $news->category->name }}
                                    </a>
                                </li>
                            </ul>
                            {{ $news->content }}
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center position-relative">
                            <div class="like-info">
                                <div class="heart position-absolute"></div>
                                <p id="like" class="position-absolute">{{ $news->like_count }} people like this</p>
                            </div>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="navigation-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    @if ($prevNews != null)
                                        <div class="thumb">
                                            <a href="{{ url('/news/' . $prevNews->slug) }}">
                                                <div class="img-nav" style="background-image: url({{ url('/images/News/' . $prevNews->image) }})"></div>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ url('/news/' . $prevNews->slug) }}">
                                                <span class="lnr text-white ti-arrow-left"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="{{ url('/news/' . $prevNews->slug) }}">
                                                <h4>{{ Str::of($prevNews->title)->substr(0, 21) }}...</h4>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    @if ($nextNews != null)
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="{{ url('/news/' . $nextNews->slug) }}">
                                                <h4>{{ Str::of($nextNews->title)->substr(0, 21) }}...</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ url('/news/' . $nextNews->slug) }}">
                                                <span class="lnr text-white ti-arrow-right"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ url('/news/' . $nextNews->slug) }}">
                                                <div class="img-nav" style="background-image: url({{ url('/images/News/' . $nextNews->image) }})"></div>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-author">
                        <div class="media align-items-center">
                            <img src="{{ url('/images/profile/' . $news->author->profile->picture) }}" alt="">
                            <div class="media-body">
                                <a href="#">
                                    <h4>{{ $news->author->profile->name }}</h4>
                                </a>
                                <p>{{ $news->author->profile->bio }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div id="disqus_thread"></div>
                    <script>
                        var disqus_config = function () {
                        this.page.url = window.location.href;
                        this.page.identifier = window.location.pathname;
                        };
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = 'https://free-news.disqus.com/embed.js';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @foreach ($categories as $c)
                                    <li>
                                        <a href="{{ url('/category/' . $c->slug) }}" class="d-flex">
                                            <p>{{ $c->name }}</p>
                                            <p>({{ $c->news_count }})</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @foreach ($recent as $r)
                                <div class="media post_item">
                                    <div class="img-recent" style="background-image: url({{ url('/images/News/' . $r->image) }})"></div>
                                    <div class="media-body">
                                        <a href="{{ url('/news/' . $r->slug) }}">
                                            <h3>{{ Str::of($r->title)->substr(0, 23) }}...</h3>
                                        </a>
                                        <p>{{ $r->updated_at->format('F d, Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            $(".heart").on("click", function() {
                if (!$(this).hasClass("is-active")) {
                    $.post("{{ url('/api/like-post') }}", { id: {{ $news->id }} })
                        .done((data) => {
                            $("#like").html(data + " people like this");
                            $(this).addClass("is-active");
                        });
                }
            });
        });
    </script>
@endpush
