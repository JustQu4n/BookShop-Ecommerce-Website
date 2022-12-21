@extends('layouts.main')

@section('title')
    Detail product
@endsection

@section('link')
    <meta property="og:type" content="product" />
    <meta property="og:title" content="{{ $book->name }}" />
    <meta property="og:image" content="{{ asset("uploads/books/$book->image") }}" />
    <meta property="og:price:amount" content="{{ $book->price }}" />
    <meta property="og:price:currency" content="VND" />
    <meta property="og:description" content="Tác giả:{{ $book->author }}: so-binThể loại: dark fantasy" />
    <meta property="og:url" content="http://127.0.0.1:8000/product/{{ $id }}" />
    <meta property="og:site_name" content="Book Shop" />

    <link rel="stylesheet" href="{{ asset('assets/css/subPage.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/home1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome-free-6.1.1-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Icon/themify-icons/themify-icons.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/ReposiveTablet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reposive.css') }}">
    <script src="{{ asset('assets/js/home1.js') }}"></script>
@endsection

@section('navigation')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
        nonce="OCSHmm8w"></script>


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
            <a href="{{ route('blog.') }}" class="gen-a">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>

        <div class="menu-bartemp" id="hide">
            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="{{ route('shop.') }}" class="gen-a">Shop</a>
            <a href="{{ route('blog.') }}" class="gen-a">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>
    </div>
@endsection

@section('indexing')
    <div class="content-menu" style="width : 100%;">
        <div class="content-menu">
            <div class="title-menu">
                <h2>Book</h2>
                <p><a href="">Home</a>-><a href="">Shop</a>-><a href="">Drama</a>-><a
                        href="">A Banquet of
                        Moue</a></p>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @if (session('add_cart'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true"
            style="z-index:1000000; position:absolute; right: 15px; top: 50px; display: block;">
            <div class="toast-header">
                <img src="{{ asset("uploads/books/$book->image") }}" style="max-width: 50px; height: 50px"
                    class="rounded mr-2" alt="...">
                <strong class="mr-auto">{{ $book->name }}</strong>

                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Sách đã được thêm vào giỏ hàng
            </div>
        </div>
        @auth
            request()->session()-> put('add_cart', null);
        @endauth
    @endif


    <div id="content">
        <div class="content-container">

            <div class="content-book">
                <div class="thumbnail-book">
                    <img src="{{ asset("uploads/books/$book->image") }}" alt="Hình ảnh của sách">
                </div>
                <div class="info-book">
                    <div class="title-book">
                        {{--  <div class="sale">
                        <span>SALE!</span>
                    </div>  --}}
                        <div class="title1">
                            <h1>{{ $book->name }}</h1>
                        </div>
                        <div class="author">
                            <span>Tác giả:</span>
                            <span>{{ $book->author }}</span>
                        </div>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <div class="price">
                            <p>{{ number_format($book->price) . ' ' . 'VNĐ' }}</p>
                        </div>
                        <div class="qty-buy">
                            <form id="myForm" action="{{ route('checkout.') }}" style="min-width: 500px;"
                                method="POST">
                                @csrf
                                <input type="hidden" name="cart_name" class="cart_book_name_{{ $book->id }}"
                                    value="{{ $book->name }}">
                                <input type="hidden" name="cart_image" class="cart_book_image_{{ $book->id }}"
                                    value="{{ $book->image }}">
                                <input type="hidden" name="cart_price" class="cart_book_price_{{ $book->id }}"
                                    value="{{ $book->price }}">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="buy_now" value="buy_now">
                                <div class="qty" style="display: inline-block;">
                                    <input type="number" min="1" value="1" inputmode="numeric"
                                        autocomplete="off" name="cart_qty" class="cart_book_qty_{{ $book->id }}">
                                </div>
                                <div class="buy" style="display: inline-block;">
                                    <button name="btn" value="buy">Mua ngay</button>
                                </div>
                                <div class="cart" style="margin-left: 20px; display: inline-block; ">
                                    <button name="btn" value="cart" class="add-cart"
                                        data-id="{{ $book->id }}">Thêm vào giỏ hàng</button>
                                </div>

                            </form>

                        </div>
                        <div class="my-3">
                            <div class="fb-share-button" data-href="http://127.0.0.1:8000/product/{{ $id }}"
                                data-layout="button_count" data-size="large">
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=http://http://127.0.0.1:8000/product/{{ $id }};src=sdkpreparse"
                                    class="fb-xfbml-parse-ignore">Chia sẻ</a>
                            </div>
                            <div class="fb-like" data-href="http://127.0.0.1:8000/product/{{ $id }}"
                                data-width="" data-layout="button_count" data-action="like" data-size="large"
                                data-share="false"></div>

                        </div>
                        <div class="publisher">
                            <table>
                                <tr>
                                    <td>Nhà xuất bản:</td>
                                    <th>{{ $book->publisher }}</th>
                                </tr>
                                <tr>
                                    <td>Năm xuất bản:</td>
                                    <th>{{ $book->year }}</th>
                                </tr>
                                <tr>
                                    <td>Tổng số trang:</td>
                                    <th>{{ $book->total_page }}</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div clas="book-description">
                <div class="button-changepage">
                    <div class="bt-chg">
                        <button class="tablink act" id="des" onclick="openPage('mota', this, 'revi','review')">Tóm
                            tắt nội dung</button>
                        <button class="tablink" id="revi" onclick="openPage('review', this, 'des','mota')">Đánh
                            giá</button>
                    </div>
                </div>
                <div class="page-description">
                    <div id="mota" class="tabcontent active" style="text-align: left! important;">
                        {!! $book->content !!}
                    </div>

                    <div id="review" class="tabcontent">
                        <div class="fb-comments" data-href="http://127.0.0.1:8000/product/{{ $id }}"
                            data-width="" data-numposts="5"></div>
                    </div>


                </div>
            </div>
            <script>
                function openPage(tabActive, buttonActive, buttonUnActive, tabUnActive) {
                    var tab_active = document.getElementById(tabActive);
                    var button_un_active = document.getElementById(buttonUnActive);
                    var tab_un_active = document.getElementById(tabUnActive);

                    tab_active.classList.add("active");
                    button_un_active.classList.remove("act");
                    tab_un_active.classList.remove("active");
                    buttonActive.classList.add('act');

                }
            </script>
            <div class="relate-book">
                <div class="related">
                    <h2>Sản phẩm liên quan</h2>
                    <hr>
                </div>
                <div class="icon-relate">
                    @foreach ($relateBook as $book)
                        <div class="book-relate">
                            <div class="thumbnail-relate">
                                <a href="{{ route('detail', ['id' => $book->id]) }}">
                                    <img src="{{ asset("uploads/books/$book->image") }}" alt="">
                                </a>
                            </div>
                            <div class="title-relate">
                                <h6>{{ $book->name }}</h6>
                            </div>
                            <div class="author-relate">
                                <p>{{ $book->author }}</p>
                            </div>
                            <div class="star-relate">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="price-relate">
                                <h6>{{ number_format($book->price) . ' ' . 'VNĐ' }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    </script>
@endsection
