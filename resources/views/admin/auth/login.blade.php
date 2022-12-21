<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập -Admin</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	
	
	@if (Session::get('message'))
		<div class="alert alert-danger">
			{{ Session::get('message') }}

		</div>
	@endif
	
	<div class="container">
		<div class="img">
			<img src="{{asset('assets/images/logoes/logo3.png')}}">
		</div>
		
		<div class="login-content" >
			<form action="{{URL::to('/login-auth')}}" method="post">
				@csrf
				<img src="{{asset('frontend/assets/img/avatar.svg')}}">
				<h3 class="title">Trang quản trị</h3>
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
            	<input type="submit" class="btn" value="Đăng nhập">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('frontend/assets/js/main.js')}}"></script>
</body>
</html>
