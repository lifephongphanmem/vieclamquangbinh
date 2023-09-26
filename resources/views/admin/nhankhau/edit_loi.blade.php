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
                    <form method="POST" action="{{ '/nhankhau/update/' . $ld->id . '?loailoi=' . $loailoi }}"
                        enctype='multipart/form-data'>
                        @csrf
                        <div class="card-body" id='dynamicTable'>

                            <div class="row">
                                <div class="col-md-12 ">
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
                                        <div class="form-group ">
                                            <label class="{{ $ld->ngaysinh == null ? 'text-danger' : '' }}">Ngày tháng năm
                                                sinh</label>
                                            <input type="text" name="ngaysinh" value="{{ $ld->ngaysinh }}"
                                                class="form-control {{ $ld->ngaysinh == null ? 'text-danger' : '' }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
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
                                            <label>Địa chỉ</label>
                                            <input type="text" name="diachi" value="{{ $ld->diachi }}"
                                                class="form-control">
                                        </div>
                                    </div>
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
                                            <label>Số sổ bảo hiểm</label>
                                            <input type="text" name="bhxh" value="{{ $ld->bhxh }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Trình độ Giáo dục</label>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Chuyên ngành đào tạo</label>
                                            <input type="text" name="chuyennganh" value="{{ $ld->chuyennganh }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ngành nghề </label>
                                            <select class="form-control" name="nghenghiep">

                                                <?php foreach ( $list_nghe as $key=>$td){ ?>
                                                <option value='{{ $ld->id }}' <?php if ($ld->id == $key) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $td->name }}
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Lĩnh vực đào tạo </label>
                                            <select class="form-control" name="linhvucdaotao">

                                                <?php foreach ( $list_linhvuc as $td){ ?>
                                                <option value='{{ $ld->id }}' <?php if ($ld->id = $key) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $td->name }}
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tình trạng việc làm</label>
                                            <select class="form-control" name="tinhtranghdkt" required>
                                                <option value="">--- Chọn tình trạng ----</option>
                                                @foreach ($m_tinhtrangvl as $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->tinhtranghdkt == $ct->stt ? 'selected' : '' }}>
                                                        {{ $ct->tentgkt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                {{-- </fieldset> --}}
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Vị thế việc làm</label>
                                            <select class="form-control" name="nguoicovieclam">
                                                <option value="">--- Chọn vị thế ----</option>
                                                @foreach ($m_vithevl as $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->nguoicovieclam == $ct->stt ? 'selected' : '' }}>
                                                        {{ $ct->tentgktct2 }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Công việc cụ thể đang làm</label>
                                            <input type="text" name="congvieccuthe" value="{{ $ld->congvieccuthe }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tham gia bảo hiểm</label>
                                            <select class="form-control" name="thamgiabhxh">
                                                <option value="">--- Chọn tham gia BHXH----</option>
                                                @foreach ($a_thamgiabaohiem as $k => $ct)
                                                    <option value="{{ $k }}"
                                                        {{ $ld->thamgiabhxh == $k ? 'selected' : '' }}>{{ $ct }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Hợp đồng lao động</label>
                                            <select class="form-control" name="hdld">
                                                <option value="">--- Chọn loại HĐLĐ----</option>
                                                @foreach ($m_hopdongld as $k => $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->hdld == $ct->stt ? 'selected' : '' }}>{{ $ct->tenlhl }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nơi làm việc</label>
                                            <input type="text" name="noilamviec" value="{{ $ld->noilamviec }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Loại hình nơi làm việc</label>
                                            <select class="form-control" name="loaihinhnoilamviec">
                                                <option value="">--- Chọn loại hình ----</option>
                                                @foreach ($m_loaihinhkt as $k => $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->loaihinhnoilamviec == $ct->stt ? 'selected' : '' }}>
                                                        {{ $ct->tenlhkt }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Địa chỉ nơi làm việc</label>
                                            <input type="text" name="diachinoilamviec"
                                                value="{{ $ld->diachinoilamviec }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Người thất nghiệp</label>
                                            <select class="form-control" name="thatnghiep">
                                                <option value="">--- Chọn loại ----</option>
                                                @foreach ($m_nguoithatnghiep as $k => $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->thatnghiep == $ct->stt ? 'selected' : '' }}>
                                                        {{ $ct->tentgktct }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Thời gian thất nghiệp</label>
                                            <select class="form-control" name="thoigianthatnghiep">
                                                <option value="">--- Chọn thời gian thất nghiệp ----</option>
                                                @foreach ($m_thoigianthatnghiep as $k => $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->thoigianthatnghiep == $ct->stt ? 'selected' : '' }}>
                                                        {{ $ct->tentgtn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Lý do không tham gia hoạt động kinh tế</label>
                                            <select class="form-control" name="khongthamgiahdkt">
                                                <option value="">--- Chọn loại hình ----</option>
                                                @foreach ($lydo as $k => $ct)
                                                    <option value="{{ $ct->stt }}"
                                                        {{ $ld->khongthamgiahdkt == $ct->stt ? 'selected' : '' }}>
                                                        {{ $ct->tentgktct }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-12 text-center">

                                        <button type="submit" class="btn btn-success">Đồng ý</button>

                                        <a href="{{ '/dieutra/danhsachloi_chitiet?loailoi=' . $inputs['loailoi'] . '&madv=' . $ld->madv . '&kydieutra=' . $ld->kydieutra . '&id=' . $inputs['id'] . '&mahuyen=' . $inputs['mahuyen'] }}"
                                            class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
