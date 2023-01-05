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

<script>
    jQuery(document).ready(function() {
        TableManaged3.init();

        $('#type_filter').change(function() {
            window.location.href = "{{ $inputs['url'] }}" + '?type_filter='+ $('#type_filter').val() + '&search=' + $('#search').val();
        });

    });
</script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách khai báo</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        {{-- <form class="form-inline" method="GET"> --}}
                        {{-- <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs">
                                <div class="input-group">
                                    <input type="month" name="time_filter" value="{{ $time_filter }}"
                                        class="form-control " onchange="this.form.submit();" />
                                </div>
                            </div>
                            <div class="col-sm-2 m-b-xs">
                                <select class=" form-control select2basic" name="type_filter"
                                    onchange="this.form.submit()">
                                    <option value="0">Tất cả khai báo</option>
                                    <option value="baotang" <?php if ($type_filter == 'baotang') {
                                        echo 'selected';
                                    } ?>>Báo tăng</option>
                                    <option value="baogiam"<?php if ($type_filter == 'baogiam') {
                                        echo 'selected';
                                    } ?>>Báo giảm</option>
                                    <option value="tamdung"<?php if ($type_filter == 'tamdung') {
                                        echo 'selected';
                                    } ?>>Tạm dừng</option>
                                    <option value="ketthuctamdung"<?php if ($type_filter == 'kethuctamdung') {
                                        echo 'selected';
                                    } ?>>Kết thúc tạm dừng</option>
                                    <option value="updateinfo"<?php if ($type_filter == 'updateinfo') {
                                        echo 'selected';
                                    } ?>>Thay đổi thông tin</option>

                                </select>
                            </div> --}}


                        <div class="col-md-4">
                            <label>Từ ngày</label>
                            <input type="date" class="form-control" name='tungay'>
                        </div>
                        <div class="col-md-4">
                            <label for="">Đến ngày</label>
                            <input type="date" class="form-control" name='denngay'>
                        </div>
                        <div class="col-md-4">

                            {{-- <div class="col-sm-2 m-b-xs"> --}}
                            <label for="">Loại khai báo</label>
                            <select class=" form-control select2basic" name="type_filter" id="type_filter" onchange="this.form.submit()">
                                <option value="0">Tất cả khai báo</option>
                                <option value="baotang" <?php if ($type_filter == 'baotang') {
                                    echo 'selected';
                                } ?>>Báo tăng</option>
                                <option value="baogiam"<?php if ($type_filter == 'baogiam') {
                                    echo 'selected';
                                } ?>>Báo giảm</option>
                                <option value="tamdung"<?php if ($type_filter == 'tamdung') {
                                    echo 'selected';
                                } ?>>Tạm dừng</option>
                                <option value="ketthuctamdung"<?php if ($type_filter == 'kethuctamdung') {
                                    echo 'selected';
                                } ?>>Kết thúc tạm dừng</option>
                                <option value="updateinfo"<?php if ($type_filter == 'updateinfo') {
                                    echo 'selected';
                                } ?>>Thay đổi thông tin</option>

                            </select>
                            {{-- </div> --}}
                        </div>
                        {{-- </form> --}}
                    </div>
                    {{-- <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" id="search" name="search"
                                        value="{{ $search }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                                    </span>
                                </div>
                            </div> --}}
                    {{-- </div> --}}

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <td width="5%"> # </td>
                                <td width="20%">Công ty</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 

		foreach ($reports as $key=>$rp ){

	?>
                            <td>{{ ++$key }}</td>
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
                                    case 'import':
                                        echo 'Nhập từ file Excel';
                                        break;
                                    case 'nothing':
                                        echo 'Không có biến động';
                                        break;
                                } ?>
                            </td>
                            <td>
                                <?php if ($rp->datatable == 'company') {
                                    echo 'Thông tin doanh nghiệp';
                                } elseif ($rp->datatable == 'nguoilaodong') {
                                    echo 'Người lao động';
                                }
                                ?>
                            </td>
                            <td> {{ $rp->numrow }}</td>
                            <td> {{ $rp->note }}</td>
                            <td> {{ $rp->time }}</td>
                            <td> {{ $rp->ctyname }}</td>
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
