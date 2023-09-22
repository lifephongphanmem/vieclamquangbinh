<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5" >
                <div class="group">
                    <h3>Trung tâm Dịch vụ việc làm Quảng Bình</h3>
                    <ul>
                        <li>
                            <a>
                                <span><img src="{{ url('assets2/images/map.png')}}"></span> <strong>Địa chỉ:</strong> số 76 Đường Hữu Nghị -
                                TP. Đồng Hới - Quảng Bình. </a>
                        </li>
                        <li>
                            <a href="tel:0232.6250999">
                                <span><img src="{{ url('assets2/images/phone.png')}}"></span> <strong>Hotline:</strong> 0232.6250999 </a>
                        </li>
                        <li>
                            <a href="tel:0232.6250.999">
                                <span><img src="{{ url('assets2/images/hls.png')}}"></span> <strong>Tel:</strong> 0232.6250.999 </a>
                        </li>
                        <li>
                            <a href="tel:0232.6250919">
                                <span><img src="{{ url('assets2/images/fax.png')}}"></span> <strong>Fax</strong>: 0232.6250919 </a>
                        </li>
                        <li>
                            <a href="mailto:trungtamquangbinh@gmail.com">
                                <span><img src="{{ url('assets2/images/email.png')}}"></span><strong>Email:</strong>
                                trungtamquangbinh@gmail.com </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="group menu_f">
                    <h3>Về Trung tâm DVVL Quảng Bình</h3>
                    <ul>
                        <li><a href="/gioi-thieu.html">Về Trung tâm</a></li>
                        <li><a href="/lien-he.html">Liên hệ</a></li>
                        <li><a href="/thoa-thuan-su-dung-t7.html">Thỏa thuận sử dụng</a></li>
                        <li><a href="/quy-dinh-bao-mat-t8.html">Quy định bảo mật</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="group menu_f">
                    <div class="news-letter">
                        <h3>ĐĂNG KÝ NHẬN THÔNG TIN VIỆC LÀM:</h3>
                        <p>Xin vui lòng để lại địa chỉ email, chúng tôi sẽ cập nhật những tin tức mới nhất của Sàn việc
                            làm Quảng Bình tới quý khách. </p>
                        <form id="form-new-leter">
                            <input id="data-mail" name="email" type="email" value=""
                                placeholder="Nhập email của bạn">
                            <button type="submit" id="send-new-leter"><i class="fa fa-paper-plane"
                                    aria-hidden="true"></i> Gửi</button>
                                    
                        </form>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#form-new-leter').submit(function() {
                                var email = $(this).children('#data-mail').val();
                                var url = '/forms/newletter/create.html';

                                
                                if (email) {
                                    $.ajax({
                                        type: "POST",
                                        url: url,
                                        data: {
                                            email: email
                                        },
                                        success: function(responce) {
                                            alert(responce);
                                        },

                                        
                                    });
                                } else {
                                    alert('Vui lòng nhập email');
                                }
                                return false;
                            });
                        });
                    </script>
                    <div class="menu_lk">
                        <p>
                            <span>Liên kết:</span>
                            <a target="_blank" href="https://www.facebook.com/SGDVLquangbinh"><img
                                    src="{{ url('assets2/images/fb.png')}}"></a>
                            <a target="_blank" href="https://google.com"><img src="{{ url('assets2/images/zalo.png')}}"></a>
                            <a target="_blank" href="https://youtube.com"><img src="{{ url('assets2/images/y.png')}}"></a>
                            <a target="_blank" href="https://skype.com"><img src="{{ url('assets2/images/sk.png')}}"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
