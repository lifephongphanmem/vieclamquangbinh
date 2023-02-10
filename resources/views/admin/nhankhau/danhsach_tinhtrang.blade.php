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
                        <h3 class="card-label text-uppercase">Danh sách nhân khẩu</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{URL::to('nhankhau-ba') }}" class="btn btn-xs btn-success"><i class="fa fa-file-import"></i> &ensp;Nhận excel</a> --}}
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
		foreach ($model as $key=>$ld ){
	?>
                            <tr>
                                <td>{{ ++$key }} </td>
                                <td><a href="{{ URL::to('/nhankhau/ChiTiet/' . $ld->id) }}">{{ $ld->hoten }}</a></td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayVn($ld->ngaysinh) }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->thuongtru }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? '' }}
                                </td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->noilamviec }}</td>
                                <td class="text-ellipsis">
                                    <a href="{{'/nhankhau-innguoilaodong?id='.$ld->id}}" class="btn btn-sm mr-2" title="In danh sách" target="_blank">
                                        <i class="icon-lg la flaticon2-print text-dark"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        {{-- modal --}}
        {{-- <div id="cungld-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <form id="frm_cungld" method="get" accept-charset="UTF-8" action="{{ '/nhankhau-in' }}" target="_blank">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">Báo cáo chi tiết nhân khẩu</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        </div>
                        <div class="modal-body">

                            <div class="col-xl-12">
                                <div class="form-group fv-plugins-icon-container">
                                    <label><b>Đơn vị</b></label><br>
                                    <select style="width: 100%" class="col-xl-12 select2basic form-control" id="user_id"
                                        name="user_id">
                                        @foreach ($dmdonvi as $dv)
                                            <option value="{{ $dv->madv }}">{{ $dv->tendv }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="form-group fv-plugins-icon-container">
                                    <label style="font-weight:bold;">Kỳ Điều tra</label><br>
                                    <select style="width: 100%" class="col-xl-12 select2basic form-control" id="danhsach_id"
                                        name="danhsach_id">
                                        @foreach ($danhsach as $ds)
                                            <option value="{{ $ds->id }}">{{ $ds->kydieutra }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                            <button type="submit" class="btn btn-primary">Đồng
                                ý gửi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> --}}

        <script>
            function getxa() {
                var madv=$('#mdv').val;
                var url='/nhankhau/get_xa?madv='+madv;
                var mahuyen = $('#mahuyen').val();
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahuyen: mahuyen
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data);
                        $('#madv').find('.xa').remove();
                        $('#madv').append(data);
                    },
                    error: function(message) {
                        toastr.error(message, 'Lỗi!');
                    }
                });
            };

        </script>
    @endsection
