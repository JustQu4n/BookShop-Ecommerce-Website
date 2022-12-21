<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logoes/logo.png')}}">
    <title> Register</title>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/preload.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
   
    <!-- signup -->

    <div class="overlay" class="register">

        <form style="width: 565px; margin: 0 auto;"  class="register" action="{{route('register')}}" method="POST">
            @csrf
            <div class="con">
                @if (session('active_account'))
                    <div class="alert alert-success">
                        {{ session('active_account') }}
                    </div>
                @endif
                @if (session('active_error'))
                    <div class="alert alert-danger">
                        {{ session('active_error') }}
                    </div>
                @endif
                <header class="head-form" style="margin: 0px">
                    <a href="{{route('home.')}}"><img src="{{asset('assets/images/header/New folder/logo3.png')}}" alt="" style="width: 60%; height: 58%;"></a>
                    <h2>Đăng ký</h2>
                </header>
                <br>
                <div class="signup">
                    <input class="form-input" id="txt-input" name="name" type="text" placeholder="Họ và tên" value="{{old('name')}}" style="right:0px; margin-left: 13px; width:88%"> 
                    @error('name')
                        <p style="color:red; margin-left: 10px;   text-transform:none;">{{$message}}</p>
                    @enderror

                    <input class="form-input" id="txt-input" name="phone" type="telephone" placeholder="Số điện thoại"  value="{{old('phone')}}" style="right:0px; margin-left: 13px; width:88%"> 
                    @error('phone')
                        <p style="color:red; margin-left: 10px;   text-transform:none;">{{$message}}</p>
                    @enderror

                    <input class="form-input" id="txt-input" name="email" type="email" placeholder="Email"  value="{{old('email')}}" style="right:0px; margin-left: 13px; width:88%;" >
                    @error('email')
                        <p style="color:red; margin-left: 10px;   text-transform:none;">{{$message}}</p>
                    @enderror
                    
                    <input class="form-input" type="password" name="password" placeholder="Mật khẩu" id="pwd" name="password"  value="{{old('password')}}" style="right:0px; margin-left: 13px; width:88%"> 
                    @error('password')
                        <p style="color:red; margin-left: 10px;   text-transform:none;">{{$message}}</p>
                    @enderror
                    <button type="submit" class="log-in" style="right:0px; margin-left: 23%;"> Đăng ký </button>
                    <input type="hidden" name="action" value="register">
                </div>
                <div class="forget-signup">
                    <button id="l"><a href="{{route('login.')}}" style="text-decoration: none;">Đăng nhập</a> </button>
                </div>
            </div>
        </form>
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>