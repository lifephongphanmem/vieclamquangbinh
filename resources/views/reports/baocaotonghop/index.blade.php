@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }
    </style>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();

        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card box">
                    <div class="card-header">
                        DANH SÁCH BÁO CÁO
                    </div>
                    <div class="card-body" style="height:500px">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol>
                                    @if (chkPhanQuyen('baocaoxa', 'phanquyen'))
                                        <li><a href="#" data-target="#modify-modal-xa" data-toggle="modal">Báo cáo
                                                thông tin cung lao động - xã (Mẫu 03)</a>
                                        </li>
                                    @endif
                                    @if (chkPhanQuyen('baocaohuyen', 'phanquyen'))
                                        <li><a href="#" data-target="#modify-modal-huyen" data-toggle="modal">Báo cáo
                                                thông tin cung lao động - Huyện (Mẫu 03)</a>
                                        </li>
                                    @endif
                                    @if (chkPhanQuyen('baocaotinh', 'phanquyen'))
                                        <li><a href="#" data-target="#modify-modal-tinh" data-toggle="modal">Báo cáo
                                                thông tin cung lao động - Tỉnh (Mẫu 03)</a>
                                        </li>
                                    @endif
                                    {{-- <li><a href="#" data-target="#tuybien-modal" data-toggle="modal">Báo cáo tùy biến</a> --}}
                                        {{-- <li>
                                            <a href="#" data-target="#modify-modal-biendong" data-toggle="modal">Danh sách biến động (Tỉnh) - Mẫu A3</a>
                                        </li> --}}
                                        @if (in_array(session('admin')->capdo,['H','X']))
                                        <li>
                                            <a href="#" data-target="#modify-modal-biendong-xa" data-toggle="modal">Danh sách biến động - Mẫu A3</a>
                                        </li>
                                        @endif
                                        @if (chkPhanQuyen('danhsachxa', 'phanquyen'))
                                    <li><a href="#" data-target="#danhsach-modal-confirm" data-toggle="modal">Lao động sắp tốt nghiệp PTTH</a>
                                    </li>
                                    <li><a href="#" data-target="#danhsach-modal-nhankhau" data-toggle="modal">Lao động đủ 15 tuổi</a>
                                    </li>
                                    @endif

                                </ol>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

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
                                @foreach ($a_kydieutra as $key => $ct)
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
                                    <option value="">Tất cả</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='hdkt'>
                                <label class="control-label">Tình trạng HĐKT</label>
                                <select name="tinhtranghdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmtinhtranghdkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='ut'>
                                <label class="control-label">Đối tượng UT</label>
                                <select name="uutien" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmuutien as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tendoituong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='gdpt'>
                                <label class="control-label">Trình độ DGPT</label>
                                <select name="trinhdogiaoduc" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdoGDPT as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tengdpt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='cmkt'>
                                <label class="control-label">Trình độ CMKT</label>
                                <select name="chuyenmonkythuat" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdocmkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentdkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                {{-- </div> --}}
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                        ý</button>
                </div>
            </div>
        </div>
        </div>
    </form>

    <!-- modal in báo cáo xã -->
    <form method="POST" action="{{ '/dieutra/intonghop' }}" accept-charset="UTF-8" id="frm_modify_xa"
        target="_blank">
        @csrf
        <div id="modify-modal-xa" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Đơn vị</label>
                            {{-- {!! Form::select('tinhtrangvl', setArray($a_tinhtrangvl,'Tất cả',null), ['id' => 'tinhtrangvl', 'class' => 'form-control select2basic']) !!} --}}
                            <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                <option value="">Tất cả</option>
                                @foreach ($m_xa as $key => $ct)
                                    <option
                                        value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name='math' id='math'> --}}
                        </div>
                        <div class="col-lg-12">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic"
                                style="width:100%">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <label class="control-label">Chọn tùy biến</label>
                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="gioitinh_xa" name=gender value="gender">
                                <label class="form-check-label" for="gioitinh_xa">Giới tính</label>
                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="tthdkt" id="tthdkt_xa"
                                    value="tthdkt">
                                <label class="form-check-label" for="tthdkt_xa">Tình trạng HĐKT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="dtut" id="dtut_xa"
                                    value="dtut">
                                <label class="form-check-label" for="dtut_xa">Đối tượng UT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="trinhdogdpt" id="trinhdogdpt_xa"
                                    value="trinhdogdpt">
                                <label class="form-check-label" for="trinhdogdpt_xa">Trình độ GDPT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="trinhdocmkt" id="trinhdocmkt_xa"
                                    value="trinhdocmkt">
                                <label class="form-check-label" for="trinhdocmkt_xa">Trình độ CMKT</label>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-10 d-none mt-2" id='gt_xa'>
                                <label class="control-label">Giới tính</label>
                                <select name="gioitinh" id="" class="form-control select2basic" style="width:100%">
                                    <option value="">Tất cả</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='hdkt_xa'>
                                <label class="control-label">Tình trạng HĐKT</label>
                                <select name="tinhtranghdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmtinhtranghdkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='ut_xa'>
                                <label class="control-label">Đối tượng UT</label>
                                <select name="uutien" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmuutien as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tendoituong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='gdpt_xa'>
                                <label class="control-label">Trình độ DGPT</label>
                                <select name="trinhdogiaoduc" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdoGDPT as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tengdpt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='cmkt_xa'>
                                <label class="control-label">Trình độ CMKT</label>
                                <select name="chuyenmonkythuat" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdocmkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentdkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- modal in bao cáo huyện -->
    <form method="POST" action="{{ '/dieutra/inbaocaohuyen' }}" accept-charset="UTF-8" id="frm_modify_huyen"
        target="_blank">
        @csrf
        <div id="modify-modal-huyen" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Đơn vị</label>
                            {{-- {!! Form::select('tinhtrangvl', setArray($a_tinhtrangvl,'Tất cả',null), ['id' => 'tinhtrangvl', 'class' => 'form-control select2basic']) !!} --}}
                            <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                <option value="">Tất cả</option>
                                @foreach ($m_huyen as $key => $ct)
                                    <option value="{{ $ct->madv }}"
                                        {{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>{{ $ct->name }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name='math' id='math'> --}}
                        </div>
                        <div class="col-lg-12">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic"
                                style="width:100%">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <label class="control-label">Chọn tùy biến</label>
                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="gioitinh_huyen" name=gender value="gender">
                                <label class="form-check-label" for="gioitinh_huyen">Giới tính</label>
                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="tthdkt" id="tthdkt_huyen"
                                    value="tthdkt">
                                <label class="form-check-label" for="tthdkt_huyen">Tình trạng HĐKT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="dtut" id="dtut_huyen"
                                    value="dtut">
                                <label class="form-check-label" for="dtut_huyen">Đối tượng UT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="trinhdogdpt" id="trinhdogdpt_huyen"
                                    value="trinhdogdpt">
                                <label class="form-check-label" for="trinhdogdpt_huyen">Trình độ GDPT</label>

                            </div>
                            <div class="form-check form-check-inline ml-5">
                                <input class="form-check-input" type="checkbox" name="trinhdocmkt" id="trinhdocmkt_huyen"
                                    value="trinhdocmkt">
                                <label class="form-check-label" for="trinhdocmkt_huyen">Trình độ CMKT</label>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-10 d-none mt-2" id='gt_huyen'>
                                <label class="control-label">Giới tính</label>
                                <select name="gioitinh" id="" class="form-control select2basic" style="width:100%">
                                    <option value="">Tất cả</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='hdkt_huyen'>
                                <label class="control-label">Tình trạng HĐKT</label>
                                <select name="tinhtranghdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmtinhtranghdkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='ut_huyen'>
                                <label class="control-label">Đối tượng UT</label>
                                <select name="uutien" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmuutien as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tendoituong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='gdpt_huyen'>
                                <label class="control-label">Trình độ DGPT</label>
                                <select name="trinhdogiaoduc" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdoGDPT as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tengdpt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='cmkt_huyen'>
                                <label class="control-label">Trình độ CMKT</label>
                                <select name="chuyenmonkythuat" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdocmkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentdkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- modal báo cáo tùy biến -->
    {{-- <form method="POST" action="{{ '/baocaotuybien' }}" accept-charset="UTF-8" id="frm_modify_huyen" target="_blank">
        @csrf
        <div id="tuybien-modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg"> --}}

    <!--Model lao động đủ 15 tuổi-->
    <form method="POST" action="{{ '/nhankhau/danhsach_tinhtrang' }}" accept-charset="UTF-8" id="frmDanhsachnk" target="_blank">
        @csrf
        <div id="danhsach-modal-confirm" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo thông tin lao động đủ 15 tuổi</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Đơn vị</label>
                            <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                {{-- <option value="">Tất cả</option> --}}
                                @foreach ($m_xa as $key => $ct)
                                    <option
                                        value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic"
                                style="width:100%">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input name='tinhtrang' id='tinhtrang' value="4" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Model chi tiết nhân khẩu -->
    <form method="get" action="{{ '/nhankhau-in' }}" accept-charset="UTF-8" id="frmDanhsach" target="_blank">
        @csrf
        <div id="danhsach-modal-nhankhau" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo thông tin chi tiết nhân khẩu </h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Đơn vị</label>
                            <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                @foreach ($m_xa as $key => $ct)
                                    <option
                                        value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic"
                                style="width:100%">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div id="cungxahuyen-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frm_cungxahuyen" method="get" accept-charset="UTF-8"
            action="{{ 'bao_cao_tong_hop/tong_hop_cung_ld_cap_xa_huyen' }}" target="_blank">>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body" id="dynamicTable">
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Đơn vị</label>
                            {{-- {!! Form::select('tinhtrangvl', setArray($a_tinhtrangvl,'Tất cả',null), ['id' => 'tinhtrangvl', 'class' => 'form-control select2basic']) !!} --}}
                            <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                <option value="">Tất cả</option>
                                @foreach ($m_huyen as $key => $ct)
                                    <option value="{{ $ct->madv }}"
                                        {{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>{{ $ct->name }}
                                    </option>
                                @endforeach
                            </select>
                            {{-- <input type="hidden" name='math' id='math'> --}}
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="" class="form-control select2basic"
                                style="width:100%">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <?php $i = 1; ?>

                        <div class="col-lg-12">
                            <label class="control-label">Chọn tùy biến</label>
                        </div>
                        <div class="row mt-1 ml-5" id="1stld">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="gioitinh" name=gender
                                    value="gender">
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
                                <select name="gioitinh" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='hdkt'>
                                <label class="control-label">Tình trạng HĐKT</label>
                                <select name="tinhtranghdkt" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmtinhtranghdkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='ut'>
                                <label class="control-label">Đối tượng UT</label>
                                <select name="uutien" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($dmuutien as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tendoituong }}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='gdpt'>
                                <label class="control-label">Trình độ DGPT</label>
                                <select name="trinhdogiaoduc" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdoGDPT as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tengdpt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-10 d-none mt-2" id='cmkt'>
                                <label class="control-label">Trình độ CMKT</label>
                                <select name="chuyenmonkythuat" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($trinhdocmkt as $val)
                                        <option value="{{ $val->stt }}">{{ $val->tentdkt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    {{-- <div class="row ">
                        <div class="col-sm-8 col-sm-offset-2">
                            <a class="btn btn-sm btn-success mt-3 ml-3" onclick="themmuc()"><i class="fa fa-plus"></i> Thêm mục</a>
                            <button type="button" class="btn btn-sm btn-danger" id='remove'>
                                Xóa
                            </button>
                            <button type="submit" class="btn btn-sm btn-info btn-lg pull-right">
                                Khai báo
                            </button>
                        </div>
                    </div> --}}
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- modal in danh sách biến động-->
    <form method="POST" action="{{ '/biendong/danhsach' }}" accept-charset="UTF-8" id="frm_modify_biendong" target="_blank">
        @csrf
        <div id="modify-modal-biendong" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
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
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}">{{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label class="control-label mt-3">Biến động</label>
                            <select name="biendong" id="" class="form-control select2basic" style="width:100%">
                                <option value="0">Nhận từ file excel</option>
                                <option value="1">Nhận thủ công</option>
                                <option value="2">Cập nhật thông tin</option>
                            </select>
                        </div>

                    </div>
                {{-- </div> --}}
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
                                    @foreach ($a_kydieutra as $key => $ct)
                                        <option value="{{ $key }}">{{ $ct }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-2 mt-2">
                                <label class="control-label">Đơn vị</label>
                                <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                    <option value="all">Tất cả</option>
                                    @if (session('admin')->capdo == 'T')
                                    @foreach ($m_huyen as $key => $ct)
                                    <option
                                        value="{{ $ct->madv }}"{{ session('admin')->madv == $ct->madv ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                                    @else
                                    @foreach ($m_xa as $key => $ct)
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
                                    <option value="0">Nhận từ file excel</option>
                                    <option value="2">Báo tăng</option>
                                    <option value="1">Nhận thủ công</option>
                                    <option value="3">Cập nhật thông tin</option>
                                    <option value="4">Báo giảm</option>
                                </select>
                            </div>
    
                        </div>
                    {{-- </div> --}}
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
            </div>
        </form>


    {{-- @include('reports.baocaotonghop.modal') --}}
    <script>
        function intonghop() {
            var url = '/dieutra/intonghop'
            $('#frm_modify_xa').attr('action', url);
        }
        var i = 0;

        function themmuc() {
            i++;
            firstld = document.getElementById("1stld").innerHTML + '';
            nextld = "<div class='row' id ='row" + i + "' >" + firstld + "</div>"
            if (i < 5) {
                $("#dynamicTable").append(nextld);
            }

        }

        $("#remove").click(function() {
            if (i > 4) {
                i = 4;
            }
            delrowid = "row" + i;
            document.getElementById(delrowid).remove();
            --i;
        });
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

@endsection
