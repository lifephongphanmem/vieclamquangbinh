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
                                <select class="form-control select2basic">
                                    <option value="0">Khai báo biến động</option>
                                    <option value="1">Đã khai báo</option>
                                    <option value="2">Chưa khai báo</option>

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
                            <th>Mã DN</th>
                            <th>Tên doanh nghiệp</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th>Quy mô</th>
                            <th>Tình trạng</th>
                            <th>Biến động</th>
                            <th>Tuyển dụng </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
		$i=($ctys->currentPage()-1)*$ctys->perPage();
		foreach ($ctys as $cty ){
			$i++;
	?>
                        <tr>
                            <td>{{ $i }} </td>
                            <td>{{ $cty->masodn }}</td>
                            <td><a href="{{ URL::to('doanhnghiep-be/' . $cty->id) }}">{{ $cty->name }}</a></td>
                            <td><span class="text-ellipsis"> </span> {{ $cty->adress }} - {{ $cty->xa }} -
                                {{ $cty->huyen }}</td>
                            <td><span class="text-ellipsis"> </span>{{ $cty->phone }}</td>
                            <td><span class="text-ellipsis"> </span>{{ $cty->employers_count }}</td>
                            <td><span class="text-ellipsis">
                                    <?php if ($cty->public==1){ 
				?>
                                    <i class="fa fa-check text-success text-active"></i>
                                    <?php }else{ ?>
                                    <i class="fa fa-close text-success text-active" style="color:red"></i>

                                    <?php }?></span>
                            </td>
                            <td><span class="text-ellipsis"> </span>Khai báo</td>
                            <td><span class="text-ellipsis"> </span><a href="{{ URL::to('tuyendung-ba/' . $cty->id) }}">Tin
                                    tuyển dụng</a></td>
                        </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
