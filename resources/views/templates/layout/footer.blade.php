<?php
    $setting = Cache::get('setting');
    $chinhanh = DB::table('chinhanh')->get();
?>
<footer>
    <div class="container">
        <div class="row r1"> 
            <div class="col-md-4 col-xs-12">
                <a href="{{url('')}}" title=""><img src="{{asset('upload/hinhanh/'.$setting->photo_footer)}}" alt=""></a>
                <!-- <p class="company-name">{{$setting->company}}</p> -->
                <!-- <p class="info-company"><i class="fa fa-map-marker"></i> {{$setting->address}}</p> -->
                <div class="chinhnanh">
                    @foreach($chinhanh as $cn)
                    <p>{{$cn->name}}: {{$cn->address}}</p>
                    @endforeach
                </div>
                <p class="info-company"><i class="fa fa-phone"></i> {{$setting->phone}} - {{$setting->hotline}}</p>
            </div>
            <div class="col-md-4 col-xs-12 news-letter">
                <p class="title-newsletter">Để lại email nhận tin khuyến mại</p>
                <form action="{{route('postNewsletter')}}" method="post" accept-charset="utf-8">
                    {{csrf_field()}}
                    <input type="text" placeholder="Nhập email" class="form-control" required="" name="txtEmail">
                    <button type="submit" class="btn-newsletter">Gửi</button>
                </form>
                <div class="social">
                    <a href="{{$setting->facebook}}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a href="{{$setting->google}}"  target="_blank" title="Google"><i class="fa fa-google"></i></a>
                    <a href="{{$setting->twitter}}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="{{$setting->skype}}" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 news-letter" style="margin-bottom: 20px;">
                <p class="title-newsletter">Fanpage</p>
                <div class="fb-page" data-href="{{$setting->facebook}}" data-tabs="timeline" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{$setting->facebook}}" class="fb-xfbml-parse-ignore"><a href="{{$setting->facebook}}">Facebook</a></blockquote></div>
            </div>           
        </div>
        <p style="text-align: center; margin-top: 10px;">Designed by Hungthinhads.com</p>
    </div>
</footer>