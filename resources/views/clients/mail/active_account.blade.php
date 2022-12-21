<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center;">
        <h2> Xin chào {{$user_name}}</h2>
        <p>Bạn đã đăng ký tài khoản tại shop của chúng tôi</p>
        <p>Để sử dụng được bạn vui lòng nhấn vào nút kích hoạt tài khoản bên dưới để kích hoạt tài khoản</p>
        <p>
            <button style="background-color: green; color: #fff; padding; 7px 25px; font-weight:bold;">
                 <a href="{{route('register.activate_account', ['id' => $user_id, 'token' => $token])}}" style="text-decoration: none;" >
                    Kích hoạt tài khoản
                </a>
            </button>
        </p>
    </div>
</div>
