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
                        <h3 class="card-label text-uppercase">Danh sách người lao động</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-inline" method="GET">
                        <div class="row w3-res-tb" style="margin-bottom: 0.8%">
                            <div class="col-sm-2 m-b-xs" style="margin-right:10%">
                                <select name="gioitinh_filter" class=" form-control w-sm inline v-middle"
                                    onchange="this.form.submit()">
                                    <option value="0"> Chọn giới tính </option>
                                    <option value="Nam" <?php if ($gioitinh_filter == 'Nam') {
                                        echo 'selected';
                                    } ?>>Nam</option>
                                    <option value="Nữ" <?php if ($gioitinh_filter == 'Nữ') {
                                        echo 'selected';
                                    } ?>>Nữ</option>

                                </select>
                            </div>

                            <div class="col-sm-2 m-b-xs mr-5" style="margin-right: 7%">
                                <select name="state_filter" class=" form-control w-sm inline v-middle"
                                    onchange="this.form.submit()">
                                    <option value="0" <?php if ($state_filter == '0') {
                                        echo 'selected';
                                    } ?>> Chọn tình trạng </option>
                                    <option value="1" <?php if ($state_filter == '1') {
                                        echo 'selected';
                                    } ?>> Hoạt động </option>
                                    <option value="2" <?php if ($state_filter == '2') {
                                        echo 'selected';
                                    } ?>> Tạm dừng </option>
                                    <option value="3" <?php if ($state_filter == '3') {
                                        echo 'selected';
                                    } ?>> Đang thất nghiệp </option>

                                </select>
                            </div>
                            <div class="col-sm-2 m-b-xs"  style="margin-left: 11%">
                                <select name="age_filter" class=" form-control w-sm inline v-middle"
                                    onchange="this.form.submit()">
                                    <option value="0"> Lọc theo độ tuổi </option>
                                    <option value="35"<?php if ($age_filter == '35') {
                                        echo 'selected';
                                    } ?>> 35 tuổi trở lên </option>


                                </select>
                            </div>
                           
                            {{-- <div class="col-sm-2 m-b-xs" style="margin-left: 10%">
                                <button class="btn btn-sm btn-default" name="export" value="1" type="submit">Xuất
                                    Excel</button>
                            </div> --}}
                        </div>
                    </form>


                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>CMND</th>
                                <th>Ngày sinh</th>
                                <th>Công ty</th>
                                <th>Tỉnh</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 

		foreach ($lds as $key=>$ld ){
	?>
                            <tr>
                                <td>{{ ++$key }} </td>

                                <td><a href="{{ '/nguoilaodong/ChiTiet/' . $ld->id }}">{{ $ld->hoten }}</a></td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cmnd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayVn($ld->ngaysinh) }}</td>
                                {{-- <td><span class="text-ellipsis"> </span>{{ $ld->ctyname }}</td> --}}
                                <td><span class="text-ellipsis"> </span>{{ $ld->company != null?$a_congty[$ld->company]:'' }}</td>

                                <td><span class="text-ellipsis"> </span>{{ $ld->tinh }}</td>
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
