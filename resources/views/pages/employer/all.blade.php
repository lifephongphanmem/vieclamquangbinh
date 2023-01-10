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
                        <h3 class="card-label text-uppercase"><?php switch ($action) {
                            case 'tamdung':
                                echo 'Tạm dừng';
                                break;
                            case 'kethuctamdung':
                                echo 'Kết thúc tạm dừng';
                                break;
                            case 'delete':
                                echo 'Báo giảm';
                                break;
                            case 'update':
                                echo 'Cập nhật';
                                break;
                        } ?></h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
				<div class="card-body">
                <form class="form-inline" method="GET">
                    <div class="row ">
                        <div class="col-sm-7 col-sm-offset-1">
                            <label>Lọc theo tình trạng</label>
                            <select class="input-sm form-control w-sm inline v-middle" name="state_filter"
                                onchange="this.form.submit()">
                                <option value="0">Tất cả</option>
                                <option value="1" <?php if ($state_filter == 1) {
                                    echo 'selected';
                                } ?>>Hoạt động</option>
                                <option value="2"<?php if ($state_filter == 2) {
                                    echo 'selected';
                                } ?>>Tạm dừng</option>
                            </select>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="function-search pull-right">
                                <div class="input-group">
                                    <input type="text" name="search" class="input-sm form-control"
                                        value="{{ $search }}" placeholder="Tìm theo Tên hoặc CCCD/CMND">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                {{-- <div class="row "> --}}
                        <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                                <td width="2%"> # </td>
                                <td width="15%"> Họ và tên</td>
                                <td width="13%"> Năm sinh</td>
                                <td width="10%"> Giới tính</td>
                                <td width="10%"> CMND/CCCD</td>
                                <td width="30%"> Địa chỉ</td>
                                <td width="10%"> Vị trí</td>
                                <td width="10%"> <?php if ($action) {
                                    echo 'Khai báo';
                                } else {
                                    echo 'Tình trạng';
                                } ?></td>

                            </thead>
                            <tbody>
                                <?php 
		foreach ($lds as $key=>$ld ){
			
	?>
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td> {{ $ld->hoten }}</td>
                                    <td> {{ getDayvn($ld->ngaysinh) }}</td>
                                    <td> {{ $ld->gioitinh == 'nam' || $ld->gioitinh == 'Nam' ? 'Nam' : 'Nữ' }}</td>
                                    <td> {{ $ld->cmnd }}</td>
                                    <td> {{ $ld->address }} {{ $ld->xa }} {{ $ld->huyen }}
                                        {{ $ld->tinh }}</td>
                                    <td> {{ $ld->vitri }}</td>
                                    <td>
                                        <a href="{{ URL::to('laodong-fe') . '/' . $ld->id . '/' . $action }}"
                                            <?php if (!$action) {
                                                echo "class='btn disabled'";
                                            } ?>>
                                            <?php
                                            switch ($action) {
                                                case 'tamdung':
                                                    echo 'Tạm dừng';
                                                    break;
                                                case 'kethuctamdung':
                                                    echo 'Kết thúc tạm dừng';
                                                    break;
                                                case 'delete':
                                                    echo 'Báo giảm';
                                                    break;
                                                case 'update':
                                                    echo 'Cập nhật';
                                                    break;
                                            
                                                default:
                                                    if ($ld->state == 1) {
                                                        echo 'Đang hoạt động';
                                                    }
                                                    if ($ld->state == 2) {
                                                        echo 'Đã tạm dừng';
                                                    }
                                                    if ($ld->state == 3) {
                                                        echo 'Đã báo giảm';
                                                    }
                                            } ?>

                                        </a>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
				</div>
            {{-- </div> --}}
        </div>
    @endsection
