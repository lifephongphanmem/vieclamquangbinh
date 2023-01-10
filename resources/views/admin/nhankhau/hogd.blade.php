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
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val();
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
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label style="font-weight: bold">Đơn vị</label>
                            {!! Form::select('madv', $a_dsdv, $inputs['madv'], ['class' => 'form-control', 'id' => 'madv']) !!}
                        </div>
                        <div class="col-md-6">
                            <label style="font-weight: bold">Kỳ điều tra</label>
                            {!! Form::select('kydieutra', $a_kydieutra, $inputs['kydieutra'], [
                                'class' => 'form-control',
                                'id' => 'kydieutra',
                            ]) !!}
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
                                <th>Nơi làm việc</th>
                                <th>thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($lds as $key => $ld)
                                <tr>
                                    <td>{{ ++$key }} </td>

                                    <td><a
                                            href="{{ URL::to('/nhankhau/ChiTietHoGiaDinh/' . $ld->id) }}">{{ $ld->hoten }}</a>
                                    </td>
                                    <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                    <td><span class="text-ellipsis"> </span>{{ $ld->ngaysinh }}</td>
                                    <td><span class="text-ellipsis"> </span>{{ $ld->diachi }}</td>

                                    <td><span class="text-ellipsis"> </span>{{ $ld->noilamviec }}</td>
                                    <td class="text-ellipsis">
                                        <a href="{{ '/nhankhau-inhgd?id='.$ld->id }}" class="btn btn-sm mr-2"
                                            title="In danh sách" target="_blank">
                                            <i class="icon-lg la flaticon2-print text-dark"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
