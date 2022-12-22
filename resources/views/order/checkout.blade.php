<!DOCTYPE html>
<html>

<head>
    <title>Infor shipping</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logoes/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/inforShipping.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.choose').change(function() {

                var action = $(this).attr('id');
                var code_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = ""

                if (action == "city") {
                    result = 'province';
                } else {
                    result = 'wards';
                }

                $.post(
                    "{{ route('delivery.select-delivery') }}", // url 
                    {
                        _token: _token,
                        action: action,
                        code_id: code_id,

                    }, // data 
                    function(data) {
                        $('#' + result).html(data);
                    }
                )
            });
        });
    </script>

</head>

<body>
    <div class="testbox">
        <form action="{{ route('t1') }}" method="POST">
            @csrf
            <div class="banner">
                <h1>Thông tin vận chuyển đơn hàng</h1>
            </div>

            @if (session('miss'))
                <div class="alert alert-danger"> Vui lòng nhập đầy đủ các trường</div>
            @endif
            <div class="item">
                <p>Họ và tên</p>
                <input type="text" name="name" />
                @error('name')
                    <p style="color:red; ">{{ $message }}</p>
                @enderror
            </div>

            <div class="contact-item">
                <div class="item">
                    <p>Email</p>
                    <input type="text" name="email" />
                    @error('email')
                        <p style="color:red; ">{{ $message }}</p>
                    @enderror
                </div>

                <div class="item">
                    <p>Số điện thoại</p>
                    <input type="text" name="phone" />
                    @error('phone')
                        <p style="color:red; ">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="item">
                <p>Chọn tỉnh thành phố</p>
                <select name="city" id="city" class="choose">
                    <option value="">Chọn tỉnh/thành phố </option>
                    @foreach ($list_cities as $city)
                        <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                    @endforeach

                </select>
                @error('city')
                    <p style="color:red; ">{{ $message }}</p>
                @enderror
            </div>

            <div class="item">
                <p>Chọn quận/huyện</p>
                <select name="province" id="province" class="choose">
                    <option value=""> Chọn quận/huyện </option>
                </select>
                @error('province')
                    <p style="color:red; ">{{ $message }}</p>
                @enderror
            </div>

            <div class="item">
                <p>Chọn xã/phường</p>
                <select name="wards" id="wards">
                    <option value=""> Chọn xã/phường </option>
                </select>
                @error('wards')
                    <p style="color:red; ">{{ $message }}</p>
                @enderror
            </div>


            <div class="item">
                <p>Thôn/số nhà</p>
                <input type="text" name="village" />
                @error('village')
                    <p style="color:red; ">{{ $message }}</p>
                @enderror
            </div>

            <div class="item">
                <p>Ghi chú đơn hàng</p>
                <textarea rows="3" name="notes"></textarea>
            </div>

            <div class="item">
                <p>Chọn phương thức thanh toán</p>
                <select name="payment" id="">
                    <option value="1">Thanh toán khi nhận hàng</option>
                    <option value="2">Thanh toán qua ví điện tử</option>
                    <option value="3">Thanh toán qua tài khoản ngân hàng</option>
                </select>
            </div>

            <div class="btn-block">
                <button id="add">APPLY</button>
            </div>
    </div>
</body>

</html>
