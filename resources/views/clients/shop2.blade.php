@extends('layouts.main')

@section('title')
    Shop
@endsection

@section('link')
    {{-- <link rel="stylesheet" href="{{asset('assets/css/home1.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/head.css')}}">


    <link rel="stylesheet" href="{{asset('assets/css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/preload.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/css/Shop.css')}}"> --}}


    <link rel="stylesheet" href="{{asset('assets/css/ReposiveTablet.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/reposive.css')}}">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{asset('frontend/assets/css/owl.transitions.css')}}"> 
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-select.min.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/Icon/themify-icons/themify-icons.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    
 
    
@endsection

@section('navigation')
    
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

        <a id="test" href="{{route('home.')}}" class="color-line" >Trang chủ</a>
        <a  href="#" class="gen-a" style="color: red;">Shop</a>
        <a  href="{{route('blog.')}}" class="gen-a">Blog</a>
        <a  href="{{route('contact.')}}" class="gen-a">Liên hệ</a>
        <a  href="{{route('home.')}}" class="gen-a">Sự kiện</a>      
       <a id="cart" href="{{route('cart.')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>  
    </div>

    <div class="menu-bartemp" id ="hide">
        <a id="test" href="{{route('home.')}}" class="color-line" >Trang chủ</a>
        <a  href="#" class="gen-a" style="color: red;">Shop</a>
        <a  href="{{route('blog.')}}" class="gen-a">Blog</a>
        <a  href="{{route('contact.')}}" class="gen-a">Liên hệ</a>
        <a  href="{{route('home.')}}" class="gen-a">Sự kiện</a>      
       <a id="cart" href="{{route('cart.')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a> 
    </div>

</div>

@endsection

@section('content')

<div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-xs-12 col-sm-12 col-md-3 sidebar'> 
          
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter"> 
              <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
              <div class="sidebar-widget">
                <div class="widget-header">
                  <h4 class="widget-title">Danh mục</h4>
                </div>
                <div class="sidebar-widget-body">
                  <div class="accordion">
                
                    @php
                    $list_categories = getCategory(); 
                @endphp
                   <ul>
                    <li type="none">
                        @foreach ($list_categories as $category)
                                  <li><a href="{{route('shop.category', ['id' => $category->id])}}" style="color: black; text-decoration: none">{{$category->name}}</a></li>
                        @endforeach         
                    </li>      
                   </ul>
                  </div>
                  <!-- /.accordion --> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== SIDEBAR CATEGORY : END ============================================== --> 
              
              <!-- ============================================== PRICE SILDER============================================== -->
              <div class="sidebar-widget">
                <div class="widget-header">
                  <h4 class="widget-title">Mức giá</h4>
                </div>
                <form action="{{route('shop.price')}}" method="GET">
                <div class="sidebar-widget-body m-t-10">
                  <div class="price-range-holder"> 
                    <div class="list-price">
                      <input type="number" min="0" name="min_price"  value="0">  <input  type="number" min="50000" name="max_price" value="50000">
                  </div>
                  </div>
              
                  <!-- /.price-range-holder --> 
                  <button type="submit">Tìm kiếm</button></div>
                </form>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== PRICE SILDER : END ============================================== --> 
              <!-- ============================================== MANUFACTURES============================================== -->
              <div class="sidebar-widget">
                <div class="widget-header">
                  <h4 class="widget-title">Nhà xuất bản</h4>
                </div>
                <div class="sidebar-widget-body">
                  <ul class="list">
                    @php
                    $list_brands = getBrands();
                @endphp
                  @foreach ($list_brands as $brand )
                  <li><a href="{{route('shop.brand', ['id' => $brand->id])}}" >{{$brand->name}}</a></li>
                  @endforeach 
                   
                    
                  </ul>
                  <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
                </div>
                <!-- /.sidebar-widget-body --> 
              </div>
              <!-- /.sidebar-widget --> 
              <!-- ============================================== MANUFACTURES: END ============================================== --> 
              <!-- ============================================== COLOR============================================== -->
           
              

              
           
          <div class="sidebar-widget newsletter outer-bottom-small  outer-top-vs">
           
            <h1>anhquan</h1>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== NEWSLETTER: END ============================================== --> 
              
             
            </div>
            <!-- /.sidebar-filter --> 
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class="col-xs-12 col-sm-12 col-md-9 rht-col"> 
          <!-- ========================================== SECTION – HERO ========================================= -->
          
          {{-- <div id="category" class="category-carousel hidden-xs">
            <div class="item">
              <div class="image"> <img src="{{asset('assets\images\slider\DongA11_840x320.jpg')}}" alt="" > </div>
             
            </div>
          </div> --}}
          
       
          <div class="clearfix filters-container m-t-10">
            <div class="row">
              
              <div class="col col-sm-12 col-md-5 col-lg-5 hidden-sm">
                <div class="col col-sm-6 col-md-6 no-padding">
                  {{-- <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div> --}}
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <form>
                    @csrf
                  <select class="form-select sort-by"  id="filter" name="sort-by">
                    <option value="manual">Sản phẩm nổi bật</option>
                    <option value="price-ascending">Giá: Tăng dần</option>
                    <option value="price-descending">Giá: Giảm dần</option>
                    <option value="title-ascending">Tên: A-Z</option>
                    <option value="title-descending">Tên: Z-A</option>
                    <option value="created-ascending">Cũ nhất</option>
                    <option value="created-descending">Mới nhất</option>
                  </select>
                    </form>
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col -->
                
              </div>
              
            </div>
            <!-- /.row --> 
          </div>
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">
                    @foreach ($list_books as $book )
                    <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> 
                            <a href="{{route('detail', ['id' => $book->id])}}">
                               <img src="{{asset("uploads/books/$book->image")}}" alt=""> 
                                <img src="{{asset("uploads/books/$book->image")}}" alt="" class="hover-image">
                            </a> 
                         </div>
                            <!-- /.image -->
                            
                            {{-- <div class="tag new"><span>new</span></div> --}}
                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{route('detail', ['id' => $book->id])}}">{{$book->name}}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>
                            <div class="product-price"> <span class="price"> {{number_format($book->price)}} đ</span> <span class="price-before-discount">$ 800</span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          {{-- <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">  <i class="icon fa fa-heart"></i>  </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                              </ul>
                            </div>
                            <!-- /.action --> 
                          </div> --}}
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        
                      </div>
                      <!-- /.products --> 
                      </div>
                    </div>
                    <!-- /.item -->
                   @endforeach
                  </div>
                  <!-- /.row --> 
                  
                </div>
                <!-- /.category-product --> 
                
              </div>
              <!-- /.tab-pane -->
             
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container bottom-row">
                <div class="text-right">
                  {!! $list_books->links() !!}
                  
                   <!-- /.pagination-container --> 
                </div>
                <!-- /.text-right --> 
             </div>
             <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
          <div id="category" class="category-carousel hidden-xs">
            <div class="item">
              <div class="image"> <img src="{{asset('assets\images\slider\DongA11_840x320.jpg')}}" alt="" > </div>
             
            </div>
          </div>
          
        </div>
        <!-- /.col --> 
      </div>
@endsection



