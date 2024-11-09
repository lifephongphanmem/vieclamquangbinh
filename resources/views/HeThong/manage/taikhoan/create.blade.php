@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
@stop

@section('custom-script')

        <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
@stop
@section('content')
    <form method="POST" action="{{ '/TaiKhoan/store' }}" accept-charset="UTF-8" class="horizontal-form" id="update_dmdonvi"
        enctype="multipart/form-data">
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
                        <select class="form-control select2basic" name="madv">
                            <option value="{{ $model->madv }}">{{ $model->tendv }}</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Đơn vị báo cáo</label>
                        <select class="form-control select2basic" name="madvbc">
                            <option value="">-- Chọn đơn vị báo cáo --</option>
                            @foreach ($model_dvbc as $dv)
                                <option value="{{ $dv->madv }}">{{ $dv->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>Tên tài khoản<span class="require">*</span></label>
                        <input class="form-control" name="name" type="text">
                    </div>
                    <div class="col-lg-3">
                        <label>Tài khoản truy cập<span class="require">*</span></label>
                        <input class="form-control" name="username" placeholder="Viết liền ký tự không dấu" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>Phân loại </label>
                        <select class="form-control select2basic" name="phanloai">
                            <option value="tonghop">Tổng hợp</option>
                            <option value="nhaplieu">Nhập liệu</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Cấp độ</label>
                        <select class="form-control select2basic" name="capdo">
                            <option value="T">Tài khoản cấp Tỉnh</option>
                            <option value="H">Tài khản cấp Huyện</option>
                            <option value="X">Tài khản cấp Xã</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label>Trạng thái</label>
                        <select class="form-control select2basic" name="status">
                            <option value="1">Kích hoạt</option>
                            <option value="2">Vô hiệu</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label>Mật khẩu <span class="require">*</span></label>
                        <input class="form-control" name="password" type="password" value='123456abc'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>Nhóm chức năng</label>
                        <select class="form-control select2basic" name="manhomchucnang">
                                @foreach ($a_nhomchucnang as $key=>$val)
                                    <option value="{{$key}}">{{$val}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <a href="{{ '/TaiKhoan/DanhSach?madv=' . $model->madv }}" class="btn btn-danger"><i
                                class="fa fa-reply"></i>&nbsp;Quay lại</a>
                        <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-check"></i>Hoàn thành</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
