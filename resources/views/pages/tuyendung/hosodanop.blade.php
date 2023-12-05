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
        });

        $('#trangthai').change(function() {
            window.location.href = 'tuyendung-hosodanop?trangthai=' + $('#trangthai').val();
              
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Hồ sơ ứng tuyển </h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Vị trí tuyển dụng:</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label>Lịch sử trạng thái:</label>
                            <select name="trangthai" id="trangthai" class="form-control">
                                <option value="">Tất cả</option>
                                <option value="0" {{ $inputs['trangthai'] == '0' ? 'selected' : '' }}>Hồ sơ chưa xem
                                </option>
                                <option value="1" {{ $inputs['trangthai'] == '1' ? 'selected' : '' }}>Hồ sơ đã xem
                                </option>
                            </select>
                        </div>

                    </div>
                    {{-- <div class="row "> --}}
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead class="text-center">
                            <th width="5%"> # </th>
                            <th> Vị trí ứng tuyển</th>
                            <th> Họ tên ứng viên</th>
                            <th> Ngày ứng tuyển</th>
                            <th width="10%"> Trạng thái</th>
                            <th width="5%"> Xem CV </th>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $item)
                                <tr>
                                    <td style="text-align: center">{{ ++$key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->hoten }}</td>
                                    <td style="text-align: center">{{ getDayVn($item->created_at) }}</td>
                                    <td style="text-align: center">{{ $item->trangthai == 0 ? 'Chưa xem' : 'Đã xem' }}</td>
                                    <td style="text-align: center">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
