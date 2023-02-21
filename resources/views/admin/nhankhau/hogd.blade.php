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
            // $('#madv').change(function() {
            //     window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
            //         '&kydieutra=' + $('#kydieutra').val();
            // });
            // $('#kydieutra').change(function() {
            //     window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
            //         '&kydieutra=' + $('#kydieutra').val();
            // });

            $('#madv').change(function() {
                    window.location.href = "{{ $inputs['url'] }}" + '?madv=' +$('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen='+ $('#mahuyen').val();
            });
            $('#mahuyen').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen='+ $('#mahuyen').val();
            });
            $('#kydieutra').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val();
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
                        <h3 class="card-label text-uppercase">Danh sách hộ gia đình</h3>
                    </div>
                    <div class="card-toolbar">
                        <a onclick="themmoi()" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> &ensp;Thêm mới hộ</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        {{-- <div class="col-md-6">
                            <label style="font-weight: bold">Đơn vị</label>
                            {!! Form::select('madv', $a_dsdv, $inputs['madv'], ['class' => 'form-control', 'id' => 'madv']) !!}
                        </div>
                        <div class="col-md-6">
                            <label style="font-weight: bold">Kỳ điều tra</label>
                            {!! Form::select('kydieutra', $a_kydieutra, $inputs['kydieutra'], [
                                'class' => 'form-control',
                                'id' => 'kydieutra',
                            ]) !!}
                        </div> --}}
                            <div class="col-md-4">
                                <label style="font-weight: bold">Huyện</label>
                                <select name="mahuyen" id="mahuyen"  class="form-control select2basic">
                                    @foreach ($a_huyen as $key=>$ct )
                                        <option value="{{$key}}" {{isset($inputs['mahuyen'])?($inputs['mahuyen'] == $key?'selected':''):''}}>{{$ct}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label style="font-weight: bold">Xã</label>
                                <select name="madv" id="madv"  class="form-control select2basic">
                                    <option value="">----Chọn xã---</option>
                                    @foreach ($a_xa as $key=>$ct )
                                    <option value="{{$ct->madv}}" {{$ct->madv == $inputs['madv']?'selected':''}}>{{$ct->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label style="font-weight: bold">Kỳ điều tra</label>
    
                                <select name="kydieutra" id="kydieutra" onchange="kydieutra()" class="form-control select2basic">
                                    @foreach ($a_kydieutra as $key=>$ct )
                                        <option value="{{$key}}" {{$key == $inputs['kydieutra']?'selected':''}}>{{$ct}}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th width='20%'>Tên</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày sinh</th>
                                <th width='25%'>Thường trú</th>
                                <th width='18%'>Tình trạng việc làm</th>
                                <th width="10%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lds as $key => $ld)
                                <tr>
                                    <td>{{ ++$key }} </td>

                                    <td><a onclick="chitet('{{$ld->id}}','{{$ld->ho}}')">{{ $ld->hoten }}</a>
                                    </td>
                                    <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                    <td><span class="text-ellipsis"> </span>{{ $ld->ngaysinh }}</td>
                                    <td><span class="text-ellipsis"> </span>{{ $ld->thuongtru }}</td>

                                    <td><span class="text-ellipsis"> </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? ''  }}</td>
                                    <td >
                                        @if (chkPhanQuyen('danhsachhogiadinh', 'thaydoi'))
                                        <a onclick="chitiet('{{$ld->id}}','{{$ld->ho}}')" class="btn btn-sm btn-clean btn-icon" title="Danh sách nhân khẩu"><i class="icon-lg flaticon-list text-success"></i></a>
                                        @endif
                                        @if (chkPhanQuyen('danhsachhogiadinh', 'thaydoi'))
                                        <button title="Xóa hộ gia đình" type="button"
                                        onclick="cfDel('{{'/nhankhau/delete?madv='.$inputs['madv'].'&kydieutra='.$inputs['kydieutra'].'&mahuyen='.$inputs['mahuyen'].'&ho='.$ld->ho}}')"
                                        class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                        data-toggle="modal">
                                        <i class="icon-lg flaticon-delete text-danger"></i>
                                    </button>
                                    @endif
                                        {{-- <a href="{{ '/nhankhau-inhgd?id='.$ld->id }}" class="btn btn-sm mr-2"
                                            title="In danh sách" target="_blank">
                                            <i class="icon-lg la flaticon2-print text-dark"></i></a> --}}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
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
                                <div class="modal-body">
                                    <label> <b>Nếu xóa thì sẽ xóa tất cả các nhân khẩu của hộ gia đình</b></label>
                                </div>
        
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
            function chitiet(id,ho){
                var madv=$('#madv').val();
                var kydieutra=$('#kydieutra').val();
                var huyen=$('#mahuyen').val();
                var url='/nhankhau/ChiTietHoGiaDinh/'+id+'?soho='+ho+'&madv='+madv+'&kydieutra='+kydieutra+'&mahuyen='+huyen;
                window.location.href=url;
            }

            function themmoi(){
                var madv=$('#madv').val();
                var mahuyen=$('#mahuyen').val();
                var kydieutra=$('#kydieutra').val();
                url='/dieutra/create?madv='+madv+'&kydieutra='+kydieutra+'&mahuyen='+mahuyen;
                window.location.href = url;
            }
        </script>

    @endsection
