@extends('index')
@section('content')

<?php
$setting = Cache::get('setting');
$sliders = DB::table('slider')->where('status',1)->where('com','gioi-thieu')->orderBy('id','desc')->first();
?>

<div class="box-home">
    <div class="container">
        <div class="row">
            
            <div class="list-cate-product">
                @foreach($categories_home as $cate)
                <div class="box-cate">
                    <div class="top-box">
                        <div class="pull-left"><a href="{{url('san-pham/'.$cate->alias)}}" class="cate-name">{{$cate->name}}</a></div>
                        <div class="pull-right"><a href="{{url('san-pham/'.$cate->alias)}}" class="read-more">Xem tất cả <i class="fa fa-angle-right"></i></a></div>
                    </div>

                    <div class="list-product-item">
                        <div class="owl-carousel owl-theme owl-carousel-product owl-carousel-product1">
                            @foreach($cate->products() as $item)
                            <div class="item">
                                <a href="{{url('san-pham/'.$item->alias.'.html')}}" title="{{$item->name}}"><img src="{{asset('upload/product/'.$item->photo)}}" alt="{{$item->name}}">
                                </a>
                                @if($item->price_old > $item->price)
				                <div class="sale-of"><span>{{ round((100 -($item->price/ $item->price_old)*100)) }}%</span></div>
				                @endif
                                <div class="footer-cate">
                                    <p class="name_product"><a href="{{url('san-pham/'.$item->alias.'.html')}}" title="{{$item->name}}">{{$item->name}}</a></p>
                                    <div class="price tac">
		                                @if($item->price_old > $item->price)
		                                <span class="price_old">{{number_format($item->price_old)}} vnđ</span>
		                                @endif
		                                <span class="price_news">{{number_format($item->price)}} vnđ</span>
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
    </div>
</div>
<div class="box-home">
    <div class="container">
        <div class="row">
            <h2 class="title_home">Tin tức</h2>
            <div class="dongke"><span></span></div>
            <div class="list-news">
                @foreach($news as $n)
                <div class="col-md-3">
                    <a href="{{url('tin-tuc/'.$n->alias.'.html')}}"><img src="{{asset('upload/news/'.$n->photo)}}" alt="{{$n->name}}" class="img-avatar"></a>
                    <div class="name_product"><a href="{{url('tin-tuc/'.$n->alias.'.html')}}" title="{{$n->name}}">{{$n->name}}</a></div>
                    <div class="des-news">{!! $n->mota !!}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
