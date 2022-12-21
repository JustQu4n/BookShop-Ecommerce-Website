<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logoes/logo.png') }}">
    <title>Sing Up</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/preload.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="overlay" class="login">

        <form class="login" action="{{ route('login.') }}" method="POST">
            @csrf

            <div class="con">
                @if (session('active_sucess'))
                    <div class="alert alert-success">
                        {{ session('active_sucess') }}
                    </div>
                    @php
                        session()->put('active_sucess', null);
                    @endphp
                @endif
                @if (session('change_success'))
                    <div class="alert alert-success">
                        {{ session('change_success') }}
                    </div>
                    @php
                        session()->put('change_success', null);
                    @endphp
                @endif
                @if (session('error_login'))
                    <div class="alert alert-danger">
                        {{ session('error_login') }}
                    </div>
                    @php
                        session()->put('error_login', null);
                    @endphp
                @endif
                <header class="head-form">
                    <a href="#"><img src="{{ asset('assets/images/header/New folder/logo.png') }}"
                            style="width: 50%; "alt=""></a>
                    <h2>Đăng nhập</h2>
                    <p>Nhập eamil và mật khẩu của bạn</p>
                </header>
                <br>
                <div class="field-set">
                    <input class="form-input" id="txt-input" type="text" placeholder="Nhập địa chỉ email" required
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <p style="color:red; margin-left: 18px;   text-transform:none;">{{ $message }}</p>
                    @enderror
                    <br>

                    <input class="form-input" type="password" placeholder="Mật khẩu" id="pwd" name="password"
                        required name="password" value="{{ old('password') }}">
                    @error('password')
                        <p style="color:red; margin-left: 18px;   text-transform:none;">{{ $message }}</p>
                    @enderror
                    <br>
                    <button type="submit" class="log-in" id="login1"> Đăng nhập </button>
                </div>
                <div class="social">
                    <a href="{{ route('login.facebook') }}" id="facebook"><img
                            src="{{ asset('assets/images/login/fb-btn.svg') }}" alt=""></a>
                    <a href="{{ route('login.google') }}" id="facebook"><img
                            src="{{ asset('assets/images/login/gp-btn.svg') }}" alt=""></a>
                </div>


                <div class="forget-signup">
                    <button><a href="{{ route('login.viewPass') }}" style="text-decoration: none;"> Quên mật
                            khẩu</a></button>
                    <div id="register"><a href="{{ route('registerindex') }}" style="text-decoration: none;">Đăng
                            ký</a> </div>
                </div>
            </div>
        </form>
    </div>




</body>

</html>
