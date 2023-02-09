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
                        {{-- <a href="{{URL::to('nhankhau-ba') }}" class="btn btn-xs btn-success"><i class="fa fa-file-import"></i> &ensp;Nhận excel</a> --}}
                    </div>

                </div>
                <div class="card-body">

                    <form class="form-inline" method="GET">
                        <div class="row ">
                            <div class="col-sm-7 col-sm-offset-1">
                                <label>Lọc theo kỳ</label>
                                <select style="margin-bottom: 4%" class=" form-control w-sm inline v-middle"
                                    name="time_filter" onchange="this.form.submit()">
                                    <option value="1" <?php if ($time_filter == 1) {
                                        echo 'selected';
                                    } ?>>Kì hiện tại</option>
                                    <option value="2"<?php if ($time_filter == 2) {
                                        echo 'selected';
                                    } ?>>Kỳ trước</option>
                                    <option value="3"<?php if ($time_filter == 3) {
                                        echo 'selected';
                                    } ?>>Năm hiện tại</option>

                                </select>
                            </div>
                            <div class="col-sm-3 ">
                                <div class="function-search pull-right">
                                    <div class="input-group">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <td width="5%"> # </td>
                            <td width="10%"> Loại</td>
                            <td width="10%"> Đối tượng</td>
                            <td width="5%"> Số lượng</td>
                            <td width="45%"> Mô tả</td>
                            <td width="15%"> Thời gian</td>
                            <td width="10%"> thao tác</td>
                        </thead>
                        <tbody>
                            <?php 
		$i=($reports->currentPage()-1)*$reports->perPage();
		foreach ($reports as $rp ){
			$i++;
	?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <?php
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
                                        case 'nothing':
                                            echo 'Không có biến động';
                                            break;
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($rp->datatable == 'company') {
                                        echo 'Thông tin công ty';
                                    } elseif ($rp->datatable == 'nguoilaodong') {
                                        echo 'Người lao động';
                                    }
                                    ?>
                                </td>
                                <td> {{ $rp->numrow }}</td>
                                <td> {{ $rp->note }}</td>
                                <td> {{ $rp->time }}</td>
                                <td>
                                    <button title="Xóa thông tin" data-toggle="modal" data-target="#delete-modal-confirm"
                                        type="button" onclick="cfDel('{{ 'report-fa-delete/' . $rp->id }}')"
                                        class="btn btn-sm btn-clean btn-icon">
                                        <i class="icon-lg flaticon-delete text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('includes.delete')
@endsection
