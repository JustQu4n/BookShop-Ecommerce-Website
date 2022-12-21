
<div class=" login">
    <span>Chào mừng bạn đến với thế giới sách!</span>

    <ul>
        @php
            $login_success = request()->session()->get('login_success');
        @endphp
      @if ($login_success)
        <li class="login-register">
            <div class="dropdown">
                <i class="dropbtn fa fa-user"></i>
                <div class="dropdown-content">
                    <a href="{{route('myAccount.')}}">Tài khoản của tôi</a>
                    <a href="{{route('logout')}}">Đăng xuất</a>
                    <a href="{{route('myAccount.order')}}">Đơn mua</a>
                </div>
            </div>
        </li>
    @else 
        <li class="login-register"><a href="{{route('login.')}}">Đăng nhập</a> or <a href="{{route('register')}}" style="color:#ff5740;">Đăng ký</a></li>
          
    @endif

        <li id="icon-login">
            <a href="https://www.facebook.com/iamq.falconm/"></a><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/iamq.falconm/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="https://www.facebook.com/iamq.falconm/"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li>
            <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                Free call :
                <span id="phone-number">012-345-678</span>
            </a>
        </li>
    </ul>
</div>