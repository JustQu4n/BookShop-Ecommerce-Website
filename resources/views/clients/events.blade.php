@extends('layouts.main')

@section('title')
    Events
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home1.css') }}">

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
            <a href="{{ route('home.') }}"><img src="{{ asset('assets/images/logoes/logo3.png') }}" alt=""></a>
        </div>
        <div class="search">
            <input type="text" placeholder="Find Events...">
            <button><i class="fa fa-search" aria-hidden="true"></i></button>
            <button id="menu-an"><i class="ti-menu"></i></button>
        </div>
        <div class=" menu-bar" style="display: flex ">

            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="{{ route('home.') }}" class="gen-a">Shop</a>
            <a href="{{ route('blog.') }}" class="gen-a">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="#" class="gen-a" style="color: red; ">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
            <div class="qty-2">{{Cart::count()}}</div>
        </div>

        <div class="menu-bartemp" id="hide">
            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="{{ route('home.') }}" class="gen-a">Shop</a>
            <a href="{{ route('blog.') }}" class="gen-a">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ </a>
            <a href="#" class="gen-a" style="color: red; ">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>

    </div>
@endsection

@section('indexing')
    <div class="content-menu" style="width : 100%;">
        <div class="title-menu">
            <h2>Sự kiện</h2>
            <p><a href="">Trang chủ</a>-><a href="">Sự kiện</a></p>
        </div>
    </div>
@endsection

@section('content')
    <!-- contetn-event -->

    <div id="noidung" style="width : 100%;" class="py-5">
        <div class="event-list" style="margin-left: 10%; margin-right: 10%;">
            <!-- event 1 -->
            @foreach ($list_events as $event)
                @php
                    $date = getDate(strtotime($event->start_time));
                    
                @endphp
                <div class="event row">
                    <div class="container">
                        <div class="row">
                            <h3>Tháng 12 2022</h3>
                        </div>
                        <div class="row content-event">
                            <!-- Noi dung o day -->
                            <div class="col-md-1 tieude" style="font-family: 'BIZ UDPGothic', sans-serif; ">
                                @if ($date['wday'] == 6)
                                    Chủ nhật
                                @elseIf($date['wday'] == 1)
                                    Thứ hai
                                @else
                                    Thứ {{ $date['wday'] }}
                                @endif

                                <br>
                                {{ date('d', strtotime($event->start_time)) }}
                            </div>
                            <div class="col-md-5 text-event">

                                <span class="time-event">
                                    <i class="ti-calendar"></i>
                                    {{ date('d/m/Y', strtotime($event->start_time)) }} {{ $event->start_hours }} -
                                    {{ date('d/m/Y', strtotime($event->end_time)) }} {{ $event->end_hours }}
                                </span>

                                <h2 class="eventnew"><a href="">{{ $event->name }}</a></h2>
                                <span class="addre" style="font-weight: bold;"><span style="font-weight: boldl;">Địa
                                        chỉ: </span>{{ $event->address }}</span> <br>
                                <span class="decription">
                                    {!! $event->description !!}
                                </span>
                            </div>
                            <div class="col-md-6 img">
                                <img id="image" src="{{ asset("uploads/events/$event->image") }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
