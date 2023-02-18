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
                        <h3 class="card-label text-uppercase">Danh sách khai báo</h3>
                    </div>

                    <div class="card-toolbar">
                        <a href="" data-target="#moda-indetail" data-toggle="modal" class="btn btn-xs btn-success" style="margin-right: 5px">
                            &ensp;in danh sách</a></i>
                        <a href="{{ URL::to($url) }}" class="btn btn-xs btn-success"><i class="fa fa-undo">
                                &ensp;Trở về</a></i>

                    </div>
                </div>
                <div class="card-body">

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <td width="5%"> # </td>
                                <td width="10%"> Loại</td>
                                <td width="10%"> Đối tượng</td>
                                <td width="5%"> Số lượng</td>
                                <td width="30%"> Mô tả</td>
                                <td width="20%"> Thời gian</td>
                                <td width="20%">Công ty</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 

		foreach ($reports as $key=>$rp ){

	?>
                            <tr>
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


    <!-- modal  -->
    <form method="get" action="{{ '/report-detail-in' }}" accept-charset="UTF-8" id="frm_indetail" target="_blank">
        @csrf
        <div id="moda-indetail" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In khai báo</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <input id="user" name="user" value="{{ $user_id }}" hidden>
                        <input id="tungay" name="tungay" value="{{ $tungay }}" hidden>
                        <input id="denngay" name="denngay" value="{{ $denngay }}" hidden>
                        <div class="col-lg-12">
                            <label class="control-label">Chọn loại khai báo</label>
                            <select name="loaikhaibao" id="loaikhaibao" class="form-control">
                                <option value="baotang">Báo tăng</option>
                                <option value="baogiam">Báo giảm</option>
                                <option value="tamdung">Tạm dừng</option>
                                <option value="kethuctamdung">Kết thúc tạm dừng</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
