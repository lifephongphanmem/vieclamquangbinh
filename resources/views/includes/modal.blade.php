                                    <!--Model tạo kỳ điều tra mới-->
                                    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true"
                                        class="modal fade">
                                        <form id="frmDelete" method="POST" action="{{ '/dieutra/TaoMoi' }}"
                                            accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-primary">
                                                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý
                                                            tạo mới kỳ điều tra</h4>
                                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                            class="close">&times;</button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-default">Hủy thao tác</button>
                                                        <button type="submit" class="btn btn-primary">Đồng
                                                            ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- modal in báo cáo xã -->
                                    <form method="POST" action="{{ '/dieutra/intonghop' }}" accept-charset="UTF-8"
                                        id="frm_modify_xa" target="_blank">
                                        @csrf
                                        <div id="modify-modal-xa" tabindex="-1" class="modal fade kt_select2_modal"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-primary">
                                                        <h4 id="modal-header-primary-label" class="modal-title">In báo
                                                            cáo</h4>
                                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                            class="close">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-lg-12 mb-2">
                                                            <label class="control-label">Đơn vị</label>

                                                            <select name="madv" id=""
                                                                class="form-control select2basic" style="width:100%">
                                                                <option value="">Tất cả</option>
                                                                @foreach ($baocao['m_xa'] as $key => $ct)
                                                                    <option
                                                                        value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                                                        {{ $ct->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="control-label">Kỳ điều tra</label>
                                                            <select name="kydieutra" id=""
                                                                class="form-control select2basic" style="width:100%">
                                                                @foreach ($baocao['a_kydieutra'] as $key => $ct)
                                                                    <option value="{{ $key }}">
                                                                        {{ $ct }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12 mt-3">
                                                            <label class="control-label">Chọn tùy biến</label>
                                                        </div>
                                                        <div class="row mt-1 ml-5" id="1stld">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="gioitinh_xa" name=gender value="gender">
                                                                <label class="form-check-label" for="gioitinh_xa">Giới
                                                                    tính</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="tthdkt" id="tthdkt_xa" value="tthdkt">
                                                                <label class="form-check-label" for="tthdkt_xa">Tình
                                                                    trạng HĐKT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="dtut" id="dtut_xa" value="dtut">
                                                                <label class="form-check-label" for="dtut_xa">Đối tượng
                                                                    UT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trinhdogdpt" id="trinhdogdpt_xa"
                                                                    value="trinhdogdpt">
                                                                <label class="form-check-label"
                                                                    for="trinhdogdpt_xa">Trình độ GDPT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trinhdocmkt" id="trinhdocmkt_xa"
                                                                    value="trinhdocmkt">
                                                                <label class="form-check-label"
                                                                    for="trinhdocmkt_xa">Trình độ CMKT</label>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-10 d-none mt-2" id='gt_xa'>
                                                                <label class="control-label">Giới tính</label>
                                                                <select name="gioitinh" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Nữ">Nữ</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='hdkt_xa'>
                                                                <label class="control-label">Tình trạng HĐKT</label>
                                                                <select name="tinhtranghdkt" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['dmtinhtranghdkt'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentgkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='ut_xa'>
                                                                <label class="control-label">Đối tượng UT</label>
                                                                <select name="uutien" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['dmuutien'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tendoituong }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='gdpt_xa'>
                                                                <label class="control-label">Trình độ DGPT</label>
                                                                <select name="trinhdogiaoduc" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['trinhdoGDPT'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tengdpt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='cmkt_xa'>
                                                                <label class="control-label">Trình độ CMKT</label>
                                                                <select name="chuyenmonkythuat" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['trinhdocmkt'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentdkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-default">Hủy thao tác</button>
                                                        <button type="submit" id="submit" name="submit"
                                                            value="submit" class="btn btn-primary">Đồng
                                                            ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- modal in bao cáo huyện -->
                                    <form method="POST" action="{{ '/dieutra/inbaocaohuyen' }}"
                                        accept-charset="UTF-8" id="frm_modify_huyen" target="_blank">
                                        @csrf
                                        <div id="modify-modal-huyen" tabindex="-1"
                                            class="modal fade kt_select2_modal" style="display: none;"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-primary">
                                                        <h4 id="modal-header-primary-label" class="modal-title">In báo
                                                            cáo</h4>
                                                        <button type="button" data-dismiss="modal"
                                                            aria-hidden="true" class="close">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-lg-12 mb-2">
                                                            <label class="control-label">Đơn vị</label>
                                                            <select name="madv" id=""
                                                                class="form-control select2basic" style="width:100%">
                                                                <option value="">Tất cả</option>
                                                                @foreach ($baocao['m_huyen'] as $key => $ct)
                                                                    <option value="{{ $ct->madv }}"
                                                                        {{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                                                        {{ $ct->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label class="control-label">Kỳ điều tra</label>
                                                            <select name="kydieutra" id=""
                                                                class="form-control select2basic" style="width:100%">
                                                                @foreach ($baocao['a_kydieutra'] as $key => $ct)
                                                                    <option value="{{ $key }}">
                                                                        {{ $ct }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-lg-12 mt-3">
                                                            <label class="control-label">Chọn tùy biến</label>
                                                        </div>
                                                        <div class="row mt-1 ml-5" id="1stld">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="gioitinh_huyen" name=gender value="gender">
                                                                <label class="form-check-label"
                                                                    for="gioitinh_huyen">Giới tính</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="tthdkt" id="tthdkt_huyen" value="tthdkt">
                                                                <label class="form-check-label"
                                                                    for="tthdkt_huyen">Tình trạng HĐKT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="dtut" id="dtut_huyen" value="dtut">
                                                                <label class="form-check-label" for="dtut_huyen">Đối
                                                                    tượng UT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trinhdogdpt" id="trinhdogdpt_huyen"
                                                                    value="trinhdogdpt">
                                                                <label class="form-check-label"
                                                                    for="trinhdogdpt_huyen">Trình độ GDPT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trinhdocmkt" id="trinhdocmkt_huyen"
                                                                    value="trinhdocmkt">
                                                                <label class="form-check-label"
                                                                    for="trinhdocmkt_huyen">Trình độ CMKT</label>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-10 d-none mt-2" id='gt_huyen'>
                                                                <label class="control-label">Giới tính</label>
                                                                <select name="gioitinh" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Nữ">Nữ</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='hdkt_huyen'>
                                                                <label class="control-label">Tình trạng HĐKT</label>
                                                                <select name="tinhtranghdkt" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['dmtinhtranghdkt'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentgkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='ut_huyen'>
                                                                <label class="control-label">Đối tượng UT</label>
                                                                <select name="uutien" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['dmuutien'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tendoituong }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='gdpt_huyen'>
                                                                <label class="control-label">Trình độ DGPT</label>
                                                                <select name="trinhdogiaoduc" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['trinhdoGDPT'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tengdpt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='cmkt_huyen'>
                                                                <label class="control-label">Trình độ CMKT</label>
                                                                <select name="chuyenmonkythuat" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['trinhdocmkt'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentdkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-default">Hủy thao tác</button>
                                                        <button type="submit" id="submit" name="submit"
                                                            value="submit" class="btn btn-primary">Đồng
                                                            ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                        <!-- modal in báo cáo tỉnh -->
    <form method="POST" action="{{ '/dieutra/inbaocaotinh' }}" accept-charset="UTF-8" id="frm_modify_tinh" target="_blank">
        @csrf
        <div id="modify-modal-tinh" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic" style="width:100%">
                                @foreach ($baocao['a_kydieutra'] as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label class="control-label mt-3">Chọn tùy biến</label>
                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="gioitinh" name=gender value="gender">
                                <label class="form-check-label" for="gioitinh">Giới tính</label>
                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="tthdkt" id="tthdkt"
                                    value="tthdkt">
                                <label class="form-check-label" for="tthdkt">Tình trạng HĐKT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="dtut" id="dtut"
                                    value="dtut">
                                <label class="form-check-label" for="dtut">Đối tượng UT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="trinhdogdpt" id="trinhdogdpt"
                                    value="trinhdogdpt">
                                <label class="form-check-label" for="trinhdogdpt">Trình độ GDPT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="trinhdocmkt" id="trinhdocmkt"
                                    value="trinhdocmkt">
                                <label class="form-check-label" for="trinhdocmkt">Trình độ CMKT</label>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-10 d-none mt-2" id='gt'>
                                <label class="control-label">Giới tính</label>
                                <select name="gioitinh" id="" class="form-control select2basic" style="width:100%">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='hdkt'>
                                <label class="control-label">Tình trạng HĐKT</label>
                                <select name="tinhtranghdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['dmtinhtranghdkt'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='ut'>
                                <label class="control-label">Đối tượng UT</label>
                                <select name="uutien" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['dmuutien'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tendoituong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='gdpt'>
                                <label class="control-label">Trình độ DGPT</label>
                                <select name="trinhdogiaoduc" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['trinhdoGDPT'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tengdpt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='cmkt'>
                                <label class="control-label">Trình độ CMKT</label>
                                <select name="chuyenmonkythuat" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['trinhdocmkt'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentdkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                        ý</button>
                </div>
            </div>
        </div>
        </div>
    </form>

                                    <!--Model thị trường cung lao động-->
                                    <div id="thitruongld-cung-modal" tabindex="-1" role="dialog" aria-hidden="true"
                                        class="modal fade">
                                        <form id="frmDanhsach" method="POST"
                                            action="{{ '/baocao_tonghop/thongtincunglaodong' }}"
                                            accept-charset="UTF-8" enctype="multipart/form-data" target='_blank'>
                                            @csrf
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-primary">
                                                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin thị trường cung lao động
                                                        </h4>
                                                        <button type="button" data-dismiss="modal"
                                                            aria-hidden="true" class="close">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-lg-12 mb-2">
                                                            <label class="control-label">Năm điều tra</label>
                                                            <select class="form-control select2basic" id="nam"
                                                                name="nam" style="width:100%">
                                                                <?php $nam_start = date('Y') - 5;
                                                                $nam_stop = date('Y'); ?>
                                                                @for ($i = $nam_start; $i <= $nam_stop; $i++)
                                                                    <option value="{{ $i }}"
                                                                        {{ $i == $nam_stop ? 'selected' : '' }}>Năm
                                                                        {{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-12 mb-2">
                                                            <label class="control-label">Loại báo cáo</label>
                                                            <select class="form-control select2basic" id="loaibaocao"
                                                                name="loaibaocao" style="width:100%">
                                                                <option value="2">2 năm</option>
                                                                @if (in_array(session('admin')->capdo,['T','H']))
                                                                <option value="3">3 năm</option>
                                                                <option value="4">4 năm</option>
                                                                <option value="5">5 năm</option>
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-default">Hủy thao tác</button>
                                                        <button type="submit" id="submit" name="submit"
                                                            value="submit" class="btn btn-primary">Đồng
                                                            ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                        <!--Model thị trường lao động-->
    <div id="thitruongld-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmDanhsach" method="GET" action="{{ '/bao_cao_tong_hop/thong_tin_thi_truong_ld' }}"
            accept-charset="UTF-8" enctype="multipart/form-data" target='_blank'>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Mẫu 04</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Năm điều tra</label>
                            <select class="form-control select2basic" id="nam" name="nam" style="width:100%">
                                <?php $nam_start = date('Y') - 5;
                                $nam_stop = date('Y'); ?>
                                @for ($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{ $i }}" {{ $i == $nam_stop ? 'selected' : '' }}>Năm
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

                                        <!-- modal tổng hợp -->
    <form method="POST" action="{{ '/baocao_tonghop/tonghop' }}" accept-charset="UTF-8" id="frm_modify_tinh" target="_blank">
        @csrf
        <div id="modify-modal-tonghop" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Tổng hợp</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label class="control-label" style="font-weight: bold">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic" style="width:100%">
                                @foreach ($baocao['a_kydieutra'] as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label class="control-label mt-3" style="font-weight: bold">Chọn tùy biến</label>
                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" id="gioitinh_th" name=gender value="gender">
                                <label class="form-check-label" for="gioitinh_th">Giới tính</label>
                            </div>
                            {{-- <div class="form-check form-check-inline"style="width:20%">
                                <input class="form-check-input" type="checkbox" id="dotuoi" name=dotuoi value="dotuoi">
                                <label class="form-check-label" for="gioitinh">Độ tuổi</label>
                            </div> --}}
                            <div class=" col-md-4">
                                <input class="form-check-input" type="checkbox" name="tthdkt" id="tthdkt_th"
                                    value="tthdkt">
                                <label class="form-check-label" for="tthdkt_th">Tình trạng HĐKT</label>

                            </div>
                            <div class=" col-md-4">
                                <input class="form-check-input" type="checkbox" name="dtut" id="dtut_th"
                                    value="dtut">
                                <label class="form-check-label" for="dtut_th">Đối tượng UT</label>

                            </div>
                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" name="trinhdogdpt" id="trinhdogdpt_th"
                                    value="trinhdogdpt">
                                <label class="form-check-label" for="trinhdogdpt_th">Trình độ GDPT</label>

                            </div>
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" name="trinhdocmkt" id="trinhdocmkt_th"
                                    value="trinhdocmkt">
                                <label class="form-check-label" for="trinhdocmkt_th">Trình độ CMKT</label>

                            </div>
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" name="loaihinh" id="loaihinh"
                                    value="loaihinh">
                                <label class="form-check-label" for="loaihinh">Loại hình nơi làm việc</label>
                            </div>

                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" name="thatnghiep_th" id="thatnghiep"
                                    value="thatnghiep">
                                <label class="form-check-label" for="thatnghiep">Thất nghiệp</label>
                            </div>
                            <div class="col-md-4">
                                <input class="form-check-input" type="checkbox" name="ktghdkt" id="ktghdkt"
                                    value="ktghdkt">
                                <label class="form-check-label" for="ktghdkt">Không tham gia HĐKT</label>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="col-lg-10 d-none mt-2" id='gt_th'>
                                <label class="control-label" style="font-weight: bold">Giới tính</label>
                                <select name="gioitinh" id="" class="form-control select2basic" style="width:100%">
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            {{-- <div class="col-lg-10 d-none mt-2" id='tuoi'>
                                <label class="control-label" style="font-weight: bold">Độ tuổi</label>
                                <div>
                                    <label class="mt-3">Từ&nbsp;</label> <input type="text" name='tuoitu' class="form-control" style="width:15%;text-align:center;display:inline"> &nbsp; Đến &nbsp; <input type="text" name="tuoiden" class="form-control" style="width:15%;text-align:center;display:inline">
                                </div>
                               
                            </div> --}}
                            <div class="col-lg-10 d-none mt-2" id='hdkt_th'>
                                <label class="control-label" style="font-weight: bold">Tình trạng HĐKT</label>
                                <select name="tinhtranghdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['dmtinhtranghdkt'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='ut_th'>
                                <label class="control-label" style="font-weight: bold">Đối tượng UT</label>
                                <select name="uutien" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['dmuutien'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tendoituong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='gdpt_th'>
                                <label class="control-label" style="font-weight: bold">Trình độ DGPT</label>
                                <select name="trinhdogiaoduc" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['trinhdoGDPT'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tengdpt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='cmkt_th'>
                                <label class="control-label" style="font-weight: bold">Trình độ CMKT</label>
                                <select name="chuyenmonkythuat" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['trinhdocmkt'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentdkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='lh'>
                                <label class="control-label" style="font-weight: bold">Loại hình nơi làm việc</label>
                                <select name="loaihinhnoilamviec" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['loaihinh'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tenlhkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='thatn'>
                                <label class="control-label" style="font-weight: bold">Thất nghiệp</label>
                                <select name="thatnghiep" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['a_thatnghiep'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgktct }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-lg-10 d-none mt-2" id='khongthamgiahdkt'>
                                <label class="control-label" style="font-weight: bold">Không tham gia HĐKT</label>
                                <select name="khongthamgiahdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    @foreach ($baocao['a_khongthamgia'] as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgktct }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>

                    </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                        ý</button>
                </div>
            </div>
        </div>
        </div>
    </form>

            <!-- modal in danh sách biến động xã-->
            <form method="POST" action="{{ '/biendong/danhsach' }}" accept-charset="UTF-8" id="frm_modify_biendong_xa" target="_blank">
                @csrf
                <div id="modify-modal-biendong-xa" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <h4 id="modal-header-primary-label" class="modal-title">In danh sách</h4>
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <label class="control-label">Kỳ điều tra</label>
                                    <select name="kydieutra" id="" class="form-control select2basic" style="width:100%">
                                        @foreach ($baocao['a_kydieutra'] as $key => $ct)
                                            <option value="{{ $key }}">{{ $ct }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-2 mt-2">
                                    <label class="control-label">Đơn vị</label>
                                    <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                        <option value="all">Tất cả</option>
                                        @if (session('admin')->capdo == 'T')
                                        @foreach ($baocao['m_huyen'] as $key => $ct)
                                        <option
                                            value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                            {{ $ct->name }}</option>
                                    @endforeach
                                        @else
                                        @foreach ($baocao['m_xa'] as $key => $ct)
                                        <option
                                            value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                            {{ $ct->name }}</option>
                                    @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label class="control-label mt-3">Biến động</label>
                                    <select name="biendong" id="" class="form-control select2basic" style="width:100%">
                                        <option value="all">Tất cả</option>
                                        <option value="1">Báo tăng</option>
                                        <option value="3">Cập nhật thông tin</option>
                                        <option value="2">Báo giảm</option>
                                    </select>
                                </div>
        
                            </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                            <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                                ý</button>
                        </div>
                    </div>
                </div>
                </div>
            </form>

                                    <script>
                                        $('#gioitinh').on('click', function() {
                                            var check = $('#gioitinh').is(':checked');
                                            if (check) {
                                                $('#gt').removeClass('d-none');
                                            } else {
                                                $('#gt').addClass('d-none');
                                            }
                                        });

                                        $('#tthdkt').on('click', function() {
                                            var check = $('#tthdkt').is(':checked');
                                            if (check) {
                                                $('#hdkt').removeClass('d-none');
                                            } else {
                                                $('#hdkt').addClass('d-none');
                                            }
                                        });
                                        $('#dtut').on('click', function() {
                                            var check = $('#dtut').is(':checked');
                                            if (check) {
                                                $('#ut').removeClass('d-none');
                                            } else {
                                                $('#ut').addClass('d-none');
                                            }
                                        });
                                        $('#trinhdogdpt').on('click', function() {
                                            var check = $('#trinhdogdpt').is(':checked');
                                            if (check) {
                                                $('#gdpt').removeClass('d-none');
                                            } else {
                                                $('#gdpt').addClass('d-none');
                                            }
                                        });
                                        $('#trinhdocmkt').on('click', function() {
                                            var check = $('#trinhdocmkt').is(':checked');
                                            if (check) {
                                                $('#cmkt').removeClass('d-none');
                                            } else {
                                                $('#cmkt').addClass('d-none');
                                            }
                                        });
                                        //Xã
                                        $('#gioitinh_xa').on('click', function() {
                                            var check = $('#gioitinh_xa').is(':checked');
                                            if (check) {
                                                $('#gt_xa').removeClass('d-none');
                                            } else {
                                                $('#gt_xa').addClass('d-none');
                                            }
                                        });

                                        $('#tthdkt_xa').on('click', function() {
                                            var check = $('#tthdkt_xa').is(':checked');
                                            if (check) {
                                                $('#hdkt_xa').removeClass('d-none');
                                            } else {
                                                $('#hdkt_xa').addClass('d-none');
                                            }
                                        });
                                        $('#dtut_xa').on('click', function() {
                                            var check = $('#dtut_xa').is(':checked');
                                            if (check) {
                                                $('#ut_xa').removeClass('d-none');
                                            } else {
                                                $('#ut_xa').addClass('d-none');
                                            }
                                        });
                                        $('#trinhdogdpt_xa').on('click', function() {
                                            var check = $('#trinhdogdpt_xa').is(':checked');
                                            if (check) {
                                                $('#gdpt_xa').removeClass('d-none');
                                            } else {
                                                $('#gdpt_xa').addClass('d-none');
                                            }
                                        });
                                        $('#trinhdocmkt_xa').on('click', function() {
                                            var check = $('#trinhdocmkt_xa').is(':checked');
                                            if (check) {
                                                $('#cmkt_xa').removeClass('d-none');
                                            } else {
                                                $('#cmkt_xa').addClass('d-none');
                                            }
                                        })

                                        //Huyen
                                        $('#gioitinh_huyen').on('click', function() {
                                            var check = $('#gioitinh_huyen').is(':checked');
                                            if (check) {
                                                $('#gt_huyen').removeClass('d-none');
                                            } else {
                                                $('#gt_huyen').addClass('d-none');
                                            }
                                        });

                                        $('#tthdkt_huyen').on('click', function() {
                                            var check = $('#tthdkt_huyen').is(':checked');
                                            if (check) {
                                                $('#hdkt_huyen').removeClass('d-none');
                                            } else {
                                                $('#hdkt_huyen').addClass('d-none');
                                            }
                                        });
                                        $('#dtut_huyen').on('click', function() {
                                            var check = $('#dtut_huyen').is(':checked');
                                            if (check) {
                                                $('#ut_huyen').removeClass('d-none');
                                            } else {
                                                $('#ut_huyen').addClass('d-none');
                                            }
                                        });
                                        $('#trinhdogdpt_huyen').on('click', function() {
                                            var check = $('#trinhdogdpt_huyen').is(':checked');
                                            if (check) {
                                                $('#gdpt_huyen').removeClass('d-none');
                                            } else {
                                                $('#gdpt_huyen').addClass('d-none');
                                            }
                                        });
                                        $('#trinhdocmkt_huyen').on('click', function() {
                                            var check = $('#trinhdocmkt_huyen').is(':checked');
                                            if (check) {
                                                $('#cmkt_huyen').removeClass('d-none');
                                            } else {
                                                $('#cmkt_huyen').addClass('d-none');
                                            }
                                        })
                                    </script>
