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
                        <h3 class="card-label text-uppercase">Danh sách biến động</h3>
                    </div>
                    <div class="card-toolbar">
                        <a onclick="history.back()" data-target="#Report_in_doanhnghiep" data-toggle="modal"
                            class="btn btn-xs btn-success"><i class="fa fa-reply"></i>
                            &ensp;Quay lại</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th  width="5%"> STT </th>
                                <th>Loại</th>
                                <th  style="text-align: center">Mô tả</th>
                                <th  width="15%" class="text-center">Thời gian</th>
                                {{-- <th  width="8%" class="text-center">Thao tác</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
		                    foreach ($model as $key=>$rp ){ ?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td><?php
                                    switch ($rp->type) {
                                        case 'updateinfo':
                                            echo 'Cập nhật thông tin';
                                            break;
                                        case 'baogiam':
                                            echo 'Báo giảm';
                                            break;
                                        case 'baotang':
                                            echo 'Báo tăng';
                                            break;
                                        case 'tamdung':
                                            echo 'Tạm dừng';
                                            break;
                                        case 'kethuctamdung':
                                            echo 'Kết thúc tạm dừng';
                                            break;
                                        case 'import':
                                            echo 'Nhập từ file Excel';
                                            break;
                                        case 'nothing':
                                            echo 'Không có biến động';
                                            break;
                                    } ?>
                                </td>
                                <td class="text-left">{{ $rp->note }}</td>
                                <td class="text-center">{{ $rp->time }}</td>

                                {{-- <td class="text-center"><a onclick="intonghop('{{ $rp->id }}')" title="In báo cáo chi tiết"
                                        class="btn btn-sm btn-clean btn-icon" data-target="#Report_in_tonghop"
                                        data-toggle="modal">
                                        <i class="icon-lg la flaticon2-print text-primary"></i>
                                    </a>
                                    <td></td> --}}

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>



    {{-- modal doanh nghiệp --}}


    <script>
        function indoanhnghiep() {
            var form = $('#in_doanhnghiep').find("[name='tungay_dn']").val($('#tungay').val());
            var form = $('#in_doanhnghiep').find("[name='denngay_dn']").val($('#denngay').val());
        }

        function intonghop(id) {
            var form = $('#in_tonghop').find("[name='id']").val(id);
        }

        $(document).ready(function() {

            $("#radio1").click(function() {
                if (this.checked) {

                    $("#option2").css("display", "none");
                    $("#option1").css("display", "block");
                }
            });

            $("#radio2").click(function() {
                if (this.checked) {
                    $("#option1").css("display", "none");

                    $("#option2").css("display", "block");
                }
            });

            $("#radio3").click(function() {
                if (this.checked) {
                    $("#option1").css("display", "none");
                    $("#option2").css("display", "none");
                    $("#option3").css("display", "block");
                }
            });
        });
    </script>
@endsection
