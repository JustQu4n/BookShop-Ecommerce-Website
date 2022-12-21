@extends('layouts.main')

@section('title')
    Cart
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/subPage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ReposiveTablet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reposive.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome-free-6.1.1-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/Icon/themify-icons/themify-icons.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=BIZ+UDPGothic&family=Playfair+Display:ital,wght@0,400;1,400;1,500&family=Source+Sans+Pro:wght@200&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,400;1,500&family=Source+Sans+Pro:wght@200&display=swap"
        rel="stylesheet">
    <script src="{{ asset('assets/js/home1.js') }}"></script>
@endsection

@section('navigation')
    <div class="navigation" id="nav">

        <div class="logo">
            <a href="index.html"><img src="{{ asset('assets/images/logoes/logo3.png') }}" alt=""></a>
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
            <a id="test" href="{{ route('home.') }}" class="color-line">HOME</a>
            <a href="{{ route('shop.') }}" class="gen-a">SHOP</a>
            <a href="{{ route('blog.') }}" class="gen-a">BLOG</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>
    </div>
@endsection

@section('content')

    <div class="row my-3">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Sách</th>
                                <th scope="col" width="120">Số lượng</th>
                                <th scope="col" style="text-align: center; width: 170px; ">Giá</th>
                                <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('buy_now'))
                                <tr>
                                    <td>
                                        <figure class="itemside align-items-center">
                                            <div class="aside">

                                                <img src="{{ asset("uploads/books/$list_books->image") }}"
                                                    class="img-sm">
                                            </div>
                                            <figcaption class="info"> <a href="#" class="title text-dark"
                                                    data-abc="true">{{ $list_books->name }}</a>
                                            </figcaption>
                                        </figure>
                                    </td>
                                    <td>
                                        <input type="number" name="qty" id="" min="1"
                                            value="{{ session('qty') }}"
                                            style="width: 70px;
                                    text-align: center;">
                                    <td>
                                        <div class="price-wrap"> <var
                                                class="price">{{ number_format($list_books->price * session('qty')) . ' ' . 'VNĐ' }}</var>
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($list_books as $book)
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside">
                                                    @php
                                                        $img = $book->options['img'];
                                                        $subtoal = $book->subtotal();
                                                        
                                                        $rowId = $book->rowId;
                                                    @endphp
                                                    <img src="{{ asset("uploads/books/$img") }}" class="img-sm">
                                                </div>
                                                <figcaption class="info"> <a href="#" class="title text-dark"
                                                        data-abc="true">{{ $book->name }}</a>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            <input type="number" name="qty" id="" min="1"
                                                value="{{ $book->qty }}"
                                                style="width: 70px;
                                    text-align: center;">
                                        <td>
                                            <div class="price-wrap"> <var
                                                    class="price">{{ number_format($book->price * $book->qty) . ' ' . 'VNĐ' }}</var>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">

            @if (session('buy_now'))
                @php
                    $total = number_format($list_books->price * session('qty'));
                    $totalPrice = $list_books->price * session('qty');
                    $total_book_price = $list_books->price * session('qty');
                    $totalPrice += $fees_ship;
                    $discount = 0;
                @endphp
            @else
                @php
                    $total = Cart::initial();
                    $totalPrice = (float) str_replace(',', '', Cart::total());
                    $total_book_price = $totalPrice;
                    $totalPrice += $fees_ship;
                    $discount = Cart::discount();
                @endphp
            @endif

            <div class="card mb-3">

                <div class="card-body">
                    <p style="text-align: left;">Thông tin vận chuyển: {{ $delivery['village'] }},
                        {{ $delivery['wards_name'] }}, {{ $delivery['province_name'] }}, {{ $delivery['city_name'] }}.
                    </p>
                </div>

            </div>
            <div class="card">
                <form action="{{ route('checkout.insert_order') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <dl class="dlist-align">
                            <dt>Tông tiền:</dt>
                            <dd class="text-right ml-3"> {{ $total . ' VNĐ' }}</dd>
                            <input type="hidden" name="total" value="{{ $total_book_price }}">
                        </dl>
                        <dl class="dlist-align">
                            <dt>Giảm giá:</dt>
                            <dd class="text-right text-danger ml-3">-{{ $discount . ' VNĐ' }} </dd>
                            <input type="hidden" name="price_dicount" value="{{ $discount }}">
                        </dl>
                        <dl class="dlist-align">
                            <dt>Phí vận chuyển:</dt>
                            <dd class="text-right ml-3"> {{ number_format($fees_ship) . ' VNĐ' }}</dd>
                        </dl>
                        <dl class="dlist-align">
                            <dt>Tổng:</dt>
                            <dd class="text-right text-dark b ml-3">
                                <strong>{{ number_format($totalPrice, 2) . ' VNĐ' }}</strong></dd>
                            <input type="hidden" name="price_pay" value="{{ $totalPrice }}">
                        </dl>
                        <hr><button>Đặt hàng</button>
                        </a>
                    </div>
                    <input type="hidden" name="shipping_id" value="{{ $shipping_id }}">
                    <input type="hidden" name="payment_id" value="{{ $payment_id }}">
                    <input type="hidden" name="name" value="{{ $name }}">
                    <input type="hidden" name="phone" value="{{ $phone }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="notes" value="{{ $notes }}">
                    <input type="hidden" name="village" value="{{ $village }}">
                    @if (session('buy_now'))
                        <input type="hidden" name="book_price" value="{{ $list_books->price }}">
                    @endif
                </form>
            </div>
        </aside>
    </div>
    </div>

    <script src=" {{ asset('assetts/js/cart.js') }}"></script>

@endsection
