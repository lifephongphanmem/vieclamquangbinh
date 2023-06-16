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
                        <h3 class="card-label text-uppercase">Thông tin người thất nghiệp</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{'/dsthatnghiep/update'}}" enctype='multipart/form-data'>
                        {{ csrf_field() }}

                        <div class="panel-body" id='dynamicTable'>
{{--   
                                <div class="card card-custom">
                                    <div class="card-header card-header-tabs-line">
                                        <div class="card-toolbar">
                                           <label>kỳ điều tra <span class="text-danger">*</span></label>
                                            <input id="kydieutra" name="kydieutra" type="month"   required>
                                        </div>
                                        
                                    </div>
                                </div> --}}
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
                                                            <span class="nav-text">Thông tin người thất nghiệp</span>
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
                                                            <input id="id" name="id" value="{{$model->id}}" hidden>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Họ và Tên <span class="text-danger">*</span></label>
                                                                    <input type="text" name="hoten" class="form-control"  value="{{$model->hoten}}"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Số CMND/CCCD <span class="text-danger">*</span></label>
                                                                    <input type="text" name="cccd" class="form-control"  value="{{$model->cccd}}"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label> Giới tính </label>
                                                                    <select class="form-control" name="gioitinh">
                                                                        <option value='Nữ' {{$model->gioitinh == 'Nữ' ? 'selected' : ''}}>Nữ</option>
                                                                        <option value='Nam'  {{$model->gioitinh == 'Nam' ? 'selected' : ''}}>Nam</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Ngày tháng năm sinh <span class="text-danger">*</span></label>
                                                                    <input type="date" name="ngaysinh" class="form-control"  value="{{$model->ngaysinh}}"  required>
                                                                </div>
                                                            </div>
 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Bảo hiểm xã hội</label>
                                                                    <input type="text" name="bhxh" class="form-control"  value="{{$model->bhxh}}" >
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Huyện<span class="text-danger">*</span></label>
                                                                    <?php $huyen = $dmhanhchinh->where('capdo','H') ?>
                                                                    <select id="huyen" name="huyen" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn huyện---</option>
                                                                        @foreach ($huyen as $val)
                                                                            <option value="{{$val->maquocgia}}" {{ $val->maquocgia == $model->huyen ? 'selected':'' }}>{{$val->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Xã<span class="text-danger">*</span></label>
                                                                      <?php $xa = $dmhanhchinh->where('capdo','X') ?>
                                                                    <select id="xa" name="xa" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn xã---</option>
                                                                        @if (isset($xa))
                                                                            @foreach ($xa as $val)
                                                                                <option value="{{$val->maquocgia}}" {{ $val->maquocgia == $model->xa ? 'selected':'' }}>
                                                                                    {{$val->name}}</option>
                                                                            @endforeach           
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Địa chỉ </label>
                                                                    <input type="text" name="diachi" class="form-control"  value="{{$model->diachi}}" >
                                                                </div>
                                                            </div>
 
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Trình độ CMKT <span class="text-danger">*</span></label>
                                                                    <select name="trinhdocmkt" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn trình độ CMKT---</option>
                                                                        @foreach ($trinhdocmky as $val)
                                                                            <option value="{{$val->stt}}" {{$model->trinhdocmkt == $val->stt ? 'selected' : ''}}>{{$val->tentdkt}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nghệ nghiệp trước khi mất việc<span class="text-danger">*</span></label>
                                                                    <select name="nghenghiep" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn nghệ nghiệp trước khi mất việc---</option>
                                                                        @foreach ($dmchucvu as $val)
                                                                            <option value="{{$val->id}}" {{$model->nghenghiep == $val->id ? 'selected' : ''}}>{{$val->tencv}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nghề công việc<span class="text-danger">*</span></label>
                                                                    <select name="nghecongviec" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn nghệ nghiệp trước khi mất việc---</option>
                                                                        @foreach ($nghecongviec as $val)
                                                                            <option value="{{$val->id}}" {{$model->nghecongviec == $val->id ? 'selected' : ''}}>{{$val->tendm}}</option>
                                                                        @endforeach
                                                                    </select>                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Nguyên nhân thất nghiệp<span class="text-danger">*</span></label>
                                                                    <select name="nguyennhan" class="form-control selec2basic" required>
                                                                        <option value="">---Chọn nguyên nhân thất nghiệp---</option>
                                                                        @foreach ($nguyennhan as $val)
                                                                            <option value="{{$val->id}}" {{$model->nguyennhan == $val->id ? 'selected' : ''}}>{{$val->tennn}}</option>
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

    @endsection
