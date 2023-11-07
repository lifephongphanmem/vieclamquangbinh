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
                            <select name="trangthai" class="form-control">
                                <option value="0">Hồ sơ chưa xem</option>
                                <option value="1">Hồ sơ đã xem</option>
                            </select>
                        </div>

                    </div>
                    {{-- <div class="row "> --}}
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead class="text-center">
                            <td width="5%"> # </td>
                            <td width="20%"> Nội dung</td>
                            <td width="25%"> Vị trí</td>
                            <td width="8%"> Thời hạn</td>
                            <td width="8%"> Ngày đăng</td>
                            <td width="10%"> Tình trạng </td>
                            <td width="10%"> Số LĐ đã tuyển</td>
                            <td width="10%"> Chức năng </td>
                            <td width="6%"> Thao tác </td>
                        </thead>
                        <tbody>
                            {{-- <?php foreach ($tds as $key=>$td ){?>

                            <?php } ?> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
