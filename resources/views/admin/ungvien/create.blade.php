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
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Thêm mới
                            
                             ứng viên</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">
                    {{-- <form role="form" method="POST" action="{{ '/ungvien/store' }}" enctype='multipart/form-data'> --}}
                    {!! Form::open(['url' => '/ungvien/storecoban', 'method' => 'post', 'id' => 'frm_create']) !!}
                    @csrf
                    <div class="row ">
                        <div class="col-sm-12 col-sm-offset-2">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label>Email (*)</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-3">
                                    <label>Mật khẩu (*)</label>
                                    <input type="text" name="password" class="form-control" placeholder="Mật khẩu">
                                </div>
                                <div class="col-md-3">
                                    <label>Mật khẩu nhập lại (*)</label>
                                    <input type="text" name="repassword" class="form-control"
                                        placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="col-md-3">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Hoạt động</option>
                                        <option value="2">Khóa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body" id='dynamicTable'>

                        <div class="row" id="1stld">
                            <div class="col-md-12">
                                <div class="card card-custom">
                                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                                        <div class="card-title">
                                            <h3 class="card-label text-uppercase" id="nld">Thông tin ứng viên</h3>
                                        </div>
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <!--end::Button-->
                                        </div>
                                    </div>
                                    <div class="card-header card-header-tabs-line">
                                        <div class="card-toolbar">
                                            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#thongtincoban">
                                                        <span class="nav-icon">
                                                            <i class="fas fa-users"></i>
                                                        </span>
                                                        <span class="nav-text">Thông tin cơ bản</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#hocvan">
                                                        <span class="nav-icon">
                                                            <i class="far fa-user"></i>
                                                        </span>
                                                        <span class="nav-text">Trình độ học vấn</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#kinhnghiem">
                                                        <span class="nav-icon">
                                                            <i class="far fa-user"></i>
                                                        </span>
                                                        <span class="nav-text">kinh nghiệm việc làm</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="thongtincoban" role="tabpanel"
                                                aria-labelledby="thongtincoban">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.ungvien.include.coban')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="hocvan" role="tabpanel"
                                                aria-labelledby="hocvan">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.ungvien.include.hocvan')
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="kinhnghiem" role="tabpanel"
                                                aria-labelledby="kinhnghiem">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('admin.ungvien.include.kinhnghiem')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                    {{-- <input type="hidden" name="isnew" value='1'> --}}
                    <input name="user">
                    {{-- {!! Form::close() !!} --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
    <script>
        function storecoban() {
   
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({

                url: '/ungvien/storecoban',
                type: 'POST',
                data: {
                    // _token: "{{ csrf_token() }}",
                    _token: CSRF_TOKEN,
                    name: $('#name').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    status: $('#status').val(),


                    hoten: $('#hoten').val(),
                    gioitinh: $('#gioitinh').val(),
                    phone: $('#phone').val(),
                    tinh: $('#tinh').val(),
                    huyen: $('#huyen').val(),
                    xa: $('#xa').val(),
                    address: $('#address').val(),
                    chucdanh: $('#chucdanh').val(),
                    honnhan: $('#honnhan').val(),
                    hinhthuclv: $('#hinhthuclv').val(),
                    luong: $('#luong').val(),
                    trinhdocmkt: $('#trinhdocmkt').val(),
                    word: $('#word').val(),
                    excel: $('#excel').val(),
                    powerpoint: $('#powerpoint').val(),
                    gioithieu: $('#gioithieu').val(),
                    muctieu: $('#muctieu').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        console.log(1);
                        $('#frm_data').replaceWith(data.message);
                        $(document).ready(function() {
                            TableManaged4.init();
                        });
                        $('#Edit_Modal').modal("hide");
                    } else {
                        console.log(2);
                        toastr.error(data.message, "Lỗi!");
                    }
                }
            })

        }

        function storehocvan() {

            // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                data: {
                    // _token: "{{ csrf_token() }}",
                    // _token: CSRF_TOKEN,
                    chuyennganh: $('#chuyennganh').val(),
                    truong: $('#truong').val(),
                    bangcap: $('#bangcap').val(),
                    tungay: $('#tungay').val(),
                    denngay: $('#denngay').val(),
                    thanhtuu: $('#thanhtuu').val(),
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        console.log(1);
                        $('#frm_data').replaceWith(data.message);
                        $(document).ready(function() {
                            TableManaged4.init();
                        });
                        $('#Edit_Modal').modal("hide");
                    } else {
                        console.log(2);
                        toastr.error(data.message, "Lỗi!");
                    }
                }
            })
        }
    </script>

@endsection
