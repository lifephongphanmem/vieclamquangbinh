@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('global/plugins/select2/select2.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}">
    </script>

    <script src="{{ url('assets/admin/pages/scripts/table-managed.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop
@section('content')
    <form method="POST" action="{{ '/TaiKhoan/update_tk/' . $model->id }}" accept-charset="UTF-8" class="horizontal-form"
        id="update_dmdonvi" enctype="multipart/form-data">
        @csrf
        <div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label text-uppercase">Thông tin tài khoản</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Tên tài khoản<span class="require">*</span></label>
                        <input class="form-control" name="name" type="text" value="{{ $model->name }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Email<span class="require">*</span></label>
                        <input class="form-control" name="email" type="text" value="{{ $model->email }}">
                    </div>

                    <div class="col-lg-4">
                        <label>Tên công ty<span class="require">*</span></label>
                        <input class="form-control" name="company" type="text" value="{{ $model_cty->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>ĐKKD<span class="require">*</span></label>
                        <input class="form-control" name="dkkd" type="text" value="{{ $model_cty->dkkd }}">
                    </div>
                    <div class="col-lg-4">
                        <label>Trạng thái</label>
                        <select class="form-control select2me" name="status">
                            <option value="1" {{ $model->status == 1 ? 'selected' : '' }}>Kích hoạt</option>
                            <option value="2"{{ $model->status == 2 ? 'selected' : '' }}>Vô hiệu</option>
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label>Mật khẩu</label>
                        <input class="form-control" name="password" type="password">
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
