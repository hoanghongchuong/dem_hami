<?php
    $setting = Cache::get('setting');
    $sliders = DB::table('slider')->where('com','gioi-thieu')->where('status',1)->get();
    $categories = \App\ProductCate::where('com','san-pham')->where('parent_id',0)->orderBy('id','desc')->get();
    $cate_banggia = DB::table('news')->where('com','bang-gia')->get();
?>
<header id="header" class="">
    <div class="container">
        <div class="row">
            <div class="top_header">
                <div class="col-md-3 col-xs-12 tac">
                    <a href="{{url('')}}" title="Trang chủ"><img src="{{asset('upload/hinhanh/'.$setting->photo)}}" class="logo-img" alt="Trang chủ"></a>
                </div>
                <div class="col-md-9 col-xs-12 menu">
                    <div class="col-md-3 col-xs-6">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{ asset('public/images/phone.png')}}" alt="Image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Hotline (24/7)</h4>
                                <p>{{$setting->phone}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{ asset('public/images/caculator.jpg')}}" alt="Image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">7 ngày đổi trả</h4>
                                <p>Miễn phí</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3 col-xs-6">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{ asset('public/images/oto.jpg')}}" alt="Image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Miễn phí</h4>
                                <p>Vận chuyển</p>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-3 col-xs-6">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{ asset('public/images/cart.jpg')}}" alt="Image">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Giỏ hàng</h4>
                                <p>({{Cart::count()}})</p>
                            </div>
                        </div>
                    </div> 
                     
                </div>
                
            </div>
        </div>
        <!-- menu-mobile -->                        
    </div>
</header><!-- /header -->
<div class="visible-xs visible-sm menu-mobile">
    <div class="vk-header__search">
        <div class="container">                
            <a href="#menuMobile" class="menu_Mobile" data-toggle="collapse" class="_btn d-lg-none menu_title"><i class="fa fa-bars"></i> Menu</a>
        </div>
    </div>
    <nav class="vk-header__menu-mobile">
        <ul class="vk-menu__mobile collapse" id="menuMobile">
            
            <li><a href="{{url('gioi-thieu')}}">Giới thiệu</a></li>
            <li>
                <a href="{{ url('san-pham') }}">Sản phẩm</a>

                <a href="#menu2" data-toggle="collapse" class="_arrow-mobile"><i class="_icon fa fa-angle-down"></i></a>
                <ul class="collapse" id="menu2">
                    @foreach($categories as $category)
                    <li><a href="{{url('san-pham/'.$category->alias)}}">{{$category->name}}</a></li>
                    @endforeach                      
                </ul>
            </li>
            <li>
                <a href="{{url('bang-gia')}}">Bảng giá</a>
                <a href="#banggia" data-toggle="collapse" class="_arrow-mobile"><i class="_icon fa fa-angle-down"></i></a>
                <ul class="collapse" id="banggia">                                
                    @foreach($cate_banggia as $b)
                    <li><a href="{{url('bang-gia/'.$b->alias.'.html')}}">{{$b->name}}</a></li>
                    @endforeach                       
                </ul>
            </li>
            <li><a href="{{url('dich-vu')}}">Dịch vụ</a></li>                            
            <li><a href="{{url('ho-tro')}}">Hỗ trợ</a></li>                            
            <li><a href="{{url('tin-tuc')}}">Tin tức</a></li>     
            <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
        </ul>
    </nav>        
</div>
<div class="slider-mobile visible-xs">
    <div id="carousel-id" class="carousel slide" data-ride="carousel">                
        <div class="carousel-inner">
            @foreach($sliders as $k=>$slider)
            <div class="item @if($k==0) active @endif">
                <img  alt="" src="{{asset('upload/hinhanh/'.$slider->photo)}}">
            </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
<div class="menu-cate visible-md visible-lg">
    <div class="top-menu">
        <div class="col-md-2"></div>
        <div class="col-md-7 menu pdl-0">
            <ul class="navi">
                <li><a href="{{url('')}}">Trang chủ</a></li>
                <li><a href="{{url('gioi-thieu')}}">Giới thiệu</a></li>
                <li>
                    <a href="{{url('san-pham')}}">Sản phẩm mới</a>
                    <!-- <i class="fa fa-angle-down"></i>
                    <ul class="vk-menu__child">                                
                        <li><a href="#">Danh mục sản phẩm 1</a></li>
                        <li><a href="#">Danh mục sản phẩm 1</a></li>
                        <li><a href="#">Danh mục sản phẩm 1</a></li>                        
                    </ul> -->
                </li>
                <li>
                    <a href="{{url('bang-gia')}}">Bảng giá</a>
                    <i class="fa fa-angle-down"></i>
                    <ul class="vk-menu__child">                                
                        @foreach($cate_banggia as $b)
                        <li><a href="{{url('bang-gia/'.$b->alias.'.html')}}">{{$b->name}}</a></li>
                        @endforeach                        
                    </ul>
                </li>
                <li><a href="{{url('dich-vu')}}">Dịch vụ</a></li>                            
                <li><a href="{{url('ho-tro')}}">Hỗ trợ</a></li>                            
                <li><a href="{{url('tin-tuc')}}">Tin tức</a></li>                            
                <li><a href="{{url('lien-he')}}">Liên hệ</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <div class="box-search">
                <div class="search-text" id="search_text">
                    <form action="{{route('search')}}" method="get" accept-charset="utf-8">
                        <div class="form-group">
                            <input type="text" placeholder="Tìm kiếm" class="input-search text" name="txtSearch">
                            <input type="submit" class="btn-search" id="search_btn" name="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bot-menu hidden-xs hidden-sm">
        <div class="col-md-2 pdr-0 pdl-0">
            <h3 class="title-cate"><i class="fa fa-align-justify"></i> Danh mục sản phẩm</h3>
            <div class="list-cate-home">
                <ul class="menu-sidebar">
                    @foreach($categories as $category)
                    <li>
                        <a href="{{url('san-pham/'.$category->alias)}}"><i class="fa fa-caret-right"></i>&nbsp;{{$category->name}}</a>
                        <ul class="menu-sidebar-child">
                            @foreach($category->categoryChild as $child)
                            <li><a href="{{url('san-pham/'.$child->alias)}}" title="{{$child->name}}">{{$child->name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>    
        <div class="col-md-10 col-xs-12 slider pdl-0 pdr-0">
            <div id="carousel-id1" class="carousel slide" data-ride="carousel">                
                <div class="carousel-inner">
                    @foreach($sliders as $k=>$slider)
                    <div class="item @if($k==0) active @endif">
                        <img  alt="" src="{{asset('upload/hinhanh/'.$slider->photo)}}">
                    </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-id1" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id1" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>    
    </div>
</div>