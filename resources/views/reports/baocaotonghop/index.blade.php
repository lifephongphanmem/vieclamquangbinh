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
                                    <li><a href="#" data-target="#modify-modal-xa" data-toggle="modal">Báo cáo thông tin cung lao động - xã (Mẫu 03)</a>
                                    </li>
                                    <li><a href="#" data-target="#modify-modal-huyen" data-toggle="modal">Báo cáo thông tin cung lao động - Huyện (Mẫu 03)</a>
                                    </li>
                                    <li><a href="#" data-target="#modify-modal-tinh" data-toggle="modal">Báo cáo thông tin cung lao động - Tỉnh (Mẫu 03)</a>
                                        </li
                                    {{-- <li><a href="#" data-target="#doanhnghiep-modal" data-toggle="modal">Mẫu số
                                        01/PLI.
                                        Báo cáo tình hình sử dụng lao động (do người sử dụng lao động lập)</a>
                                </li> --}}
                                    {{-- <li><a href="#" data-target="#solaodongtbxh-modal" data-toggle="modal">Mẫu số
                                            02/PLI. Báo cáo tình hình sử dụng lao động (do Sở Lao động - Thương binh và Xã
                                            hội lập)</a>
                                    </li>
                                    <li>
                                        <a href="" data-target="#cungxahuyen-modal" data-toggle="modal" >Mẫu số 04a. Báo
                                            cáo tổng hợp về thông tin về cung lao động ( dành cho cấp xã và cấp huyện)</a>
                                    </li>
                                    <li>
                                        <a href="#" data-target="#thitruongld-modal" data-toggle="modal">Mẫu số
                                            04. Báo cáo về thông tin thị trường lao động</a>
                                    </li> --}}
                                    {{-- <hr>
                                    <li>
                                        <a href="{{ 'bao_cao_tong_hop/thong_tin_cung_lao_dong' }}" target="_blank">Mẫu số
                                            01a. Thông tin về cung lao động</a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="{{ 'bao_cao_tong_hop/ds_thong_tin_cung_ld' }}" target="_blank">Mẫu số
                                            01b. Tổng hợp danh sách thông tin về cung lao động (A3)</a>
                                    </li> --}}
                                    {{-- <li>
                                        <a href="{{ 'bao_cao_tong_hop/thong_tin_nhu_cau_tuyen_dung' }}" target="_blank">Mẫu
                                            số 02.
                                            Thông tin nhu cầu tuyển dụng lao động của người sử dụng lao động</a>
                                    </li>
                                    <li>
                                        <a href="{{ 'bao_cao_tong_hop/thong_tin_nguoi_lao_dong_nuoc_ngoai' }}"
                                            target="_blank">Mẫu số 03. Thông tin người lao động nước ngoài làm việc tại Việt
                                            Nam</a>
                                    </li>
                                    <li>
                                        <a href="{{ 'bao_cao_tong_hop/tinh_hinh_su_dung_lao_dong' }}" target="_blank">Mẫu
                                            số
                                            03a/PLI. Báo cáo tình hình sử dụng lao động (do người sử dụng lao động lập)</a>
                                    </li> --}}

                                </ol>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

                <!-- modal in báo cáo tỉnh -->
                <form method="POST" action="{{'/dieutra/inbaocaotinh'}}" accept-charset="UTF-8" id="frm_modify_tinh" target="_blank">
                    @csrf
                    <div id="modify-modal-tinh" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xs">
                            <div class="modal-content">
                                <div class="modal-header modal-header-primary">
                                    <h4 id="modal-header-primary-label" class="modal-title">In báo cáo</h4>
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                                </div>
                                <div class="modal-body">
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
                                    <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                                        ý</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            <!-- modal in báo cáo xã -->
            <form method="POST" action="{{'/dieutra/intonghop'}}" accept-charset="UTF-8" id="frm_modify_xa" target="_blank">
                @csrf
                <div id="modify-modal-xa" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xs">
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
                                            <option value="{{ $ct->madv }}">{{ $ct->name }}</option>
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
            
                        <!-- modal in bao cáo huyện -->
                        <form method="POST" action="{{'/dieutra/inbaocaohuyen'}}" accept-charset="UTF-8" id="frm_modify_huyen" target="_blank">
                            @csrf
                            <div id="modify-modal-huyen" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xs">
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
                                                        <option value="{{ $ct->madv }}">{{ $ct->name }}</option>
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
    <div id="cungxahuyen-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frm_cungxahuyen" method="get" accept-charset="UTF-8" 
        action="{{'bao_cao_tong_hop/tong_hop_cung_ld_cap_xa_huyen'}}" target="_blank">>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Mẫu số 04a. Báo
                            cáo tổng hợp về thông tin về cung lao động ( dành cho cấp xã và cấp huyện)</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label style="font-weight:bold; color:blue">Đơn vị</label>
                                <select class="form-control select2basic" id="madv" name="madv">
                                    @foreach ($dmdonvi as $item)
                                    <option value="{{$item->madv}}">{{$item->tendv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label style="font-weight:bold; color:blue">Năm</label>
                                <select class="form-control select2basic" id="nam" name="nam">
                                    <?php $nam_start = date('Y') - 5;
                                    $nam_stop = date('Y'); ?>
                                    @for ($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{ $i }}" {{ $i == $nam_stop ? 'selected' : '' }}>Năm
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                     
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <div id="doanhnghiep-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frm_doanhnghiep" method="get" accept-charset="UTF-8"
            action="{{ 'bao_cao_tong_hop/nguoi_su_dung_lao_dong' }}" target="_blank">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Mẫu số 01/PLI.
                            Báo cáo tình hình sử dụng lao động (do người sử dụng lao động lập)</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Đơn vị*</b></label>
                                <select class="col-md-12 select2basic" id="id" name="id">
                                    @foreach ($company as $com)
                                        <option value="{{ $com->madv }}"
                                            {{ $nguoidung == $com->madv ? 'selected' : '' }}>{{ $com->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Tổng hợp*</b></label>
                                <select id="madb" name="madb" class="col-xl-12 select2basic">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng
                            ý gửi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div id="solaodongtbxh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frm_solaodongtbxh" method="get" accept-charset="UTF-8"
            action="{{ 'bao_cao_tong_hop/so_lao_dong_thuong_binh_xa_hoi' }}" target="_blank">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Mẫu số 02/PLI.
                            Báo cáo tình hình sử dụng lao động (do Sở Lao động - Thương binh và Xã hội lập)</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Tổng hợp*</b></label>
                                <select id="madb" name="madb" class="col-xl-12 select2basic">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng
                            ý gửi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="thitruongld-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frm_thitruongld" method="get" accept-charset="UTF-8"
            action="{{ 'bao_cao_tong_hop/thonh_tin_thi_truong_ld' }}" target="_blank">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Mẫu số 04
                            Báo cáo về thông tin thị trường lao động</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label style="font-weight:bold; color:blue">Năm</label>
                                <select class="form-control select2basic" id="nam" name="nam">
                                    <?php $nam_start = date('Y') - 5;
                                    $nam_stop = date('Y'); ?>
                                    @for ($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{ $i }}" {{ $i == $nam_stop ? 'selected' : '' }}>Năm
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                   
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
        </form>
    </div>


    {{-- @include('reports.baocaotonghop.modal') --}}
    <script>
        function intonghop() {
            var url = '/dieutra/intonghop'
            $('#frm_modify_xa').attr('action', url);
        }
    </script>

@endsection
