<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center;">
        <h2> Xin chào {{$user_name}}</h2>
        <p>Thay đổi mật khẩu</p>
        <p>Để thay đổi mật khẩu  tài khoản  bạn vui lòng kích vào bên dưới để thay đổi mật khẩu</p>
        <p>
            <button style="background-color: green; color: #fff; padding; 7px 25px; font-weight:bold;">
                 <a href="{{route('login.postPass', ['id' => $user_id, 'token' => $token])}}" style="text-decoration: none;" >
                    Kích hoạt tài khoản
                </a>
            </button>
        </p>
    </div>
</div>
