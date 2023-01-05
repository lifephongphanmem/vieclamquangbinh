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

            $('#madv').change(function() {
                // window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                //     '&kydieutra=' + $('#kydieutra').val();
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
            // getxa();
            // getdulieu();

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
                    <div class="form-group row">
                        {{-- <div class="col-md-4">
                            <label style="font-weight: bold">Đơn vị</label>
                            <select class="form-control select2basic" id="madv">
                                @foreach ($m_diaban->where('capdo','H') as $diaban)
                                    <optgroup label="{{ $diaban->name }}">
                                        <?php $a_xa=array_column($m_diaban->where('parent',$diaban->maquocgia)->toarray(),'id') ?>
                                        <?php $donvi = $m_donvi->wherein('madiaban', $a_xa); ?>
                                        @foreach ($donvi as $ct)
                                            <option {{ $ct->madv == $inputs['madv'] ? 'selected' : '' }}
                                                value="{{ $ct->madv }}">{{ $ct->tendv }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>

                            <select name="kydieutra" id="kydieutra" onchange="kydieutra()" class="form-control select2basic">
                                @foreach ($a_kydieutra as $key=>$ct )
                                    <option value="{{$key}}" {{$key == $inputs['kydieutra']?'selected':''}}>{{$ct}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-4 float-right" style="margin-left: 97%;margin-top: -2%">
                            <a href="#" title="In báo cáo chi tiết" data-target="#cungld-modal" data-toggle="modal"
                                class="btn btn-sm btn-clean btn-icon">
                                <i class="icon-lg la flaticon2-print text-primary"></i>
                            </a>
                        </div>
                    </div>
                    <div class="form-group row">
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
                    {{-- <form class="form-inline" method="GET">
                        <div class="row col-xl-4">
                            <div class="col-xl-12 m-b-xs">
                                <select class="form-control select2basic" name="huyen" id='huyen'>
                                    <?php foreach ($dmhc as $dv){
						if ($dv->level == 'Huyện' || $dv->level == 'Thành phố'||$dv->level =="Thị xã"){
						?>
                                    <option value='{{ $dv->maquocgia }}'>{{ $dv->name }}</option>
                                    <?php  }}?>

                                </select>

                                <select class=" form-control select2basic" name="xa" id="xa">
                                    <?php foreach ($dmhc as $dv){
						if ($dv->level =="Xã"||$dv->level =="Phường"||$dv->level =="Thị trấn"){
						?>
                                    <option class="{{ $dv->parent }}" value='{{ $dv->maquocgia }}'>{{ $dv->name }}
                                    </option>
                                    <?php } }?>


                                </select>
                                <script>
                                    var xa = $("[name=xa] option").detach()
                                    $("[name=huyen]").change(function() {
                                        var val = $(this).val()
                                        $("[name=xa] option").detach()
                                        xa.filter("." + val).clone().appendTo("[name=xa]")
                                    }).change()
                                </script>

                            </div>
                        </div>
                        <div class="row col-xl-8">
                            <div class="col-xl-2 m-b-xs">
                                <select name="gioitinh_filter" class="form-control select2basic"
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

                            <div class="col-xl-2 m-b-xs">
                                <select name="age_filter" class="form-control select2basic" onchange="this.form.submit()">
                                    <option value="0"> Lọc theo độ tuổi </option>
                                    <option value="35"<?php if ($age_filter == '35') {
                                        echo 'selected';
                                    } ?>> 35 tuổi trở lên </option>


                                </select>
                            </div>
                            <div class="col-xl-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search" name="search"
                                        value="{{ $search }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit">Tìm kiếm</button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-2 m-b-xs">
                                <button class="btn btn-sm btn-default" name="export" value="1" type="submit">Xuất
                                    Excel</button>
                            </div>
                        </div>
                    </form> --}}
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
		foreach ($lds as $key=>$ld ){
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
        <div id="cungld-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
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
        </div>

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

            function getdulieu()
            {
                madv=$('#madv').val();
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + madv +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen='+$('#mahuyen').val();
                    // $('#madv option[value=' + madv + ' ]').attr('selected', 'selected');
                    // getxa();
            }
        </script>
    @endsection
