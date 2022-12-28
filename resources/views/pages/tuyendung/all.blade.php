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
                        <h3 class="card-label text-uppercase">Các tuyển dụng gần đây</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">
                    <form class="form-inline" method="GET">
                        <div class="row ">
                            <div class="col-md-8">
                                <label>Lọc theo tình trạng</label>
                                <select class=" form-control" name="state_filter"
                                    onchange="this.form.submit()">
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
                                        <td width="5%"> # </td>
                                        <td width="20%"> Nội dung</td>
                                        <td width="25%"> Vị trí</td>
                                        <td width="10%"> Thời hạn</td>
                                        <td width="10%"> Ngày đăng</td>
                                        <td width="10%"> Tình trạng </td>
                                        <td width="10%"> Số LĐ đã tuyển</td>
                                        <td width="10%"> Chức năng </td>

                                    </thead>
                                    <tbody>
                                        <?php 
		foreach ($tds as $key=>$td ){
	?>
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
                                                <a href="{{ URL::to('tuyendung-fr') . '/' . $td->id }}" <?php if ($td->state != 1) {
                                                    echo "class='btn disabled'";
                                                } ?>>
                                                    Báo cáo kết quả
                                                </a>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
						{{-- </div> --}}
                    </div>
				</div>

                @endsection
