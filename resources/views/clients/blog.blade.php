@extends('layouts.main')

@section('title')
    Blog
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/subPage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ReposiveTablet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reposive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scroollTop.css') }}">

    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="{{ asset('assets/js/home1.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">


    <!-- endcss -->
    <!-- fontgg -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/Icon/themify-icons/themify-icons.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@section('navigation')
    <div class="navigation" id="nav">

        <div class="logo">
            <a href="{{ route('home.') }}"><img src="{{ asset('assets/images/logoes/logo3.png') }}" alt=""></a>
        </div>
        <form action="{{ URL::to('/tim-kiem') }}" method="POST" autocomplete="off">
            @csrf
        <div class="search">
            <input type="text" placeholder="" name="keyword" id="keywords" value="{{ old('keyword') }}">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
        <button id="menu-an"><i class="ti-menu"></i></button>
        <div class=" menu-bar" style="display: flex ">

            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="{{ route('shop.') }}" class="gen-a">Shop</a>
            <a href="#" class="gen-a" style="color: red;">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
            <div class="qty-2">{{Cart::count()}}</div>
        </div>

        <div class="menu-bartemp" id="hide">
            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="{{ route('shop.') }}" class="gen-a">Shop</a>
            <a href="#" class="gen-a" style="color: red;">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>

    </div>
@endsection

@section('indexing')
    <div class="content-menu">
        <div class="title-menu">
            <h2>Blog</h2>
            <p><a href="">Trang chủ</a>-><a href="">Blog</a></p>
        </div>
    </div>
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <section class="blog-listing gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <div class="row">
                        @foreach ($list_blog as $blog)
                            <div class="col-sm-6">
                                <div class="blog-grid">
                                    <div class="blog-img">
                                        <div class="date">
                                            <span>04</span>
                                            <label>FEB</label>
                                        </div>
                                        <a href="{{ URL::to('/blog-detail/' . $blog->id) }}">
                                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" title=""
                                                alt="" height="250">
                                        </a>
                                    </div>
                                    <div class="blog-info" style="height:250px">
                                        <h5><a href="{{ URL::to('/blog-detail/' . $blog->id) }}">{{ $blog->title }}</a>
                                        </h5>
                                        <p>{!! $blog->content_blog_short !!}</p>
                                        <div class="btn-bar">
                                            <a href="{{ URL::to('/blog-detail/' . $blog->id) }}" class="px-btn-arrow">
                                                <span>Xem thêm</span>
                                                <i class="arrow"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1"><i
                                            class="fas fa-chevron-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 m-15px-tb blog-aside">



                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>BÀI VIẾT MỚI NHẤT</h3>
                        </div>
                        <div class="widget-body">
                            @foreach ($list_blog as $blog)
                                <div class="latest-post-aside media">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5><a
                                                    href="{{ URL::to('/blog-detail/' . $blog->id) }}">{{ $blog->title }}</a>
                                            </h5>
                                        </div>
                                        <div class="lpa-meta">
                                            <a class="name" href="{{ URL::to('/blog-detail/' . $blog->id) }}">
                                                {{ $blog->author }}
                                            </a>
                                            <a class="date" href="{{ URL::to('/blog-detail/' . $blog->id) }}">
                                                {{ $blog->create_at }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="lpa-right">
                                        <a href="{{ URL::to('/blog-detail/' . $blog->id) }}">
                                            <img src="{{ asset('uploads/blogs/' . $blog->image) }}" title=""
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- End Latest Post -->

                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>TAG</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Tinh thám</a>
                                <a href="#">Kinh dị</a>
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
    </section>
@endsection
