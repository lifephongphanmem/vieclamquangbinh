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

                $('#huyen').change(function(a) {
                    {{ $xa = $dmhanhchinh->where('parent','404') }}   
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
                        <h3 class="card-label text-uppercase">Thêm mới người thất nghiệp</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{'/dsthatnghiep/store'}}" enctype='multipart/form-data'>
                        {{ csrf_field() }}

                        <div class="panel-body" id='dynamicTable'>
  
                                <div class="card card-custom">
                                    <div class="card-header card-header-tabs-line">
                                        <div class="card-toolbar">
                                           <label>kỳ điều tra <span class="text-danger">*</span></label>
                                            <input id="kydieutra" name="kydieutra" type="month"   required>
                                        </div>
                                        
                                    </div>
                                </div>
                            <div class="row" id="1stld">
                                <div class="col-md-12">
                                    <div class="card card-custom">
                                        <div class="card-header card-header-tabs-line">
                                            <div class="card-toolbar">
                                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#thongtincoban">
                                                            <span class="nav-icon">
                                                                <i class="fas fa-users"></i>
                                                            </span>
                                                            <span class="nav-text">Người thất nghiệp</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-toolbar">

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="thongtincoban" role="tabpanel"
                                                    aria-labelledby="thongtincoban">
                                  
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Họ và Tên <span class="text-danger">*</span></label>
                                                                    <input type="text" name="hoten[]"class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Số CMND/CCCD <span class="text-danger">*</span></label>
                                                                    <input type="text" name="cccd[]"class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label> Giới tính </label>
                                                                    <select class="form-control"
                                                                        name="gioitinh[]">
                                                                        <option value='Nữ'>Nữ</option>
                                                                        <option value='Nam' >Nam
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Ngày tháng năm sinh</label>
                                                                    <input type="date" name="ngaysinh[]" class="form-control" >
                                                                </div>
                                                            </div>
 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Bảo hiểm xã hội</label>
                                                                    <input type="text" name="bhxh[]" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Địa chỉ </label>
                                                                    <input type="text" name="diachi[]" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Huyện<span class="text-danger">*</span></label>
                                                                    <?php $huyen = $dmhanhchinh->where('capdo','H') ?>
                                                                    <select id="huyen" name="huyen[]" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn huyện---</option>
                                                                        @foreach ($huyen as $val)
                                                                            <option value="{{$val->maquocgia}}">{{$val->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Xã<span class="text-danger">*</span></label>
                                                                      <?php $xa = $dmhanhchinh->where('capdo','X') ?>
                                                                    <select id="xa" name="xa[]" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn xã---</option>
                                                                        @if (isset($xa))
                                                                            @foreach ($xa as $val)
                                                                                <option value="{{$val->maquocgia}}">{{$val->name}}</option>
                                                                            @endforeach           
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Trình độ CMKT <span class="text-danger">*</span></label>
                                                                    <select name="trinhdocmkt[]" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn trình độ CMKT---</option>
                                                                        @foreach ($trinhdocmky as $val)
                                                                            <option value="{{$val->stt}}">{{$val->tentdkt}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nghệ nghiệp trước khi mất việc<span class="text-danger">*</span></label>
                                                                    <select name="nghenghiep[]" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn nghề nghiệp trước khi mất việc---</option>
                                                                        @foreach ($dmchucvu as $val)
                                                                            <option value="{{$val->id}}">{{$val->tencv}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nghề công việc <span class="text-danger">*</span></label>
                                                                    <select name="nghecongviec[]" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn nghề công việc---</option>
                                                                        @foreach ($nghecongviec as $val)
                                                                            <option value="{{$val->id}}">{{$val->tendm}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nguyên nhân thất nghiệp <span class="text-danger">*</span></label>
                                                                    <select name="nguyennhan[]" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn nguên nhân thất nghiệp---</option>
                                                                        @foreach ($nguyennhan as $val)
                                                                            <option value="{{$val->id}}">{{$val->tennn}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <input type="hidden" name="quantity" id="quantity" value="1">
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-lg-12 text-left">
                                <button type="button" name="add" id="add" class="btn btn-success"> Thêm nhân khẩu</button>
                                <button type="button" class="btn btn-danger" id='remove'>Giảm nhân khẩu</button>
                                </div>
                                <div class="col-lg-12">
                                    <a onclick="history.back()" class="btn btn-danger mr-5"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Hoàn thành</button>
                                   
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <script type="text/javascript">
                    var i = 0;
                    $("#add").click(function() {
                        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) + 1;
                        ++i;
                        firstld = document.getElementById("1stld").innerHTML + '';
                        nextld = "<div class='row' id ='row" + i + "' >" + firstld + "</div>"
                        $("#dynamicTable").append(nextld);
                    });
                    $("#remove").click(function() {
                        if ($('#quantity').val() > 1) {
                        document.getElementById("quantity").value = parseInt(document.getElementById("quantity").value, 10) - 1;
                        delrowid = "row" + i;
                        document.getElementById(delrowid).remove();
                        --i;
                        }

                    });
        </script>
    @endsection
