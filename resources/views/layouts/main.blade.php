<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logoes/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>@yield('title')</title>
    @yield('link')
</head>

<body>

    @include('layouts/loadpage')
    <div id="header">
        @include('layouts/head')

        <!-- this is nav -->
        @yield('navigation')
        @include('layouts/scriptHead')
    </div>
    @yield('indexing')

    @yield('content')

    @include('layouts/footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
    <script type="">
    $(document).ready(function () {
        $('.add-cart').click(function () {
            event.preventDefault();
            var id = $(this).data('id');
            var cart_book_name = $('.cart_book_name_' + id).val();
            var cart_book_image = $('.cart_book_image_' + id).val();
            var cart_book_price = $('.cart_book_price_' + id).val();
            var cart_book_qty  = $('.cart_book_qty_' + id).val();
            var _token = $('input[name=_token]').val(); 

            alert(cart_book_name); 
            $.post("{{route('cart.add')}}",
            {   
                name: cart_book_name,
                price: cart_book_price,
                qty: cart_book_qty,
                image: cart_book_image,
                id: id,

                _token: _token,
            },
            function(data){
               
                swal("Thành công", "Sản phẩm đã được thêm vào giỏ hàng", "success");
            });
            //swal("Good job!", "You clicked the button!", "success");
        }) 

        $('#filter').change(function () {
            var value_filter = $(this).val();
            var _token = $('input[name=_token]').val(); 

           $.post(
                '{{route('shop.filter')}}',
                {
                    value_filter: value_filter,
                    _token: _token
                },
                function(data) {
                   $('#list_books').html(data); 
                }
            ) 

        }); 
    });
</script>


</body>

</html>
