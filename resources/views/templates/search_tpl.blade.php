@extends('index')
@section('content')
<div class="crumb">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb breadcrumbx">
                <li>
                    <a href="{{url('')}}">Trang chủ</a>
                </li>
                <li class="active"><a href="">Tìm kiếm</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="content-cate-product">
    <div class="container">
        <!-- <h2 class="title_home">Sản phẩm</h2>
        <div class="dongke"><span></span></div> -->
        <div class="box-product-home">
            
            <div class="col-md-12 pdl-0 right">
                <div class="box-cate1">
                    <!-- <div class="top-head">
                        <div class="pull-left"><span class="name-cate">Chè loại 1</span></div>
                    </div> -->
                    <div class="list-item-product">
                        @foreach($data as $item)
                        <div class="col-md-3 mb-30">
                            <a href="{{url('san-pham/'.$item->alias.'.html')}}" title="{{$item->name}}">
                                <img src="{{asset('upload/product/'.$item->photo)}}" alt="">
                                <p class="name_product"><a href="{{url('san-pham/'.$item->alias.'.html')}}" title="">{{$item->name}}</a></p>
                            </a>
                            <div class="price tac">
                                @if($item->price_old > $item->price)
                                <span class="price_old">{{number_format($item->price_old)}} vnđ</span>
                                @endif
                                <span class="price_news">{{number_format($item->price)}} vnđ</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
