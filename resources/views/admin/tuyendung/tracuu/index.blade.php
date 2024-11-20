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


        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Thông tin tra cứu</h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name=madv  id='madv'>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Doanh nghiệp</label>
                            <input type="text" class="form-control" name='company' id='company'>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Tên công việc</label>
                            <input type="text" class="form-control" name='noidung' id='noidung'>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Vị trí</label>
                            <input type="text" class="form-control" name='vitri' id='vitri'>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Hạn nộp hồ sơ</label>
                            <input type="date" class="form-control" name='hannop' id='hannop'>
                        </div>

                    </div>
                    <hr>
                    <div class="row" id="ketqua">
                        <div class="col-md-12">
                            <table id="sample_3"
                                class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr class="text-center">
                                        <th width="5%"> STT </th>
                                        <th>Doanh nghiệp</th>
                                        <th>Tên công việc</th>
                                        <th>Vị trí</th>
                                        <th>Số lượng</th>
                                        <th>Ngày đăng</th>
                                        <th>Hạn cuối</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#hannop').change(function() {
            //Xử lý hàm ajax tìm kiếm
            company = $('#company').val();
            noidung = $('#noidung').val();
            vitri = $('#vitri').val();
            hannop = $('#hannop').val();
            //    console.log(madv)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/tuyendung/TraCuu',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    noidung: noidung,
                    company: company,
                    vitri: vitri,
                    hannop: hannop,

                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#ketqua').replaceWith(data);
                    TableManaged3.init();
                },
                // error: function(message) {
                //     toastr.error(message, 'Lỗi!');
                // }
            });

        })

        $('#company, #noidung, #vitri').keyup(function() {
            //Xử lý hàm ajax tìm kiếm
            company = $('#company').val();
            noidung = $('#noidung').val();
            vitri = $('#vitri').val();
            hannop = $('#hannop').val();
            //    console.log(madv)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/tuyendung/TraCuu',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    noidung: noidung,
                    company: company,
                    vitri: vitri,
                    hannop: hannop,

                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#ketqua').replaceWith(data);
                    TableManaged3.init();
                },
                // error: function(message) {
                //     toastr.error(message, 'Lỗi!');
                // }
            });

        })
    </script>
@endsection
