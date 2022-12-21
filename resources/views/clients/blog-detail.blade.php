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
    <link rel="stylesheet" href="{{ asset('assets/css/blog-detail.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ReposiveTablet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reposive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scroollTop.css') }}">

    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="{{ asset('assets/js/home1.js') }}"></script>



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
        <div class="search">
            <input type="text" placeholder="Find Your Book...">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
            <button id="menu-an"><i class="ti-menu"></i></button>
        </div>
        <div class=" menu-bar" style="display: flex ">

            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="{{ route('shop.') }}" class="gen-a">Shop</a>
            <a href="#" class="gen-a" style="color: red;">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
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
    <div class="container mt-5">
        <div class="row">
            @foreach ($blog as $blog_detail)
                <div class="col-lg-12">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">{{ $blog_detail->title }}</h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on January 1, 2022 by Start Bootstrap</div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded"
                                src="{{ asset('uploads/blogs/' . $blog_detail->image) }}" alt="..." /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p>{!! $blog_detail->content !!}</p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            {{-- <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                        <!-- Comment with nested comments-->
                        <div class="d-flex mb-4">
                            <!-- Parent comment-->
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                <!-- Child comment 1-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                    </div>
                                </div>
                                <!-- Child comment 2-->
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When you put money directly to a problem, it makes a good headline.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single comment-->
                        <div class="d-flex">
                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">Commenter Name</div>
                                When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                            </div>
                        </div>
                    </div> --}}
                        </div>
                    </section>
                </div>
            @endforeach
            <!-- Side widgets-->
            {{-- <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
