{{-- @extends ('admin.layout') --}}
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
                        <h3 class="card-label text-uppercase">Danh sách doanh nghiệp</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ 'doanh_nghiep/them_moi' }}" class="btn btn-sm btn-success">Thêm mới</a>
                        {{-- <button class="btn btn-xs btn-success mr-2 ml-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import">Nhận Excel</i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-inline" method="GET">
                        <div class="row w3-res-tb">
                            <div class="col-sm-2 m-b-xs">
                                <select class="form-control select2basic" name="dm_filter" onchange="this.form.submit()">
                                    <option value="0">Tất cả huyện thị</option>
                                    <?php foreach ($dmhc_list as $dm) {?>
                                    <option value="{{ $dm->name }}" <?php if ($dm_filter == $dm->name) {
                                        echo 'selected';
                                    } ?>>{{ $dm->name }}</option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="col-sm-2 m-b-xs">
                                <select class="form-control select2basic" name="public_filter"
                                    onchange="this.form.submit()">
                                    <option value="0">Tình trạng hoạt động</option>
                                    <option value="1" <?php if ($public_filter == 1) {
                                        echo 'selected';
                                    } ?>>Hoạt động</option>
                                    <option value="2"<?php if ($public_filter == 2) {
                                        echo 'selected';
                                    } ?>>Tạm dừng</option>

                                </select>
                            </div>
                            <div class="col-sm-2 m-b-xs">
                                <select id="khaibao" name="khaibao" class="form-control select2basic"
                                    onchange="this.form.submit()">
                                    <option value="0">Tình trạng khai báo</option>
                                    <option value="dkb" <?php if ($khaibao == 'dkb') {
                                        echo 'selected';
                                    } ?>>Đã khai báo</option>
                                    <option value="ckb" <?php if ($khaibao == 'ckb') {
                                        echo 'selected';
                                    } ?>>Chưa khai báo</option>
                                    <option value="ckt" <?php if ($khaibao == 'ckt') {
                                        echo 'selected';
                                    } ?>>Chưa khai trình</option>
                                       <option value="ddk" <?php if ($khaibao == 'ddk') {
                                        echo 'selected';
                                    } ?>>Đã đăng ký</option>
                                       <option value="kbld" <?php if ($khaibao == 'kbld') {
                                        echo 'selected';
                                    } ?>>Khai báo lần đầu</option>
                                </select>
                            </div>
                            <div style=" margin-left:5%">
                                <span> Quy mô <br> lao động </span>
                            </div>
                            <label style=" margin-left:1%"> Min </label>
                            <input type="text" class=" form-control col-xl-1 " value="{{ $quymo_min_filter }}"
                                name="quymo_min_filter">
                            <label> Max </label>
                            <input type="text" class=" form-control col-xl-1 " value="{{ $quymo_max_filter }}"
                                name="quymo_max_filter">
                            <div>
                                <button class=" form-control " type="submit">Lọc</button>
                            </div>
                            <div style=" margin-left:2%">
                                <button class=" form-control form-inline" name="export" value="1" type="submit">Xuất
                                    Excel</button>
                            </div>
                        </div>


                    </form>

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th> STT </th>
                                <th>Mã ĐKKD</th>
                                <th>Tên doanh nghiệp</th>
                                <th>Địa chỉ</th>
                                <th style="width:10%">Điện thoại</th>
                                <th>Quy mô</th>
                                <th>Tình trạng</th>
                                <th>Biến động</th>
                                <th>Tuyển dụng </th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

		foreach ($ctys as$key=>$cty ){

	?>
                            <tr>
                                <td>{{ ++$key }} </td>
                                <td>{{ $cty->dkkd }}</td>
                                <td><a
                                        href="{{ URL::to('doanhnghiep-be?cid=' . $cty->id . '&dm_filter=' . $dm_filter . '&public_filter=' . $public_filter 
                                        . '&khaibao=' . $khaibao . '&quymo_min_filter=' . $quymo_min_filter . '&quymo_max_filter=' . $quymo_max_filter) }}">{{ $cty->name }}</a>
                                </td>
                                <td>{{ $cty->diachi }}</td>

                                <td><span class="text-ellipsis"> </span>{{ $cty->phone }}</td>
                                <td><span class="text-ellipsis">
                                    </span>{{ $cty->quymo != null ? $cty->quymo : $cty->employers_count }}</td>
                                <td><span class="text-ellipsis">
                                        <?php if ($cty->public==1){ ?>
                                        <i class="fa fa-check text-success text-active"></i>
                                        <?php }else{ ?>
                                        <i class="fa fa-close text-success text-active" style="color:red"></i>
                                        <?php }?></span>
                                </td>
                                <td><span class="text-ellipsis"> </span>Khai báo</td>
                                <td><span class="text-ellipsis"> </span><a
                                        href="{{ URL::to('tuyendung-ba/' . $cty->id) }}">Tin
                                        tuyển dụng</a></td>
                                <td>
                                    <button title="In thông tin" type="button"
                                        onclick="xuatexel('{{ $cty->id }}','{{ $cty->user }}')"
                                        class="btn btn-sm btn-clean btn-icon" data-target="#danhsach-modal-confirm"
                                        data-toggle="modal">
                                        <i class="icon-lg flaticon-list text-success"></i>
                                    </button>
                                    @if ($cty->user == null)
                                        <button title="Xóa thông tin" data-toggle="modal"
                                            data-target="#delete-modal-confirm" type="button"
                                            onclick="cfDel('{{ 'doanhnghiep-delete/' . $cty->id }}')"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg flaticon-delete text-danger"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal nhận excel -->
    <div id="modal-nhanexcel" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form action="{{ '/doanhnghiep/import' }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="modal-dialog modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Nhận danh sách doanh nghiệp từ file Excel
                    </h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="file" name="import_file" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-lg-12">
                            <p class="float-left mr-3">Tải file excel mẫu </p><a href="{{asset('excel/maunhapnguoilaodong.xlsx')}}">tại đây</a>
                        </div>
                    </div> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
            </div>
        </form>
    </div>
    <!--Model danh sách-->
    <div id="danhsach-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {{-- <form id="frmDanhsach" method="POST" action="{{'/nhankhau/danhsach_tinhtrang'}}" accept-charset="UTF-8" enctype="multipart/form-data" target='_blank'> --}}
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Danh sách</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    {{-- <select name="tinhtrang" id="" class="form-control select2basic" style="width:100%">
                                            <option value="1">Mẫu 01/PLI (NĐ 145/2020)</option>
                                            <option value="2">Mẫu 02 (TT 01/2022)</option>
                                        </select> --}}
                    <a href="" id='mau01' target="_blank">1. Mẫu 01/PLI (NĐ 145/2020)</a></br>
                    <a href="">2. Mẫu 02 (TT 01/2022)</a>
                    <input type="hidden" name='madv' id='madonvi'>
                    <input type="hidden" name='kydieutra' id='ky_dieu_tra'>
                </div>

                {{-- <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                                        <button type="submit" id="submit" name="submit" value="submit"
                                        class="btn btn-primary">Đồng
                                            ý</button>
                                    </div> --}}
            </div>
        </div>
        {{-- </form> --}}
    </div>

    <script>
        function xuatexel(id, user) {
            var url = '/doanhnghiep/mau01pli/' + id + '?user=' + user;
            $('#mau01').attr('href', url);
        }
    </script>



    @include('includes.delete')
@endsection

