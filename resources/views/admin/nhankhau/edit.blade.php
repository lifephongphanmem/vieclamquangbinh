@extends ('main')
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
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Thôn tin người tìm việc</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{ URL::to('/nhankhau/danhsach') }}" class="btn btn-xs btn-success"><i class="fa fa-undo">
                                &ensp;Trở về</a></i> --}}
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST"
                        action="{{ '/nhankhau/update/' . $ld->id . '?mahuyen=' . $inputs['mahuyen'] }}"
                        enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div class="card-body" id='dynamicTable'>
                            <input type="hidden" name=kydieutra value="{{ $inputs['kydieutra'] }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Họ và Tên</label>
                                        <input type="text" name="hoten" value="{{ $ld->hoten }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Số CMND/CCCD</label>

                                        <input type="text" name="cccd" value="{{ $ld->cccd }}"
                                            class="form-control" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Giới tính </label>

                                        <select class="form-control" name="gioitinh">

                                            <option value='Nữ'>Nữ</option>
                                            <option value='Nam' <?php if ($ld->gioitinh == 'nam' || $ld->gioitinh == 'Nam') {
                                                echo 'selected';
                                            } ?>>Nam</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ngày tháng năm sinh</label>
                                        <input type="date" name="ngaysinh" value="{{ $ld->ngaysinh }}"
                                            class="form-control" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="text" name="sdt" value="{{ $ld->sdt }}"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Khu vực</label>
                                        <select class="form-control" name="khuvuc">
                                            <option value="1" {{ $ld->khuvuc == 1 ? 'selected' : '' }}>Thành thị
                                            </option>
                                            <option value="2" {{ $ld->khuvuc == 2 ? 'selected' : '' }}>Nông thôn
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nơi ở hiện nay</label>
                                        <input type="text" name="diachi" value="{{ $ld->diachi }}"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Đối tượng ưu tiên</label>
                                        <select class="form-control" name="uutien">
                                            <option value="">--- Chọn đối tượng ----</option>
                                            @foreach ($m_uutien as $ct)
                                                <option value="{{ $ct->stt }}"
                                                    {{ $ld->uutien == $ct->stt ? 'selected' : '' }}>{{ $ct->tendoituong }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Dân tộc</label>
                                        <input type="text" name="dantoc" value="<?php if ($ld->dantoc == 'x') {
                                            echo 'Kinh';
                                        } else {
                                            echo $ld->dantoc;
                                        } ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Trình độ DGPT</label>
                                        <select class="form-control" name="trinhdogiaoduc">
                                            <option value="">--- Chọn trình độ giáo dục ---</option>
                                            <?php foreach ( $list_tdgd as  $key=>$td){ ?>
                                            <option value='{{ $td->stt }}' <?php if ($ld->trinhdogiaoduc == $td->stt) {
                                                echo 'selected';
                                            } ?>>
                                                {{ $td->tengdpt }}
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Trình độ CMKT</label>
                                        <select class="form-control" name="chuyenmonkythuat">
                                            <option value="">--- Chọn trình độ cmkt ---</option>
                                            <?php foreach ( $list_cmkt as $key=>$td){ ?>
                                            <option value='{{ $td->stt }}' <?php if ($ld->chuyenmonkythuat == $td->stt) {
                                                echo 'selected';
                                            } ?>>
                                                {{ $td->tentdkt }}
                                            </option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Chuyên ngành đào tạo</label>
                                        <select name="chuyennganh" class="form-control">
                                            <option value="">---Chọn chuyên ngành đào tạo---</option>
                                            @foreach ($m_nganhnghe as $val)
                                                <option value="{{ $val->madm }}"
                                                    {{ $ld->chuyennganh == $val->madm ? 'selected' : '' }}>
                                                    {{ $val->tendm }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Đối tượng tìm kiếm việc làm <span class="text-danger">*</span></label>
                                        <select name="doituongtimvieclam" class="form-control" required>
                                            <option value="">---Chọn đối tượng tìm kiếm việc làm---</option>
                                            <option value="1" {{ $ld->doituongtimvieclam == 1 ? 'selected' : '' }}>
                                                Chưa
                                                từng làm việc</option>
                                            <option value="2" {{ $ld->doituongtimvieclam == 2 ? 'selected' : '' }}>Đã
                                                từng
                                                làm việc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Việc làm mong muốn <span class="text-danger">*</span></label>
                                        <select name="vieclammongmuon" class="form-control">
                                            <option value="3">---Tất cả---</option>
                                            <option value="1" {{ $ld->vieclammongmuon == 1 ? 'selected' : '' }}>Trong
                                                tỉnh,
                                                trong nước</option>
                                            <option value="2" {{ $ld->vieclammongmuon == 2 ? 'selected' : '' }}>Đi
                                                làm việc
                                                ở nước ngoài</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ngành nghề mong muốn <span class="text-danger">*</span></label>
                                        <select name="nganhnghemongmuon" class="form-control ">
                                            <option value="">---Chọn ngành nghề mong muốn---</option>
                                            @foreach ($m_nganhnghe as $val)
                                                <option value="{{ $val->madm }}"
                                                    {{ $ld->nganhnghemongmuon == $val->madm ? 'selected' : '' }}>
                                                    {{ $val->tendm }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Thị trường </label>
                                            <select name="thitruonglamviec" class="form-control selec2basic">
                                                <option value="">---Chọn thị trường muốn làm việc--</option>
                                                @foreach (getthitruong() as $k => $val)
                                                    <option value="{{ $k }}"
                                                        {{ $ld->thitruonglamviec == $k ? 'selected' : '' }}>
                                                        {{ $val }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ngành nghề muốn học <span class="text-danger">*</span></label>
                                            <select name="nganhnghemuonhoc" class="form-control">
                                                <option value="">---Chọn ngành nghề muốn học---</option>
                                                @foreach ($m_nganhnghe as $val)
                                                    <option value="{{ $val->madm }}"
                                                        {{ $ld->nganhnghemuonhoc == $val->madm ? 'selected' : '' }}>
                                                        {{ $val->tendm }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Trình độ chuyên môn muốn học <span class="text-danger">*</span></label>
                                            <select name="trinhdochuyenmonmuonhoc" class="form-control selec2basic">
                                                <option value="">---Chọn trình độ chuyên môn muốn học---</option>
                                                <option value="1"
                                                    {{ $ld->trinhdochuyenmonmuonhoc == 1 ? 'selected' : '' }}>Sơ cấp
                                                </option>
                                                <option value="2"
                                                    {{ $ld->trinhdochuyenmonmuonhoc == 2 ? 'selected' : '' }}>Trung cấp
                                                </option>
                                                <option value="3"
                                                    {{ $ld->trinhdochuyenmonmuonhoc == 3 ? 'selected' : '' }}>Cao đẳng
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ghi chú</label>
                                            <input name="lydo" class="form-control" value="{{ $ld->lydo }}">
                                        </div>
                                    </div>
                                </div>



                                <input type="hidden" name=view value="{{ $inputs['view'] }}">
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-12 text-center">
                                            @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $inputs['kydieutra'] == date('Y'))
                                                <button type="submit" class="btn btn-success">Đồng ý</button>
                                            @endif
                                            <a onclick="history.back()" class="btn btn-danger"><i
                                                    class="fa fa-reply"></i>&nbsp;Quay lại</a>
                                        </div>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
