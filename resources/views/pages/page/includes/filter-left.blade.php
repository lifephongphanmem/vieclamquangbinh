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

                    <div  style="margin-bottom: 10xp">
                        <input name="p" type="checkbox" value="1">
                        <span title="radio">&lt; 5 Triệu</span>
                    </div>
                    <div >
                        <input name="p" type="checkbox" value="2">
                        <span title="radio">5 - 10 Triệu</span>
                    </div>
                    <div>
                        <input name="p" type="checkbox" value="2">
                        <span title="radio">10 - 15 Triệu</span>
                    </div>
                    <div >
                        <input name="p" type="checkbox" value="2">
                        <span title="radio">15 - 20 Triệu</span>
                    </div>
                    <div >
                        <input name="p" type="checkbox" value="2">
                        <span title="radio">20 - 30 Triệu</span>
                    </div>
                    <div >
                        <input name="p" type="checkbox" value="2">
                        <span title="radio">30 - 40 Triệu</span>
                    </div>
                    <div >
                        <input name="p" type="checkbox" value="2">
                        <span title="radio">>40 Triệu</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="group_filter">
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
        </div>

        <div class="group_filter">
            <div class="title_filter">
                <h3>Cấp bậc</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">
                    <div>
                        <input name="lv" type="checkbox" class="ais-checkbox" value="1">
                        <span class="text-clip" title="radio">Nhân viên</span>
                    </div><br>
                    <div>
                        <input name="lv" type="checkbox" class="ais-checkbox" value="2">
                        <span class="text-clip" title="radio">Trưởng phòng</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="group_filter">
            <div class="title_filter">
                <h3>Loại hình công việc</h3>
            </div>
            <div class="content_select">
                <div class="awe-check">
                    <div>
                        <input name="tw" type="checkbox" class="ais-checkbox" value="1">
                        <span class="text-clip" title="radio">Full time</span>
                    </div><br>
                    <div>
                        <input name="tw" type="checkbox" class="ais-checkbox" value="2">
                        <span class="text-clip" title="radio">Freelance</span>
                    </div><br>
                    <div>
                        <input name="tw" type="checkbox" class="ais-checkbox" value="3">
                        <span class="text-clip" title="radio">Part time</span>
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
                        <input name="ex" type="checkbox" class="ais-checkbox" value="1">
                        <span class="text-clip" title="radio">Tối thiểu 1 năm</span>
                    </div><br>
                    <div>
                        <input name="ex" type="checkbox" class="ais-checkbox" value="2">
                        <span class="text-clip" title="radio">Tối thiểu 2 năm</span>
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
                    <div href="/danh-sach-ung-vien.html?kn=1">
                        <input name="kn" type="checkbox" class="ais-checkbox" value="1">
                        <span class="text-clip" title="radio">Trên đại học</span>
                    </div><br>
                    <div href="/danh-sach-ung-vien.html?kn=2">
                        <input name="kn" type="checkbox" class="ais-checkbox" value="2">
                        <span class="text-clip" title="radio">Đại học</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

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
