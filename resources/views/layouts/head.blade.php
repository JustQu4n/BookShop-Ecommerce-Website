<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class=" login">
    <span>Chào mừng bạn đến với thế giới sách!</span>

    <ul class="profile">
        @php
            $login_success = request()
                ->session()
                ->get('login_success');
        @endphp
        @if ($login_success)
            <li class="login-register">
                <div class="dropdown">
                   <p style="font-size:17px;font-weight:500;font-family:Arial, Helvetica, sans-serif"> {{Session::get('user_name')}} <i class="fa-solid fa-circle-user" style=" font-size: 25px;"></i></p>
                    <div class="dropdown-content">
                        <a href="{{ route('myAccount.') }}"><i class="fa-solid fa-circle-user" style="padding-right: 7px"></i> Tài khoản của tôi</a>
                       
                        <a href="{{ route('myAccount.order') }}"><i class="fa-solid fa-box"  style="padding-right: 7px"></i>  Đơn mua</a>
                         <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"  style="padding-right: 7px"></i>  Đăng xuất</a>
                    </div>
                </div>
            </li>
        @else
            <li class="login-register"><a href="{{ route('login.') }}">Đăng nhập</a> or <a
                    href="{{ route('registerindex') }}" style="color:#ff5740;">Đăng ký</a></li>
        @endif
        <li class="phone">
            <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                Free call :
                <span id="phone-number">012-345-678</span>
            </a>
        </li>
    </ul>
</div>
