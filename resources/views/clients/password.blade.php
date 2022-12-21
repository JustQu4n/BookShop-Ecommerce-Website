<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/logoes/logo.png')}}">
    <title>Sing Up</title>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/preload.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
    <div class="overlay" class="login">

        <form class="login" action="{{route('login.viewPass')}}" method="POST">
            @csrf
          
            <div class="con">
                @if (session('change_pass'))
                    <div class="alert alert-success">
                        {{ session('change_pass') }}
                    </div>
                @endif
                @if (session('active_error'))
                <div class="alert alert-danger">
                    {{ session('active_error') }}
                </div>
            @endif
                <header class="head-form">
                    <a href="{{route('home.')}}"><img src="{{asset('assets/images/header/New folder/logo.png')}}" style="width: 50%; "alt=""></a>
                    <h2>Thay đổi mật khẩu</h2>
                    <p>Nhập địa chỉ email mà bạn đã tạo tài khoản</p>
                </header>
                <br>
                <div class="field-set">
                    <input class="form-input" id="txt-input" type="text" placeholder="Nhập địa chỉ email" required name="email">
                    @error('email')
                        <p style="color:red; margin-left: 18px;   text-transform:none;">{{$message}}</p>
                    @enderror
                    <br>
                    <br>
                    <button type="submit" class="log-in" id="login1" >Thay đổi mật khẩu</button>
                </div>    
            </div>
        </form> 
    </div>
   
</body>
</html>