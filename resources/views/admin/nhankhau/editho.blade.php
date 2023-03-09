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
                    @if (chkPhanQuyen('danhsachnhankhau', 'thaydoi'))
                    <div class="card-toolbar">
                        <a onclick="themmoi('{{$inputs['soho']}}','{{$inputs['madv']}}','{{$inputs['kydieutra']}}','{{$inputs['nkid']}}')" class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i> &ensp;Thêm thành viên</a>
                        <a onclick="history.back()" class="btn btn-xs btn-primary"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                  <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày sinh</th>
                                <th>MQH</th>
                                <th>Tình trạng việc làm</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
		foreach ($lds as $key=>$ld ){

	?>
                            <tr>
                                <td>{{ ++$key }} </td>

                                <td><a href="{{ URL::to('/nhankhau/ChiTiet/' . $ld->id.'?mahuyen='.$inputs['mahuyen'].'&view=ho'.'&kydieutra='.$inputs['kydieutra']) }}">{{ $ld->hoten }}</a></td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->ngaysinh }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->mqh }}</td>

                                <td><span class="text-ellipsis"> </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? '' }}</td>
                                <td>
                                    @if (chkPhanQuyen('danhsachnhankhau', 'thaydoi'))
                                    <button title="Xóa nhân khẩu" type="button"
                                    onclick="cfDel('{{'/nhankhau/XoaNhanKhau/'.$ld->id.'?mahuyen='.$inputs['mahuyen'].'&kydieutra='.$inputs['kydieutra']}}')"
                                    class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                    data-toggle="modal">
                                    <i class="icon-lg flaticon-delete text-danger"></i>
                                </button>
                                @endif
                                </td>
                 
                            </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
                <!--Model delete-->
                <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                    <form id="frmDelete" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header modal-header-primary">
                                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xóa</h4>
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                </div>
                                {{-- <div class="modal-body">
                                    <label> <b>Nếu xóa thì sẽ xóa tất cả các nhân khẩu của hộ gia đình</b></label>
                                </div> --}}
        
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                                    <button type="submit" onclick="subDel()" data-dismiss="modal" class="btn btn-primary">Đồng
                                        ý</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        <script>
            function cfDel(url) {
                $('#frmDelete').attr('action', url);
            }

            function subDel() {
                $('#frmDelete').submit();
            }
        function themmoi(soho,madv,kydieutra,nkid){
            huyen=$('#huyen').val();
            xa=$('#xa').val();
            url='/dieutra/create?madv='+madv+'&kydieutra='+kydieutra+'&huyen='+huyen+'&xa='+xa+'&soho='+soho+'&nkid='+nkid;
            window.location.href = url;
        }
    </script>

@endsection
