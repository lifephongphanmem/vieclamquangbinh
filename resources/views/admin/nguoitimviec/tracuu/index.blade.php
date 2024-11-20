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
                    <input type="hidden" name=madv value={{ $inputs['madv'] }} id='madv'>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Họ và tên</label>
                            <input type="text" class="form-control" name='hoten' id='hoten'>
                        </div>
                        {{-- <div class="col-md-4">
                            <label style="font-weight: bold">CCCD/CMND</label>
                            <input type="text" class="form-control" name='cccd' id='cccd'>
                        </div> --}}
                        <div class="col-md-4">
                            <label style="font-weight: bold">Vị trí</label>
                            <input type="text" class="form-control" name='vitri' id='vitri'>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Kinh nghiệm</label>
                            <input type="text" class="form-control" name='kinhnghiem' id='kinhnghiem'>
                        </div>
                        {{-- <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>

                            <select name="kydieutra" id="kydieutra" class="form-control select2basic">
                                @foreach (getNam() as $ct)
                                    <option value="{{ $ct }}" {{ $ct == date('Y') ? 'selected' : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="col-md-4">
                            <label><b>Trình độ</b></label>
                            <select class="form-control" name="trinhdo">
                                <option value="daihoc">Không yêu cầu</option>
                                <option value="daihoc">Đại học</option>
                                <option value="caodang">Cao đẳng</option>
                                <option value="trungcap">Trung cấp</option>
                                <option value="cap3">Tốt nghiệp cấp 3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><b>Hình thức làm việc</b></label>
                            <select class="form-control" name="hinhthuclamviec">
                                <option value="0">Toàn thời gian</option>
                                <option value="1">Bán thời gian</option>
                                <option value="2">Theo ca</option>
                            </select>
                        </div>

                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Việc làm mong muốn</label>

                            <select name="vieclammongmuon" class="form-control" id='vieclammongmuon'>
                                <option value="ALL">--- Chọn việc làm mong muốn ---</option>
                                <option value="3">Trường hợp chọn cả 2</option>
                                <option value="1">Trong
                                    tỉnh,
                                    trong nước</option>
                                <option value="2">Đi
                                    làm việc
                                    ở nước ngoài</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label style="font-weight: bold">Tình trạng hoạt động kinh tế</label>
                            <select name="tinhtranghdkt" class="form-control selec2basic" id='tinhtranghdkt'>
                                <option value="ALL">Tất cả</option>
                                @foreach ($m_tinhtrangvl as $val)
                                    <option value="{{ $val->stt }}">{{ $val->tentgkt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <hr>
                    <div class="row" id="ketqua">
                        <div class="col-md-12">
                            <table id="sample_3"
                                class="table table-striped table-bordered table-hover dataTable no-footer">
                                <thead>
                                    <tr class="text-center">
                                        <th width="5%"> STT </th>
                                        <th>Tên</th>
                                        {{-- <th>CMND/CCCD</th>
                                        <th>Ngày sinh</th>
                                        <th>Điện thoại</th>
                                        <th>Địa chỉ</th> --}}
                                        {{-- <th>Tình trạng việc làm</th>
                                <th>Nơi làm việc</th> --}}
                                        {{-- <th>Thao tác</th> --}}
                                        <th>Vị trí</th>
                                        <th>Kinh nghiệm</th>
                                        <th>Trình độ</th>
                                        <th>Hình thức làm việc</th>
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
        $('#kydieutra, #vieclammongmuon, #tinhtranghdkt, #cccd').change(function() {
            //Xử lý hàm ajax tìm kiếm
            kydieutra = $('#kydieutra').val();
            vieclammongmuon = $('#vieclammongmuon').val();
            tinhtranghdkt = $('#tinhtranghdkt').val();
            cccd = $('#cccd').val();
            hoten = $('#hoten').val();
            madv = $('#madv').val();
            //    console.log(madv)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/TraCuu',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    kydieutra: kydieutra,
                    vieclammongmuon: vieclammongmuon,
                    tinhtranghdkt: tinhtranghdkt,
                    cccd: cccd,
                    hoten: hoten,
                    madv: madv,

                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#ketqua').replaceWith(data);
                    TableManaged3.init();
                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });

        })

        $('#hoten').keyup(function() {
            //Xử lý hàm ajax tìm kiếm
            kydieutra = $('#kydieutra').val();
            vieclammongmuon = $('#vieclammongmuon').val();
            tinhtranghdkt = $('#tinhtranghdkt').val();
            cccd = $('#cccd').val();
            hoten = $('#hoten').val();
            madv = $('#madv').val();
            //    console.log(madv)
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/TraCuu',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    kydieutra: kydieutra,
                    vieclammongmuon: vieclammongmuon,
                    tinhtranghdkt: tinhtranghdkt,
                    cccd: cccd,
                    hoten: hoten,
                    madv: madv,

                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#ketqua').replaceWith(data);
                    TableManaged3.init();
                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });

        })
    </script>
@endsection
