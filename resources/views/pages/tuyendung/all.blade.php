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
                        <h3 class="card-label text-uppercase">Các tuyển dụng gần đây </h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">
                    <form class="form-inline" method="GET">
                        <div class="row ">
                            <div class="col-md-12">
                                <label>Lọc theo tình trạng</label>
                                <select class=" form-control" name="state_filter" onchange="this.form.submit()"
                                    style="margin-bottom: 1%">
                                    <option value="0">Tất cả</option>
                                    <option value="1" <?php if ($state_filter == 1) {
                                        echo 'selected';
                                    } ?>>Đã xác nhận</option>
                                    <option value="2"<?php if ($state_filter == 2) {
                                        echo 'selected';
                                    } ?>>Đã báo cáo</option>
                                </select>
                            </div>
                        </div>

                    </form>
                    {{-- <div class="row "> --}}
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead class="text-center">
                            <td width="2%"> # </td>
                            <td width="20%"> Nội dung</td>
                            <td width="20%"> Vị trí</td>
                            <td width="8%"> Thời hạn</td>
                            <td width="8%"> Ngày đăng</td>
                            <td width="10%"> Tình trạng </td>
                            <td width="8%"> Số LĐ đã tuyển</td>
                            <td width="10%"> Chức năng </td>
                            <td width="10%"> Thao tác </td>
                        </thead>
                        <tbody>

                            @foreach ($tds as $key => $td)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <a href="{{ URL::to('tuyendung-fe') . '/' . $td->id }}">
                                            {{ $td->noidung }}
                                        </a>
                                    </td>
                                    <td> {!! $td->desc !!}</td>
                                    <td> {{ date('d-m-Y', strtotime($td->thoihan)) }}</td>
                                    <td> {{ date('d-m-Y', strtotime($td->created_at)) }}</td>
                                    <td>
                                        <?php
                                        switch ($td->state) {
                                            case '1':
                                                echo 'Đã xác nhận';
                                                break;
                                            case '2':
                                                echo 'Đã  báo cáo kết quả';
                                                break;
                                            default:
                                                echo 'Chưa xác nhận';
                                        } ?>
                                    </td>
                                    <td> {{ $td->datuyen ? $td->datuyen : 0 }}</td>
                                    <td>
                                        <a href="{{ URL::to('tuyendung-fr') . '/' . $td->id }}" class="{{ $td->state != 1 ? 'btn disabled' : '' }}" > Báo cáo kết quả</a>
                                    </td>
                                    <td>
                                        <button title="In thông tin" type="button" data-target="#modal-inbaocao"
                                            data-toggle="modal" onclick="get_vitri('{{ $td->id }}')"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg flaticon-list text-success"></i>
                                        </button>
                                        <button title="In phiếu" type="button" data-target="#modal-inphieu"
                                            data-toggle="modal" onclick="get_vitri1('{{ $td->id }}')"
                                            class="btn btn-sm btn-clean btn-icon">
                                            <i class="icon-lg la flaticon2-print text-primary"></i>
                                        </button>
                                        <button title="Up ảnh" type="button" data-target="#modal-upanh"
                                        data-toggle="modal" onclick="get_vitri_anh('{{ $td->id }}')"
                                        class="btn btn-sm btn-clean btn-icon">
                                        <i class="fas fa-upload text-primary"></i>
                                    </button>
                                    <button title="Xóa thông tin" type="button"
                                    onclick="cfDel('{{'/tuyendung/del/'.$td->id}}')"
                                    class="btn btn-sm btn-clean btn-icon ml-3" data-target="#delete-modal-confirm"
                                    data-toggle="modal">
                                    <i class="icon-lg flaticon-delete text-danger"></i>
                                </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

            <!--Model delete-->
            <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xóa</h4>
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                            </div>
                            {{-- <div class="modal-body">
                                <label> <b>Nếu xóa thì sẽ xóa tất cả các nhân khẩu thuộc xã trên phần mềm trong kỳ điều tra
                                        này</b></label>
                            </div> --}}
    
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                                <button type="submit" onclick="subDel()" data-dismiss="modal" class="btn btn-primary">Đồng
                                    ý</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    <!-- Modal In báo cáo -->
    <div id="modal-inbaocao" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form action="{{ '/vanban/mauso_03a_pl1' }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8"
            id="get-vitri">
            @csrf
            <div class="modal-dialog modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title"> Báo cáo tình hình sử
                        dụng lao động Mẫu số
                        03a/PLI.
                    </h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                </div>
                <div class="modal-body" id='vitri'>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>

                </div>
            </div>
        </form>
    </div>
        <!-- Modal In phiếu -->
        <div id="modal-inphieu" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <form action="{{ '/vanban/mau_03lpi' }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8"
                id="get-vitri1">
                @csrf
                <div class="modal-dialog modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In phiếu đăng ký tuyển dụng
                        </h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body" id='vitri1'>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
    
                    </div>
                </div>
            </form>
        </div>
                <!-- Modal upload ảnh -->
                <div id="modal-upanh" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                    <form action="{{ '/tuyendung/uploadanh' }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8"
                        id="get-vitri1">
                        @csrf
                        <div class="modal-dialog modal-content">
                            <div class="modal-header modal-header-primary">
                                <h4 id="modal-header-primary-label" class="modal-title">Tải ảnh lên
                                </h4>
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12" id='vitri2'>

                                </div>
                                <div class="col-lg-12">
                                    <label class="control-label">Loại ảnh</label>
                                    <select name="loaianh" id="" class="form-control select2basic"
                                        style="width:100%">
                                    <option value="anhtuyendung">Phiếu đăng ký tuyển dụng</option>
                                    <option value="anhdontuyendung">Đơn đăng ký tuyển dụng</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <label class="control-label">File ảnh</label>
                                    <input type="file" class="form-control" name="fileanh[]" multiple required>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-default">Đóng</button>
                                <button type="submit" id="submit" name="submit" value="submit"
                                class="btn btn-primary">Đồng
                                ý</button>
                            </div>
                        </div>
                    </form>
                </div>
    <script>
        function get_vitri(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '/tuyendung-get_vitri_page',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',

                success: function(data) {
                    $('#vt').remove();
                    $('#vitri').append(data);

                },
                error: function(message) {
                    toastr.error(message, "Lỗi")
                }
            });
        }
        function get_vitri1(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            console.log(1);
            $.ajax({
                url: '/tuyendung/vitri',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',

                success: function(data) {
                    $('#vt1').remove();
                    $('#vitri1').append(data);

                },
                error: function(message) {
                    toastr.error(message, "Lỗi")
                }
            });
        }
        function get_vitri_anh(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            console.log(1);
            $.ajax({
                url: '/tuyendung/vitri_upanh',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',

                success: function(data) {
                    $('#vt2').remove();
                    $('#vitri2').append(data);

                },
                error: function(message) {
                    toastr.error(message, "Lỗi")
                }
            });
        }

        function cfDel(url) {
                $('#frmDelete').attr('action', url);
            }

            function subDel() {
                $('#frmDelete').submit();
            }
    </script>
@endsection
