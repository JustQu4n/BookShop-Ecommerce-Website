@extends('layouts.homelayout')
@section('content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-vs" id="top-banner-and-menu">
        <div class="container">
            <div class="row slider-banner">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 ">
                    <!-- ========================================== SECTION – HERO ========================================= -->
                    <div id="hero" class="">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                            <div class="item">
                                <img src="{{ asset('frontend\assets\images\banner\Black_friday_Cyber_monday_mainbanner_Slide_840x320.jpg') }}"
                                    alt="" width="100%" height="100%">
                            </div>
                            <!-- /.item -->
                            <div class="item">
                                <img src="{{ asset('frontend\assets\images\banner\FAHASA-ONT11_840x320.jpg') }}"
                                    alt="" width="100%" height="100%">
                            </div>
                            <!-- /.item -->
                            <div class="item"">
                                <img src="{{ asset('frontend\assets\images\banner\Trang_Manga-Comic_Mainbanner_T10_Slide_840x320.jpg') }}"
                                    alt="" width="100%" height="100%">
                            </div>
                            <!-- /.item -->

                        </div>
                        <!-- /.owl-carousel -->
                    </div>
                </div>

            </div>

            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
               
                 <div  style=" background-image: url(frontend/assets/images/line.jpg);">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title ">XEM NHIỀU NHẤT</h3>
    
                        <!-- /.nav-tabs -->
                    </div>
                 </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                @foreach ($books_rating as $key => $book)
                                    <div class="item item-carousel ">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ URL::to('product/' . $book->id) }}">
                                                            <img src="{{ asset('uploads/books/' . $book->image) }}"
                                                                alt="">
                                                           
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->

                                                    <div class="tag new"><span>Mới</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info ">
                                                    <h3 class="name" style=" font-family: Manrope, sans-serif;"><a href="detail.html">{{ $book->name }}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description" style="text-align: center;font-size:16px;color:rgb(39, 38, 38)">{{ $book->author }}</div>
                                                    <div class="product-price"> 
                                                       <p style="text-align: center;color:tomato; font-size:18px; font-weight:600;">{{number_format($book->price)}}VNĐ</p>
                                                     </div>

                                                </div>
                                                
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- /.home-owl-carousel -->
                        </div>
                        <!-- /.product-slider -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="seemore">
                        <div class="button-seemore"><a href="">XEM THÊM</a></div>
                    </div>
                </div>
                <!-- /.tab-content -->

            </div>


            <!-- ============================================== SCROLL TABS : END ============================================== -->
            <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
                <div  style=" background-image: url(frontend/assets/images/line.jpg);">
                <div class="more-info-tab clearfix ">
                    <h3 class="new-product-title ">SẢN PHẨM MỚI VỀ</h3>

                </div>
                </div>
                <div class="tab-content outer-top-xs">
                    <div class="tab-pane in active" id="all">
                        <div class="product-slider">
                            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                @foreach ($arrivebook as $key => $arrive)
                                    <div class="item item-carousel ">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="{{ URL::to('product/' . $arrive->id) }}">
                                                            <img src="{{ asset('uploads/books/' . $arrive->image) }}"
                                                                alt="">
                                                            <img src="Images\book-home\ad66579fcd9679a5b5b980e88dd92ee1.jpg.webp"
                                                                alt="" class="hover-image">
                                                        </a>
                                                    </div>

                                                    <div class="tag new"><span>Mới</span></div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info ">
                                                    <h3 class="name"  style=" font-family: Manrope, sans-serif;"><a href="detail.html">{{ $arrive->name }}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description" style="text-align: center;font-size:16px;color:rgb(39, 38, 38)">{{ $arrive->author }}</div>
                                                    <div class="product-price"> 
                                                        <span class="price" style="text-align: center;color:tomato;">
                                                            <p style="text-align: center;color:tomato; font-size:18px; font-weight:600;">{{number_format($arrive->price)}}VNĐ</p>
                                                         </span>  
                                                     </div>

                                                </div>

                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                @endforeach
                                <!-- /.products -->
                            </div>

                            <!-- /.item -->


                            <!-- /.item -->
                        </div>
                        <!-- /.home-owl-carousel -->
                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.tab-pane -->


                <div class="seemore">
                    <div class="button-seemore"><a href="">XEM THÊM</a></div>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners outer-bottom-xs">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"
                                src="{{asset('uploads/blogs/Trang_Manga-Comic_Mainbanner_T10_Slide_840x320.jpg')}}" alt=""> </div>
                    </div>
                    <!-- /.wide-banner -->
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"  src="{{asset('uploads\blogs\FAHASA-ONT11_840x320.jpg')}}" 
                                alt=""> </div>
                    </div>
                    <!-- /.wide-banner -->
                </div>

                <!-- /.col -->
                <div class="col-md-4 col-sm-4">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive"
                            src="{{asset('uploads/blogs/Fahasaday_mainbanner_Slide_840x320.jpg')}}"  alt="">
                        </div>
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.wide-banners -->


        <div class="wide-banners outer-bottom-xs">
            <div class="row">
                <div class="col-md-8">
                    <div class="wide-banner1 cnt-strip">
                        <div class="image"> <img class="img-responsive" src="./Images/slider/slider_3.jpg"
                                alt=""> </div>

                        <div class="new-label">
                            <div class="text">NEW</div>
                        </div>
                        <!-- /.new-label -->
                    </div>
                    <!-- /.wide-banner -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="wide-banner cnt-strip">
                        <div class="image"> <img class="img-responsive" src="./Images/slider/section_hot.jpg"
                                alt=""> </div>

                        <!-- /.new-label -->
                    </div>
                    <!-- /.wide-banner -->
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.wide-banners -->
        <!-- ============================================== WIDE PRODUCTS : END ============================================== -->




        {{-- <section class="section new-arriavls">
          <h3 class="section-title">XU HƯỚNG</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> 
                          <a href="detail.html">
                             <img src="assets/images/products/p10.jpg" alt=""> 
                              <img src="assets/images/products/p10_hover.jpg" alt="" class="hover-image">
                          </a>
                          
                          </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="add-cart-button btn-group">
                          <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="icon fa fa-heart"></i></button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
   
          
            
           
            <!-- /.item --> 
          </div>
          <div class="seemore">  <div class="button-seemore"><a href="">XEM THÊM</a></div></div>
          <!-- /.home-owl-carousel --> 
        </section> --}}

    </div>

    </div>

    <section class="section latest-blog outer-bottom-vs">
        <h3 class="section-title">BLOG TRUYỆN </h3>
        <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
                @foreach ($list_blog as $blog)
                    <div class="item">
                        <div class="blog-post">
                            <div class="blog-post-image">
                                <div class="image"> <a href="{{ URL::to('/blog-detail/' . $blog->id) }}"> <img
                                            src="{{ asset('uploads/blogs/' . $blog->image) }}" title=""
                                            alt="" height="250"></a> </div>
                            </div>
                            <!-- /.blog-post-image -->

                            <div class="blog-post-info text-left">
                                <h3 class="name"><a
                                        href="{{ URL::to('/blog-detail/' . $blog->id) }}">{{ $blog->title }}</a></h3>
                                <span class="info">{{ $blog->author }}</span>
                                <p class="text">{!! $blog->content_blog_short !!}</p>
                            </div>
                            <!-- /.blog-post-info -->

                        </div>
                        <!-- /.blog-post -->
                    </div>
                    <!-- /.item -->
                @endforeach
            </div>
            <!-- /.owl-carousel -->
        </div>
        <!-- /.blog-slider-container -->
    </section>
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
    </div>
@endsection
