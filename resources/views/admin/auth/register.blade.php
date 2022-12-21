<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="{{asset('frontend/assets/img/bg.svg')}}">
		</div>
		<div class="login-content">
			<form action="{{URL::to('/register')}}" method="post">
                @csrf
				<img src="{{asset('frontend/assets/img/avatar.svg')}}">
               
				<h5 class="title">Đăng ký tài khoản</h5>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Tên người dùng</h5>
           		   		<input type="text" class="input" name="admin_name">
							  @error('admin_name')
							  <span style="color:red;">{{$message}}</span>
							  @enderror
           		   </div>
           		</div>
                   <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                            <h5>Email</h5>
                            <input type="text" class="input" name="admin_email">
							@error('admin_email')
							  <span style="color:red;">{{$message}}</span>
							  @enderror
                    </div>
                 </div>
                 <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                            <h5>SĐT</h5>
                            <input type="text" class="input" name="admin_phone">
							@error('admin_phone')
							  <span style="color:red;">{{$message}}</span>
							  @enderror
                    </div>
                 </div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mật khẩu</h5>
           		    	<input type="password" class="input" name="admin_password">
						   @error('admin_password')
						   <span style="color:red;">{{$message}}</span>
						   @enderror
            	   </div>
            	</div>
            	<a href="#">Quên mật khẩu</a>
            	<input type="submit" class="btn" value="Đăng ký">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>
