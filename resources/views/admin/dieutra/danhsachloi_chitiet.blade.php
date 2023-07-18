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
                        <h3 class="card-label text-uppercase">Danh sách nhân khẩu lỗi - {{$loailoi}}</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{'/dieutra/danhsachloi/'.$inputs['id'].'?mahuyen='.$inputs['mahuyen'].'&kydieutra='.$inputs['kydieutra']}}" class="btn btn-xs btn-primary"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    </div>

                </div>
                <div class="card-body">                                                
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Tình trạng việc làm</th>
                                <th>Nơi làm việc</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
		foreach ($a_loi as $key=>$ld ){
	?>
                            <tr>
                                <td>{{ ++$key }} </td>
                                <td><a href="{{ URL::to('/nhankhau/ChiTiet/' . $ld->id.'?loailoi='.$inputs['loailoi'].'&id='.$inputs['id']).'&mahuyen='.$inputs['mahuyen']}}">{{ $ld->hoten }}</a></td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayVn($ld->ngaysinh) }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->thuongtru }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? '' }}
                                </td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->noilamviec }}</td>
                                <td class="text-ellipsis">
                                    <a href="{{'/nhankhau-innguoilaodong?id='.$ld->id}}" class="btn btn-sm mr-2" title="In thông tin" target="_blank">
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
