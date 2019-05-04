<?php
    $setting = Cache::get('setting');
    $chinhanh = DB::table('chinhanh')->get();
?>
<footer>
    <div class="container">
        <div class="row">
           <div class="col-md-5 col-xs-4">
               <a href="{{url('')}}" title=""><img src="{{asset('upload/hinhanh/'.$setting->photo_footer)}}" class="img-footer" alt=""></a>
           </div>
           <div class="col-md-3"></div>
           <div class="col-md-4 col-xs-8 pdl-0">
               <div class="news-letter">
                   <form action="{{route('postNewsletter')}}" method="post" accept-charset="utf-8">
                    {{csrf_field()}}
                        <input type="text" name="txtEmail" required="" class="input-news-letter" placeholder="Địa chỉ email của bạn">
                        <button type="submit" class="btn-newsletter">Đăng ký</button>
                   </form>
               </div>
           </div>
           
        </div>
        <div class="row bottom-footer" style="margin-top: 20px; margin-bottom: 30px;">
            <div class="col-md-4 col-xs-12">
                <h4 class="f-title"><span>Liên hệ</span></h4>
                <p class="f-company-name"> - Showroom: Chăn, Ga, Gối, Đệm Cao Cấp Hà My</p>
                <p class="f-address">Địa chỉ: {{$setting->address}}</p>
                
                <p class="f-hotline"><a href="tel:0123654789" title="">Hotline: {{$setting->phone}} - {{$setting->hotline}}</a></p>
                <h4 class="f-title" style="margin-top: 20px;"><span>Hỗ trợ khách hàng</span></h4>
                <p>- Tư vấn viên</p>
                <p>- Chính sách bảo hành</p>
                <p>- FAQ câu hỏi thường gặp</p>
                <p>- Giao hàng & hoàn trả hàng</p>
            </div>
            <div class="col-md-4 col-xs-12">
                <h4 class="f-title"><span>Thanh toán</span></h4>
                <p><img src="{{ asset('public/images/thanhtoan.png')}}" alt=""></p>

                <h4 class="f-title" style="margin-top: 20px;"><span>Vận chuyển</span></h4>
                <p><img src="{{ asset('public/images/vanchuyen.png')}}" alt=""></p>
                <p>Bảo hộ lao động in hóa đơn vat</p>
            </div>
            <div class="col-md-4 col-xs-12">
                <h4 class="f-title"><span>Fan page</span></h4>
                 <div class="fb-page" data-href="https://www.facebook.com/demgagoicaocap/" data-tabs="timeline" data-width="320px" data-height="180px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/demgagoicaocap/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/demgagoicaocap/">Đệm Cao Cấp Hà My</a></blockquote></div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <p style="color: #fff; border-bottom: 1px solid #fff; padding-bottom: 20px;">MIỄN PHÍ GIAO HÀNG: Hóa đơn từ 3,357,000 VNĐ</p>
                <p style="text-align: center; color: #fff">Designed by hungthinhads.vn</p>
            </div>
        </div>
    </div>
</footer>