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
    <div class="col-md-12" style="background-color: #F3F6F9">
        <div class="card box blue" id="form_wizard_1" >
            <div class="card-title mb-5 mt-5">
                <div class="caption text-uppercase">
                    THÔNG TIN DOANH NGHIỆP
                </div>
                <div class="tools hidden-xs">
                    <a href="javascript:;" class="collapse">
                    </a>
                </div>
            </div>

            <div class="card-body form" id="form_wizard">
                {{-- {!! Form::open(['url'=>'/nghiep_vu/ho_so/store','method'=>'post' , 'files'=>true, 'id' => 'create_hscb','enctype'=>'multipart/form-data']) !!} --}}
                <form action="{{'/doanhnghiep/store'}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Mã số kinh doanh</label>
                                    <input type="text" name="dkkd" class="form-control" value="{{isset($model)?$model->dkkd:''}}" required>
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tên doanh nghiệp</label>
                                    <input type="text" name="name" class="form-control" value="{{isset($model)?$model->name:''}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Quy mô</label>
                                    {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                                    <input type="text" name="quymo" class="form-control" value="{{isset($model)?$model->quymo:''}}" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tình trạng hoạt động</label>
                                    <select class="form-control input-sm m-bot5 select2basic" name="public">
                                        <option value='1' selected>Hoạt động</option>
                                        <option value='0'>Dừng</option>
                                    </select>
                                </div>
                            </div>
                
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Số điện thoại <span class="require">*</span></label>
                                    {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                                    <input type="text" name="phone" class="form-control" value="{{isset($model)?$model->phone:''}}">
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Fax</label>
                                    <input type="text" name="fax" class="form-control" value="{{isset($model)?$model->fax:''}}">
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Website</label>
                                    <input type="text" name="website" class="form-control" value="{{isset($model)?$model->website:''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{isset($model)?$model->email:''}}">
                                </div>
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tỉnh<span class="require">*</span></label>
                                    {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                                    <input type="text" name="tinh" class="form-control" value="Quảng Bình" readonly>
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Huyện/Thị xã/Thành phố</label>
                                    <?php $huyen=$dmhanhchinh->wherein('level',['Thành phố','Huyện','Thị xã'])?>
                                    <select name="huyen" class="form-control select2basic" id="">
                                        <option value="">--- Chọn Huyện ----</option>
                                    @foreach ($huyen as $h )
                                        <option value="{{$h->id}}">{{$h->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Xã/Phường</label>
                                    <select name="xa" class="form-control select2basic" id="">
                                    <?php $xa=$dmhanhchinh->wherein('level',['Phường','Xã','Thị trấn'])?>
                                    <option value="">--- Chọn xã ---</option>
                                    @foreach ($xa as $x )
                                    <option value="{{$x->id}}">{{$x->name}}</option>
                                @endforeach
                            </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Khu vực</label>
                                    <select class="form-control input-sm m-bot5 select2basic" name="khuvuc">
                                        <option value='1' selected>Thành thị</option>
                                        <option value='0'>Nông thôn</option>
                                    </select>
                                </div>
                            </div>                
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ</label>
                                    {{-- {!!Form::text('tencanbo', null, array('id' => 'tencanbo','class' => 'form-control', 'required'=>'required'))!!} --}}
                                    <input type="text" name="adress" class="form-control" value="{{isset($model)?$model->adress:''}}">
                                    
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Khu công nghiệp</label>
                                    <select class="form-control input-sm m-bot5 select2basic" name="khucn">
                                        <option value="">-- Chọn khu công nghiệp ---</option>
                                        @foreach ($kcn as $cn )
                                            <option value="{{$cn->id}}">{{$cn->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Loại hình doanh nghiệp</label>
                                    <select class="form-control input-sm m-bot5 select2basic" name="loaihinh">
                                        <option value="">-- Chọn loại hình doanh nghiệp ---</option>
                                        @foreach ($loaihinh as $dn )
                                            <option value="{{$dn->madmlhkt}}">{{$dn->tenlhkt}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Ngành nghề</label>
                                    <select class="form-control input-sm m-bot5 select2basic" name="nganhnghe">
                                        <option value="">-- Chọn loại ngành nghề ---</option>
                                        @foreach ($nganhnghe as $dn )
                                            <option value="{{$dn->id}}">{{$dn->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>                
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-12 text-center">

                                <button type="submit" class="btn btn-success">Tạo hồ sơ</button>

                                <a href="{{url('/doanhnghiep-ba')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                            </div>
                        </div>
                    </div>
                </form>
                    {{-- {!! Form::close() !!} --}}
            </div>
        </div>
    </div>
</div>
@stop
