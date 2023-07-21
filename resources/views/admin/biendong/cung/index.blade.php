{{-- @extends ('admin.layout') --}}
@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
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
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val() +
                    '&loaibiendong=' + $('#loaibiendong').val();
            });
            $('#mahuyen').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val() +
                    '&loaibiendong=' + $('#loaibiendong').val();
            });
            $('#kydieutra').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&loaibiendong=' + $('#loaibiendong').val();
            });
            $('#loaibiendong').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&loaibiendong=' + $('#loaibiendong').val();
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
                        <h3 class="card-label text-uppercase">Danh sách nhân khẩu biến động</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{URL::to('nhankhau-ba') }}" class="btn btn-xs btn-success"><i class="fa fa-file-import"></i> &ensp;Nhận excel</a> --}}
                        <label class="mt-3 mr-5 text-bold" for=""style="font-weight: bold">Số lượng :</label> <input
                            type="text" value="{{ count($model) }}" style="width:35%;text-align:center"
                            class="form-control" readonly>
                    </div>

                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label style="font-weight: bold">Loại biến động</label>
                            <select name="loaibiendong" id="loaibiendong" class="form-control select2basic">
                                <option value="">Tất cả</option>
                                @foreach ($a_loaibiendong as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ isset($inputs['loaibiendong']) ? ($inputs['loaibiendong'] == $key ? 'selected' : '') : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label style="font-weight: bold">Kỳ điều tra</label>

                            <select name="kydieutra" id="kydieutra" onchange="kydieutra()"
                                class="form-control select2basic">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}" {{ $key == $inputs['kydieutra'] ? 'selected' : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label style="font-weight: bold">Xã</label>
                            <select name="madv" id="madv" class="form-control select2basic">
                                @if (in_array(session('admin')->capdo, ['T', 'H']))
                                    <option value="">----Chọn xã---</option>
                                @endif

                                @foreach ($a_xa as $key => $ct)
                                    <option value="{{ $ct->madv }}" {{ $ct->madv == $inputs['madv'] ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label style="font-weight: bold">Huyện</label>
                            <select name="mahuyen" id="mahuyen" class="form-control select2basic">
                                @foreach ($a_huyen as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ isset($inputs['mahuyen']) ? ($inputs['mahuyen'] == $key ? 'selected' : '') : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                {{-- <th>Tình trạng việc làm</th> --}}
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian cập nhật</th>
                                {{-- <th>Thao tác</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
		                foreach ($model as $key=>$ld ){
	                        ?>
                            <tr>
                                <td>{{ ++$key }} </td>
                                <td><a
                                        href="{{ URL::to('/biendong/thongtinthaydoi/' . $ld->id . '?mahuyen=' . $inputs['mahuyen'] . '&view=nhankhau') }}">{{ $ld->hoten }}</a>
                                </td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayVn($ld->ngaysinh) }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->diachi }}</td>
                                {{-- <td><span class="text-ellipsis">
                                    </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? '' }}
                                </td> --}}
                                <td><span class="text-ellipsis">
                                    </span>{{ \Carbon\Carbon::parse($ld->created_at)->format('d/m/Y') }}</td>
                                <td><span class="text-ellipsis">
                                    </span>{{ \Carbon\Carbon::parse($ld->updated_at)->format('d/m/Y') }}</td>
                                {{-- <td class="text-ellipsis">
                                    <a href="{{'/nhankhau-innguoilaodong?id='.$ld->id}}" class="btn btn-sm mr-2" title="In danh sách" target="_blank">
                                        <i class="icon-lg la flaticon2-print text-dark"></i></a>
                                </td> --}}
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




        <script>
            function getxa() {
                var madv = $('#mdv').val;
                var url = '/nhankhau/get_xa?madv=' + madv;
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

            function getdulieu() {
                madv = $('#madv').val();
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + madv +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
                // $('#madv option[value=' + madv + ' ]').attr('selected', 'selected');
                // getxa();
            }
        </script>
    @endsection
