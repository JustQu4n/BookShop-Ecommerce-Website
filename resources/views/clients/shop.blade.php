@extends('layouts.main')

@section('title')
    Shop
@endsection

@section('link')
    <link rel="stylesheet" href="{{ asset('assets/css/home1.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/head.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Shop.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/ReposiveTablet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/reposive.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/Icon/themify-icons/themify-icons.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>
    <script src="{{ asset('assets/js/home1.js') }}"></script>
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
            <a href="#" class="gen-a" style="color: red;">Shop</a>
            <a href="{{ route('blog.') }}" class="gen-a">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ</a>
            <a href="{{ route('home.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>

        <div class="menu-bartemp" id="hide">
            <a id="test" href="{{ route('home.') }}" class="color-line">Trang chủ</a>
            <a href="#" class="gen-a" style="color: red;">Shop</a>
            <a href="{{ route('blog.') }}" class="gen-a">Blog</a>
            <a href="{{ route('contact.') }}" class="gen-a">Liên hệ</a>
            <a href="{{ route('home.') }}" class="gen-a">Sự kiện</a>
            <a id="cart" href="{{ route('cart.') }}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
        </div>

    </div>
@endsection

@section('content')
    <div class="content content-shop">
        <div class="content-container container-shop">
            <div class="catogy">

                <div class="all-category" style="">
                    <h5 style=" background-image: url(frontend/assets/images/line.jpg);">DANH MỤC SÁCH TRUYỆN</h5>
                    <hr>
                    @php
                        $list_categories = getCategory();
                    @endphp
                    <div class="list-category">
                        <ul type="none">
                            @foreach ($list_categories as $category)
                                <li><a href="{{ route('shop.category', ['id' => $category->id]) }}"
                                        style="color: black; text-decoration: none">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="all-category">
                    <h5 style=" background-image: url(frontend/assets/images/line.jpg);">NHÀ XUẤT BẢN</h5>
                    <hr>
                    @php
                        $list_brands = getBrands();
                    @endphp
                    <div class="list-category">
                        <ul type="none">
                            @foreach ($list_brands as $brand)
                                <li><a href="{{ route('shop.brand', ['id' => $brand->id]) }}"
                                        style="color: black; text-decoration: none">{{ $brand->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="all-category">
                    <h5 style=" background-image: url(frontend/assets/images/line.jpg);">GIÁ</h5>
                    <hr>
                    <form action="{{ route('shop.price') }}" method="GET">

                        <div class="list-price">
                            <input type="number" min="0" name="min_price" value="0"> <input type="number"
                                min="50000" name="max_price" value="50000">
                        </div>
                        <div class="bt-list-price">
                            <button type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="listbook-container">
                <div id="name_category">
                    <h5 style="font-family: 'Varela Round', sans-serif;padding-top:5px">{{ $name }}</h5>
                </div>
                <div class="browse-tags pull-right hidden-xs">
                    <form>
                        @csrf
                        <span class="custom-dropdown custom-dropdown--white">
                            <select class="sort-by custom-dropdown__select custom-dropdown__select--white" id="filter"
                                name="sort-by">
                                <option>Lọc sản phẩm</option>
                                <option value="manual">Sản phẩm nổi bật</option>
                                <option value="price-ascending">Giá: Tăng dần</option>
                                <option value="price-descending">Giá: Giảm dần</option>
                                <option value="title-ascending">Tên: A-Z</option>
                                <option value="title-descending">Tên: Z-A</option>
                                <option value="created-ascending">Cũ nhất</option>
                                <option value="created-descending">Mới nhất</option>
                            </select>

                        </span>
                    </form>
                </div>
                <div class="tabcontent" id="page1">
                    <div class="type-drama" id="list_books">

                        @foreach ($list_books as $book)
                            <div class="my-book ">
                                <div class="dropdown">
                                    <div class="thumbnail-drama">
                                        <a href="{{ route('detail', ['id' => $book->id]) }}"><img
                                                src="{{ asset("uploads/books/$book->image") }}" alt=""></a>
                                    </div>

                                    <div class="more">
                                        <ul type="none">
                                            <li>
                                                <form method="POST">
                                                    @csrf
                                                    <input type="hidden" name="cart_name"
                                                        class="cart_book_name_{{ $book->id }}"
                                                        value="{{ $book->name }}">
                                                    <input type="hidden" name="cart_image"
                                                        class="cart_book_image_{{ $book->id }}"
                                                        value="{{ $book->image }}">
                                                    <input type="hidden" name="cart_price"
                                                        class="cart_book_price_{{ $book->id }}"
                                                        value="{{ $book->price }}">
                                                    <input type="hidden" name="cart_qty"
                                                        class="cart_book_qty_{{ $book->id }}" value="1">
                                                    <button class="add-cart btn btn-primary"
                                                        data-id="{{ $book->id }}"><i
                                                            class="fa-solid fa-cart-shopping" style="color: white"></i>
                                                        Thêm vào giỏ</button>
                                                </form>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="title-drama">
                                    <h6>{{ $book->name }}</h6>
                                </div>
                                <div class="author-drama">
                                    <span>{{ $book->author }}</span>
                                </div>
                                <div class="star-drama">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <div class="price-drama">
                                    <h6>{{ number_format($book->price) . ' ' . 'VNĐ' }}</h6>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $list_books->links() !!}
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
