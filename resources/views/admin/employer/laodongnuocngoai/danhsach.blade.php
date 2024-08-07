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
                    <div class="card-toolbar">
                        <a href="{{ '/laodongnuocngoai/indanhsach' }}" target="_bank" class="btn btn-xs btn-success"><i class="icon-lg la flaticon2-print text-primary"></i>
                            In danh sách</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>Số Hộ Chiếu</th>
                                <th>Ngày sinh</th>
                                <th>Công ty</th>
                                <th>Quốc Tịch</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
 
		foreach ($model as $key=>$ld ){
	?>
                            <tr>
                                <td>{{ ++$key }} </td>

                                <td><a href="{{ '/nguoilaodong/ChiTiet/' . $ld->id }}">{{ $ld->hoten }}</a></td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cmnd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayvn($ld->ngaysinh) }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->ctyname }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->nation }}</td>
                                <td>
                                    <a href="{{ '/vanban/thong_tin_nguoi_lao_dong_nuoc_ngoai?id='.$ld->id  }}" class="btn btn-sm mr-2" title="In thông tin" target="_blank">
                                        <i class="icon-lg la flaticon2-print text-dark"></i></a>
                                </td>
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
