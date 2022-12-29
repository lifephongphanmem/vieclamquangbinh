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
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách điều tra</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <button title="In tổng hợp" data-target="#modify-modal-in" data-toggle="modal"
                            class="btn btn-sm btn-success" onclick="intonghop()">
                            <i class="icon-lg la flaticon2-print"></i> In tổng hợp
                        </button> --}}
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
                        </div>
                        <div class="col-md-4">
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
                                    <option value="">----Chọn xã ---</option>
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

                        {{-- <div class="col-md-4 float-right">
                        </div> --}}
                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    STT
                                </th>
                                <th>Xã</th>
                                <th>Huyện</th>
                                <th>Số lượng</th>
                                <th>Số lượng lỗi</th>
                                <th>Số hộ</th>
                                <th>Kỳ</th>
                                <th>Ngày đăng</th>
                                <th>Người cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
			$dmhc_names=array();
		foreach ($dmhc_list as $dm) {
			$dmhc_names[$dm->maquocgia]=$dm->name;
		}
		foreach ($dss as $key=>$td ){
	?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $dmhc_names[$td->xa] }}</td>
                                <td>{{ $dmhc_names[$td->huyen] }}</td>
                                <td><a href="#">{{ $td->soluong }} </a></td>
                                <td><a href="#">{{ count($data_loi->where('madv',$td->user_id)) }} </a></td>
                                <td><a href="#">{{ $td->soho }} </a></td>
                                <td>{{ $td->kydieutra }}</td>
                                <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($td->created_at)) }}</span></td>
                                {{-- <td><span class="text-ellipsis">{{ $td->user_id != null?$a_donvi[$td->user_id]:'' }} </span></td> --}}
                                <td><span class="text-ellipsis">Trung tâm dịch vụ việc làm Quảng Bình </span></td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- modal in tổng hợp -->
        <form method="POST" action="" accept-charset="UTF-8" id="frm_modify_in" target="_blank">
            @csrf
            <div id="modify-modal-in" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">In tổng hợp</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 mb-2">
                                <label class="control-label">Đơn vị</label>
                                {{-- {!! Form::select('tinhtrangvl', setArray($a_tinhtrangvl,'Tất cả',null), ['id' => 'tinhtrangvl', 'class' => 'form-control select2basic']) !!} --}}
                                <select name="madv" id="" class="form-control select2basic" style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($a_dsdv as $key => $ct)
                                        <option value="{{ $key }}">{{ $ct }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="hidden" name='math' id='math'> --}}
                            </div>
                            <div class="col-lg-12">
                                <label class="control-label">Kỳ điều tra</label>
                                <select name="kydieutra" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($a_kydieutra as $key => $ct)
                                        <option value="{{ $key }}">{{ $ct }}</option>
                                    @endforeach
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

        <script>
            function intonghop() {
                var url = '/dieutra/intonghop'
                $('#frm_modify_in').attr('action', url);
            }
        </script>
    @endsection
