<style>
    .filer-left {
        font-size: 14px;
    }

    .filer-left .check {
        margin: -5px;
    }

    .filer-left input {
        border-radius: 50%;
    }
</style>
<div class=" col-md-3 filer-left">
    <div class="left_filter bg_w">
        @if (isset($diadiem))
            <div class="group_filter">
                <div class="title_filter">
                    <h3>Địa điểm <i class="fa fa-angle-down" aria-hidden="true"></i></h3>
                </div>
                <div class="content_select">
                    <div class="awe-check">

                        <div href="/tat-ca-viec-lam.html?a=1">
                            <input name="a" type="checkbox" value="1">
                            <span title="radio">Việt Nam</span>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <div class="group_filter">
            <div class="title_filter">
                <h3>Mức lương</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">

                    <div style="margin-bottom: 10xp">
                        <input name="luong" type="checkbox" value="1" class="ais-checkbox luong">
                        <span title="radio">&lt; 5 Triệu</span>
                    </div>
                    <div>
                        <input name="luong" type="checkbox" value="2" class="ais-checkbox luong">
                        <span title="radio">5 - 10 Triệu</span>
                    </div>
                    <div>
                        <input name="luong" type="checkbox" value="3" class="ais-checkbox luong">
                        <span title="radio">10 - 15 Triệu</span>
                    </div>
                    <div>
                        <input name="luong" type="checkbox" value="4" class="ais-checkbox luong">
                        <span title="radio">15 - 20 Triệu</span>
                    </div>
                    <div>
                        <input name="luong" type="checkbox" value="5" class="ais-checkbox luong">
                        <span title="radio">20 - 30 Triệu</span>
                    </div>
                    <div>
                        <input name="luong" type="checkbox" value="6" class="ais-checkbox luong">
                        <span title="radio">30 - 40 Triệu</span>
                    </div>
                    <div>
                        <input name="luong" type="checkbox" value="7" class="ais-checkbox luong">
                        <span title="radio"> > 40 Triệu</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="group_filter">
            <div class="title_filter">
                <h3>Ngành nghề</h3>
            </div>
            <div class="content_select">
                <div class="awe-check" >
                    <div class="check">
                        <input name="c" type="checkbox"  value="2">
                        <span class="text-clip" title="radio">Kinh doanh</span>
                    </div>
                    <div class="check" >
                        <input name="c" type="checkbox" value="7">
                        <span class="text-clip" title="radio">Kỹ thuật</span>
                    </div>

                </div>
            </div>
        </div> --}}

        <div class="group_filter">
            <div class="title_filter">
                <h3>Cấp bậc</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">
                    @foreach ($capbac as $item)
                        <div>
                            <input name="capbac" type="checkbox" class="ais-checkbox capbac"
                                value="{{ $item->madm }}">
                            <span class="text-clip" title="radio">{{ $item->tendm }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="group_filter">
            <div class="title_filter">
                <h3>Hình thức làm việc</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">
                    <div>
                        <input name="hinhthuclv" type="checkbox" class="ais-checkbox hinhthuclv" value="Toàn thời gian">
                        <span class="text-clip" title="radio">Toàn thời gian</span>
                    </div>
                    <div>
                        <input name="hinhthuclv" type="checkbox" class="ais-checkbox hinhthuclv" value="Bán thời gian">
                        <span class="text-clip" title="radio">Bán thời gian</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="group_filter">
            <div class="title_filter">
                <h3>Kinh nghiệm</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">
                    <div>
                        <input name="kinhnghiem" type="checkbox" class="ais-checkbox kinhnghiem" value="1">
                        <span class="text-clip" title="radio">Tối thiểu 1 năm</span>
                    </div>
                    <div>
                        <input name="kinhnghiem" type="checkbox" class="ais-checkbox kinhnghiem" value="2">
                        <span class="text-clip" title="radio">Tối thiểu 2 năm</span>
                    </div>
                    <div>
                        <input name="kinhnghiem" type="checkbox" class="ais-checkbox kinhnghiem" value="3">
                        <span class="text-clip" title="radio">Tối thiểu 3 năm</span>
                    </div>
                    <div>
                        <input name="kinhnghiem" type="checkbox" class="ais-checkbox kinhnghiem" value="4">
                        <span class="text-clip" title="radio">Tối thiểu 4 năm</span>
                    </div>
                    <div>
                        <input name="kinhnghiem" type="checkbox" class="ais-checkbox kinhnghiem" value="5">
                        <span class="text-clip" title="radio">Tối thiểu 5 năm</span>
                    </div>
                    <div>
                        <input name="kinhnghiem" type="checkbox" class="ais-checkbox kinhnghiem" value="6">
                        <span class="text-clip" title="radio">Tối thiểu 6 năm</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="group_filter">
            <div class="title_filter">
                <h3>Bằng cấp, học vấn</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">
                    @foreach ($dmtrinhdokythuat as $item)
                        <div href="/danh-sach-ung-vien.html?kn=1">
                            <input name="trinhdocmkt" type="checkbox" class="ais-checkbox trinhdocmkt"
                                value="{{ $item->madmtdkt }}">
                            <span class="text-clip" title="radio">{{ $item->tentdkt }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('.luong').change(function() {
        if (this.checked == true) {
            var luong = document.getElementsByClassName('luong');
            for (let i = 0; i < luong.length; i++) {
                if (this != luong[i]) {
                    luong[i].checked = false;
                }
            }
        }
    })

    $('input').change(function() {

        var luong = [];
        var luong_check = document.getElementsByClassName("luong");
        for (var i = 0; i < luong_check.length; i++) {
            if (luong_check[i].checked == true) {
                luong.push(luong_check[i].value);
            }
        }

        var capbac = [];
        var capbac_check = document.getElementsByClassName("capbac");
        for (var i = 0; i < capbac_check.length; i++) {
            if (capbac_check[i].checked == true) {
                capbac.push(capbac_check[i].value);
            }
        }

        var hinhthuclv = [];
        var hinhthuclv_check = document.getElementsByClassName("hinhthuclv");
        for (var i = 0; i < hinhthuclv_check.length; i++) {
            if (hinhthuclv_check[i].checked == true) {
                hinhthuclv.push(hinhthuclv_check[i].value);
            }
        }

        var kinhnghiem = [];
        var kinhnghiem_check = document.getElementsByClassName("kinhnghiem");
        for (var i = 0; i < kinhnghiem_check.length; i++) {
            if (kinhnghiem_check[i].checked == true) {
                kinhnghiem.push(kinhnghiem_check[i].value);
            }
        }

        var trinhdocmkt = [];
        var trinhdocmkt_check = document.getElementsByClassName("trinhdocmkt");
        for (var i = 0; i < trinhdocmkt_check.length; i++) {
            if (trinhdocmkt_check[i].checked == true) {
                trinhdocmkt.push(trinhdocmkt_check[i].value);
            }
        }

        $.ajax({
            url: '/page/ungvien/filter',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                luong: luong,
                capbac: capbac,
                hinhthuclv: hinhthuclv,
                kinhnghiem: kinhnghiem,
                trinhdocmkt: trinhdocmkt,
            },
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#list-item').html(data.content);
            }
        })
    });
</script>
