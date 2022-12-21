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
            <a id="cart" href="{{ route('cart.') }}" style="color: red;"><i class="fa fa-shopping-bag"
                    aria-hidden="true"></i></a>
                    <div class="qty-2">{{Cart::count()}}</div>
        </div>

        <div class="menu-bartemp" id="hide">
            <a id="test" href="{{ route('home.') }}" class="color-line">HOME</a>
            <a href="{{ route('shop.') }}" class="gen-a">SHOP</a>
            <a href="{{ route('blog.') }}" class="gen-a">BLOG</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="{{ route('event.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}" style="color: red;"><i class="fa fa-shopping-bag"
                    aria-hidden="true"></i></a>
        </div>
    </div>
@endsection

@section('content')


    @php
        $count = Cart::count();
        
    @endphp
    <div class="container-fluid">
        @if ($count != 0)
            @if (session('discount_empty'))
                <div class="toast" id="toast-msg" role="alert" class="" aria-live="assertive" aria-atomic="true"
                    style="display: inline-block; background-color:     background-color: rgb(236, 146, 146,5); ">
                    <div class="toast-header" style="position: relative;">
                        <img src="{{ asset('assets/images/error/discount_error.png') }}"
                            style="max-width: 50px; height: 50px" class="rounded mr-2" alt="...">
                        <strong class="mr-auto" style="font-size: 17px; margin-left: 10px;">Sach ok</strong>

                        <button type="button" class="ml-2 mb-1 close" onclick="hide()" data-dismiss="toast"
                            aria-label="Close"
                            style="background: none; border: none; font-size: 25px; padding: 5px 10px; position: absolute; top: 0px; right: 0px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        Mã giảm giá không chính xác
                    </div>
                </div>

                <script>
                    function hide() {
                        var toast = document.getElementById('toast-msg');
                        toast.classList.add('toast-hide');
                    }
                    setTimeout(() => hide(), 7000);
                </script>
                @php
                    session()->put('discount_empty', null);
                @endphp
            @endif
            <div class="row">
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
                                    @foreach ($list_books as $book)
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
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
                                                        <figcaption class="info"> <a href="#"
                                                                class="title text-dark"
                                                                data-abc="true">{{ $book->name }}</a>
                                                        </figcaption>
                                                    </figure>
                                                </td>
                                                <td>
                                                    <input type="number" name="qty" id="" min="1"
                                                        value="{{ $book->qty }}"
                                                        style="width: 70px;
                                    text-align: center;">
                                                    <input type="hidden" name="rowId" value="{{ $rowId }}">
                                                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                                                <td>
                                                    <div class="price-wrap"> <var
                                                            class="price">{{ number_format($book->price * $book->qty) . ' ' . 'VNĐ' }}</var>
                                                    </div>
                                                </td>
                                                <td class="text-right d-none d-md-block" style="margin-left: 50px;">
                                                    <button data-original-title="Save to Wishlist" title=""
                                                        href="" class="btn btn-light" data-toggle="tooltip"
                                                        data-abc="true">
                                                        <i> Update</i>
                                                    </button>
                                                    <a href="{{ route('cart.remove', ['id' => $rowId, 'book_id' => $book->id]) }}"
                                                        class="btn btn-light btn-round" data-abc="true">Remove</a>
                                                </td>
                                            </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    @php
                        $total = Cart::initial();
                        $totalPrice = Cart::total();
                        $discount = Cart::discount();
                    @endphp
                    <div class="card mb-3">
                        <div class="card-body">
                            <form method="POST" action="{{ route('cart.discount') }}">
                                @csrf
                                <div class="form-group"> <label>Nhập mã giảm giá?</label>
                                    <div class="input-group"> <input type="text" class="form-control coupon"
                                            name="code" placeholder="Mã giảm giá">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary btn-apply coupon">Áp dụng</button>
                                        </span>
                                    </div>
                                    @error('code')
                                        <p style="color:red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <form action="{{ route('checkout.') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <dl class="dlist-align">
                                    <dt>Tông tiền:</dt>
                                    <dd class="text-right ml-3"> {{ $total . ' VNĐ' }}</dd>
                                    <input type="hidden" name="total" value="{{ $total }}">
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Giảm giá:</dt>
                                    <dd class="text-right text-danger ml-3">-{{ $discount . ' VNĐ' }} </dd>
                                    <input type="hidden" name="price_dicount" value="{{ $discount }}">
                                </dl>
                                <dl class="dlist-align">
                                    <dt>Tổng:</dt>
                                    <dd class="text-right text-dark b ml-3"><strong>{{ $totalPrice . ' VNĐ' }}</strong>
                                    </dd>
                                    <input type="hidden" name="price_pay" value="{{ $totalPrice }}">
                                </dl>
                                <hr><button>Mua hàng</button>
                                </a>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        @else
            <div class="alert" style="text-align: center; font-size: 40px; font-weight: 500;">
                Giỏ hàng rỗng
            </div>
        @endif

    </div>

    <script src=" {{ asset('assetts/js/cart.js') }}"></script>

@endsection
