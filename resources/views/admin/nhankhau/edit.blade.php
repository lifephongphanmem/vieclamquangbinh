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
                        <h3 class="card-label text-uppercase">Chi tiết nhân khẩu</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ URL::to('/nhankhau/danhsach') }}" class="btn btn-xs btn-success"><i class="fa fa-undo">
                                &ensp;Trở về</a></i>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="#" enctype='multipart/form-data'>
                        {{ csrf_field() }}
                        <div class="card-body" id='dynamicTable'>

                            <div class="row">
                                {{-- <fieldset class="col-md-12 "> --}}
                                {{-- <legend class="w-auto px-3">
                                        <button type="button" class="btn btn-success">Thông tin cơ bản</button>
                                    </legend> --}}
                                <div class="card-title">
                                    <h3 class="card-label">Thông tin cơ bản</h3>
                                </div>
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

                                            <input type="text" name="cmnd" value="{{ $ld->cccd }}"
                                                class="form-control" required>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label> Giới tính </label>
                                            <select class="form-control " name="gioitinh">
                                                <option value='nu'>Nữ</option>
                                                <option value='nam' <?php if ($ld->gioitinh == 'nam' || $ld->gioitinh == 'Nam') {
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
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Dân tộc</label>
                                            <input type="text" name="dantoc" value="<?php if ($ld->dantoc == 'x') {
                                                echo 'Kinh';
                                            } else {
                                                echo $ld->dantoc;
                                            } ?>"
                                                class="form-control" required>
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
                                            <label>Trình độ Giáo dục</label>
                                            <select class="form-control" name="trinhdogiaoduc">
                                                <?php foreach ( $list_tdgd as  $key=>$td){ ?>
                                                <option value='{{ $ld->id }}' <?php if ($ld->id == $key) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $td->name }}
                                                </option>
                                                <?php } ?>


                                            </select>
                                        </div>
                                    </div>
                                    @if ($ld->uutien != 'x')
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Đối tượng ưu tiên</label>
                                                <select class="form-control" name="trinhdogiaoduc">
                                                    <?php foreach ( $list_dtut as  $key=>$dt){ ?>
                                                    <option value='{{ $ld->id }}' <?php if ($ld->uutien == $dt->madmdt) {
                                                        echo 'selected';
                                                    } ?>>
                                                        {{ $dt->tendoituong }}
                                                    </option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                    @endif


                                </div>
                                <div class="col-md-12">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Trình độ CMKT</label>
                                            <select class="form-control" name="trinhdocmkt">

                                                <?php foreach ( $list_cmkt as $key=>$td){ ?>
                                                <option value='{{ $ld->id }}' <?php if ($ld->id == $key) {
                                                    echo 'selected';
                                                } ?>>
                                                    {{ $td->name }}
                                                </option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
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
                                    </div>
                                    <div class="col-md-3">
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
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Số sổ bảo hiểm</label>
                                            <input type="text" name="bhxh" value="{{ $ld->bhxh }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{-- </fieldset> --}}
                            </div>

                            <div class="row">
                                <fieldset class="col-sm-12 col-sm-offset-0">
                                    <legend class="w-auto px-3">
                                        <button type="button" class="btn btn-success">Đang làm việc tại
                                            {{ $ld->ctyname }}</button>
                                    </legend>
                                </fieldset>
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Việc làm</label>
                                            <input type="text" name="congvieccuthe" value="{{ $ld->congvieccuthe }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Nơi làm việc</label>
                                            <input type="text" name="noilamviec" value="{{ $ld->noilamviec }}"
                                                class="form-control">
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
                                
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
