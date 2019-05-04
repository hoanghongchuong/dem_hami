@extends('index')
@section('content')

<?php
$setting = Cache::get('setting');
$sliders = DB::table('slider')->where('status',1)->where('com','gioi-thieu')->orderBy('id','desc')->first();
?>
<div class="box-home" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="box-cate">
                <div class="top-box">
                    <ul class="cate-child nav nav-tabs">                            
                        <li  class="active"><a data-toggle="tab" href="#productHot" aria-expanded="true">Sản phẩm hot</a></li>
                        <li><a data-toggle="tab" href="#productSaleOf" aria-expanded="true">Sản phẩm bán chạy</a></li>
                        <li><a data-toggle="tab" href="#productNew" aria-expanded="true">Sản phẩm mới nhất</a></li>
                    </ul>
                    <div class="tab-content">
                        
                        <div class="tab-pane fade active in" id="productHot">
                            <div class="list-product-item">
                                <div class="">
                                    @foreach($productHot as $hot)
                                    <div class="item col-md-3 col-xs-6">
                                        <a href="{{url('san-pham/'.$hot->alias.'.html')}}" title="{{$hot->name}}"><img src="{{asset('upload/product/'.$hot->photo)}}" alt="{{$hot->name}}">
                                        </a>
                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="{{url('san-pham/'.$hot->alias.'.html')}}" title="{{$hot->name}}">{{$hot->name}}</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: {{number_format($hot->price)}} VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="productSaleOf">
                            <div class="list-product-item">
                                <div class="">
                                    @foreach($productSaleOf as $sale)
                                    <div class="item col-md-3 col-xs-6">
                                        <a href="{{url('san-pham/'.$sale->alias.'.html')}}" title="{{$sale->name}}"><img src="{{asset('upload/product/'.$sale->photo)}}" alt="{{$sale->name}}">
                                        </a>                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="{{url('san-pham/'.$sale->alias.'.html')}}" title="{{$sale->name}}">{{$sale->name}}</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: {{number_format($sale->price)}} VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="productNew">
                            <div class="list-product-item">
                                <div class="">
                                    @foreach($productNew as $product)
                                    <div class="item col-md-3 col-xs-6">
                                        <a href="{{url('san-pham/'.$product->alias.'.html')}}" title="{{$product->name}}"><img src="{{asset('upload/product/'.$product->photo)}}" alt="{{$product->name}}">
                                        </a>                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="{{url('san-pham/'.$product->alias.'.html')}}" title="{{$product->name}}">{{$product->name}}</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: {{number_format($product->price)}} VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>                       
                <div class="read-more"><a href="{{url('san-pham')}}" title="">Xem tất cả <span><i class="fa fa-arrow-right"></i></span></a></div>                    
            </div>
        </div>
    </div>
</div>
@foreach($categories_home as $k=>$cate)
<div class="box-home" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="box-cate">
                <div class="top-box">
                    <ul class="cate-child nav nav-tabs">
                        
                        <li  class="active"><a data-toggle="tab" href="#cate{{$cate->id}}" aria-expanded="true">{{$cate->name}}</a></li>
                        @foreach($cate->categoryChild as $key=>$child)
                        <li><a data-toggle="tab" href="#cate{{$child->id}}" aria-expanded="true">{{$child->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="cate{{$cate->id}}">
                            <div class="list-product-item">
                                <div class="">
                                    @foreach($cate->products as $item)
                                    <div class="item col-md-3">
                                        <a href="{{url('san-pham/'.$item->alias.'.html')}}" title="{{$item->name}}"><img src="{{asset('upload/product/'.$item->photo)}}" alt="{{$item->name}}">
                                        </a>
                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="{{url('san-pham/'.$item->alias.'.html')}}" title="{{$item->name}}">{{$item->name}}</a></p>
                                            <div class="price tac info-price">
                                                @if($item->price < $item->price_old)
                                                <p class="price_old">{{number_format($item->price_old)}} VNĐ</p>
                                                @endif
                                                <p class="price_news">Giá: {{number_format($item->price)}} VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach                                    
                                </div>
                            </div>
                        </div>
                        @foreach($cate->categoryChild as $key=>$child)
                        <div class="tab-pane fade" id="cate{{$child->id}}">
                            <div class="list-product-item">
                                <div class="">
                                    @foreach($child->products as $data)
                                    <div class="item col-md-3">
                                        <a href="{{url('san-pham/'.$data->alias.'.html')}}" title="{{$data->name}}"><img src="{{asset('upload/product/'.$data->photo)}}" alt="{{$data->name}}">
                                        </a>
                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="{{url('san-pham/'.$data->alias.'.html')}}" title="{{$data->name}}">{{$data->name}}</a></p>
                                            <div class="price tac info-price">
                                                @if($data->price < $data->price_old)
                                                <p class="price_old">{{number_format($data->price_old)}} VNĐ</p>
                                                @endif
                                                <p class="price_news">Giá: {{number_format($data->price)}} VNĐ</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                            
                    </div>
                    
                </div>                       
                <div class="read-more"><a href="" title="">Xem tất cả <span><i class="fa fa-arrow-right"></i></span></a></div>                    
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="box-home" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="box-cate">
                <div class="top-box">
                    <ul class="cate-child nav nav-tabs">
                        
                        <li  class="active"><a data-toggle="tab" href="#news1" aria-expanded="true">Tin tức</a></li>
                        <li><a data-toggle="tab" href="#news2" aria-expanded="true">Khuyến mại</a></li>
                        <li><a data-toggle="tab" href="#news3" aria-expanded="true">Tin sản phẩm</a></li>
                        <li><a data-toggle="tab" href="#news4" aria-expanded="true">Dịch vụ</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="news1">
                            <div class="list-product-item">
                                <div class="">
                                    <div class="item col-md-3">
                                        <a href="" title=""><img src="images/p1.jpg" alt="">
                                        </a>
                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="" title="">Tin tức 1</a></p>
                                            <div class="price tac info-price">
                                                <p class="price_old">2 000 000 VNĐ</p>
                                                <p class="price_news">Giá: 150000</p>
                                            </div>
                                        </div>
                                    </div>
                                                                            
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="news2">
                            <div class="list-product-item">
                                <div class="">
                                    <div class="item col-md-3">
                                        <a href="" title=""><img src="images/p1.jpg" alt="">
                                        </a>
                                        
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="" title="">Sản phẩm  1</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: 150000</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-3">
                                        <a href="" title=""><img src="images/p3.jpg" alt="">
                                        </a>
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="" title="">Sản phẩm  2</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: 150000</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-3">
                                        <a href="" title=""><img src="images/p2.jpg" alt="">
                                        </a>
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="" title="">Sản phẩm  3</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: 150000</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item col-md-3">
                                        <a href="" title=""><img src="images/p1.jpg" alt="">
                                        </a>
                                        <div class="footer-cate">
                                            <p class="name_product"><a href="" title="">Sản phẩm 4</a></p>
                                            <div class="price tac">
                                                <span class="price_news">Giá: 150000</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="news3">
                            nio dung tab3
                        </div>
                        <div class="tab-pane fade" id="news4">
                            nio dung tab4
                        </div>
                    </div>
                    
                </div>                       
                <div class="read-more"><a href="" title="">Xem tất cả <span><i class="fa fa-arrow-right"></i></span></a></div>                    
            </div>
        </div>
    </div>
</div>

@endsection
