@extends('layouts.main')

@section('title')
    My account
@endsection

@section('link')


    <meta property="og:site_name" content="Book Shop" />

    <link rel="stylesheet" href="{{asset('assets/css/subPage.css')}}">
    
    <link rel="stylesheet" href="{{asset('assets/css/home1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/head.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/preload.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
    <link href="{{asset('assets/fontawesome-free-6.1.1-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/Icon/themify-icons/themify-icons.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{asset('assets/css/ReposiveTablet.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/reposive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/myAccount.css')}}">
    @yield('link_account')
    <script src="{{asset('assets/js/home1.js')}}"></script>
    
@endsection

@section('navigation')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="OCSHmm8w"></script>


<div class="navigation" id="nav">
 
    <div class="logo">
       <a href="{{route('home.')}}"><img src="{{asset('assets/images/logoes/logo3.png')}}" alt=""></a>
    </div>
    <div class="search">
        <input type="text" placeholder="Find Your Book...">
        <button><i class="fa fa-search" aria-hidden="true"></i></button>
        <button id="menu-an" ><i class="ti-menu"></i></button>
    </div>
    <div class=" menu-bar" style="display: flex ">

        <a id="test" href="{{route('home.')}}" class="color-line">Trang chủ</a>
        <a  href="{{route('shop.')}}" class="gen-a"  >Shop</a>
        <a  href="{{route('blog.')}}" class="gen-a">Blog</a>
        <a  href="{{route('contact.')}}" class="gen-a">Liên hệ </a>
        <a  href="{{route('event.')}}" class="gen-a">Sự kiện</a>      
       <a id="cart" href="{{route('cart.')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>  
    </div>

    <div class="menu-bartemp" id ="hide">
        <a id="test" href="{{route('home.')}}" class="color-line">Trang chủ</a>
        <a  href="{{route('shop.')}}" class="gen-a"  >Shop</a>
        <a  href="{{route('blog.')}}" class="gen-a">Blog</a>
        <a  href="{{route('contact.')}}" class="gen-a">Liên hệ </a>
        <a  href="{{route('event.')}}" class="gen-a">Sự kiện</a>      
        <a id="cart" href="{{route('cart.')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>  
    </div>
</div>
    
@endsection

@section('content')
<div class="content">
    <nav class="navbart navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand pt-0 text-primary" href="{{route('myAccount.')}}">
            <img src="{{asset('assets/images/account.png')}}" style="width: 50px; " alt="">
            {{$data['user_name']}}
          </a>
          <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
              <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://demos.creative-tim.com/argon-dashboard/assets-old/img/theme/team-4.jpg">
                  </span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="./examples/profile.html" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <div class="navbar-collapse-header d-md-none">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="javascript:void(0)">
                    Creative Tim
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <form class="mt-4 mb-3 d-md-none">
              <div class="input-group input-group-rounded input-group-merge">
                <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fa fa-search"></span>
                  </div>
                </div>
              </div>
            </form>
            @if(session('nav') === 'account')
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('myAccount.')}}" style="color: red;">
                    <i class="ti-user text-primary"></i> Tài khoản của tôi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('myAccount.order')}}">
                    <i class="ti-notepad "></i> Đơn mua
                  </a>
                </li>
              </ul>
            @else 
              <ul class="navbar-nav ">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('myAccount.')}}" >
                    <i class="ti-user text-primary"></i> Tài khoản của tôi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('myAccount.order')}}" style="color: red;">
                    <i class="ti-notepad "></i> Đơn mua
                  </a>
                </li>
              </ul>
            @endif
          </div>
        </div>
      </nav>
      <div class="main-content">
        
           @yield('content_account')
   
      </div>
</div>

@endsection