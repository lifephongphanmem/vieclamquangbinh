@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('global/plugins/select2/select2.css')}}"/>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{url('global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop
@section('content')
<form method="POST" action="{{'/TaiKhoan/update_tk/'.$model->id}}" accept-charset="UTF-8"  class="horizontal-form" id="update_dmdonvi" enctype="multipart/form-data">
    @csrf
    <div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label text-uppercase">Thêm mới tài khoản</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Đơn vị quản lý</label>
                    <select class="form-control select2me" name="madv" >
                        <option value="{{$model_dv->madv}}">{{$model_dv->tendv}}</option>                            
                    </select>
                </div>
                <div class="col-lg-3">
                    <label>Đơn vị báo cáo</label>
                    <select class="form-control select2me" name="madvbc" >
                        <option value="">-- Chọn đơn vị báo cáo --</option>
                        @foreach ($model_dvbc as $dv )
                        <option value="{{$dv->madv}}" {{$model->madvbc == $dv->madvbc?'selected':''}}>{{$dv->name}}</option> 
                        @endforeach
                                                  
                    </select>
                </div>

                <div class="col-lg-3">
                    <label>Tên tài khoản<span class="require">*</span></label>
                    <input class="form-control"  name="name" type="text" value="{{$model->name}}">
                </div>
                <div class="col-lg-3">
                    <label>Tài khoản truy cập<span class="require">*</span></label>
                    <input class="form-control" name="username" type="text" value="{{$model->username}}">
                </div>                
            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Phân loại </label>
                    <select class="form-control select2me" name="phanloai">
                        <option value="tonghop" {{$model->tonghop==1?'selected':''}}>Tổng hợp</option>
                        <option value="nhaplieu" {{$model->nhaplieu==1?'selected':''}}>Nhập liệu</option>
                    </select>
                </div>
                <div class="col-lg-3">
                <label>Cấp độ</label>
                <select class="form-control select2me" name="capdo">
                    <option value="T"  {{$model->capdo=='T'?'selected':''}}>Tài khoản cấp Tỉnh</option>
                    <option value="H"  {{$model->capdo=='H'?'selected':''}}>Tài khản cấp Huyện</option>
                    <option value="X"  {{$model->capdo=='X'?'selected':''}}>Tài khản cấp Xã</option>
                </select>
            </div>
                <div class="col-lg-3">
                    <label>Trạng thái</label>
                    <select class="form-control select2me" name="status">
                        <option value="1" {{$model->status==1?'selected':''}}>Kích hoạt</option>
                        <option value="2"{{$model->status==2?'selected':''}}>Vô hiệu</option>
                    </select>
                </div>

                <div class="col-lg-3">
                    <label>Mật khẩu</label>
                    <input class="form-control" name="password" type="password">
                </div>                
            </div>
        </div>
        <div class="card-footer">
            <div class="row text-center">
                <div class="col-lg-12">
                    <a href="{{'/TaiKhoan/DanhSach?madv='.$model->madv}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-check"></i>Hoàn thành</button>                    
                </div>
            </div>
        </div>
    </div>
    </form>
@stop