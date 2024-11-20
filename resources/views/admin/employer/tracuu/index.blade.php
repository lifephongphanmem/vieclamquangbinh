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
                            <label style="font-weight: bold">Họ và tên</label>
                            <input type="text" class="form-control" name='hoten' id='hoten'>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">CCCD/CMND</label>
                            <input type="text" class="form-control" name='cmnd' id='cccd'>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Doanh nghiệp</label>

                            <select name="company" id="company" class="form-control">
                                <option value="ALL">-- Chọn doanh nghiệp ---</option>
                                @foreach ($company as $k=>$ct)
                                    <option value="{{$k}}">{{$ct}}</option>
                                @endforeach         
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Giới tính</label>

                            <select name="gioitinh" id="gioitinh" class="form-control">
                                <option value="ALL">--Chọn giới tính--</option>       
                                <option value="nam">Nam</option>       
                                <option value="nu">Nữ</option>       
                            </select>
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
                                        <th>Tên</th>
                                        <th>CMND/CCCD</th>
                                        <th>Ngày sinh</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th>
                                        <th>Doanh nghiệp</th>
                                        {{-- <th>Tình trạng việc làm</th>
                                <th>Nơi làm việc</th> --}}
                                        <th>Thao tác</th>
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
        $('#gioitinh, #company, #cccd').change(function() {
            //Xử lý hàm ajax tìm kiếm
            gioitinh = $('#gioitinh').val();
            company = $('#company').val();
            cccd = $('#cccd').val();
            hoten = $('#hoten').val();
            //    console.log(madv)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/nguoilaodong/TraCuu',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    gioitinh: gioitinh,
                    company: company,
                    cccd: cccd,
                    hoten: hoten,

                },
                dataType: 'JSON',
                success: function(data) {
                    // console.log(data);
                    $('#ketqua').replaceWith(data);
                    TableManaged3.init();
                },
                // error: function(message) {
                //     toastr.error(message, 'Lỗi!');
                // }
            });

        })

        $('#hoten').keyup(function() {
            //Xử lý hàm ajax tìm kiếm
            gioitinh = $('#gioitinh').val();
            company = $('#company').val();
            cccd = $('#cccd').val();
            hoten = $('#hoten').val();
            //    console.log(madv)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/nguoilaodong/TraCuu',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    gioitinh: gioitinh,
                    company: company,
                    cccd: cccd,
                    hoten: hoten,

                },
                dataType: 'JSON',
                success: function(data) {
                    // console.log(data);
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
