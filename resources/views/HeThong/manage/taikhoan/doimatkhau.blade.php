@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/select2/select2.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/select2.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
        
    </script>
@stop
@section('content')
{!! Form::model($model, ['method' => 'POST', '/TaiKhoan/DoiMatKhau', 'class' => 'horizontal-form', 'id' => 'update_dmdonvi', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
{{-- {{ Form::hidden('id', null) }} --}}
{{ Form::hidden('madv', null) }}
<div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
    <div class="card-header flex-wrap border-1 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label text-uppercase">Thông tin chi tiết tài khoản</h3>
        </div>
        <div class="card-toolbar">
            <!--begin::Button-->
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        @if(session('admin')->phanloaitk ==1)
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Đơn vị quản lý</label>
                {!! Form::select('madv', $a_donvi, null, ['class' => 'form-control', 'disabled']) !!}
            </div>

            <div class="col-lg-4">
                <label>Tên tài khoản<span class="require">*</span></label>
                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'readonly'=>'true']) !!}
            </div>               
        </div>            

        <div class="form-group row">
            <div class="col-lg-4">
                <label>Tài khoản truy cập<span class="require">*</span></label>
                {!! Form::text('username', null, ['class' => 'form-control', 'readonly'=>'true']) !!}
            </div>
            <div class="col-lg-4">
                <label>Mật khẩu mới<span class="require">*</span></label>
                {{-- {!! Form::text('password', null, ['class' => 'form-control','required']) !!} --}}
                <input type="text" name="password" class="form-control" required>
            </div>
        </div>
        @else
        <div class="form-group row">
            <div class="col-lg-4">
                <label>Email <span class="require">*</span></label>
                {!! Form::text('email', $model->email, ['class' => 'form-control','required','readonly'=>'true']) !!}
            </div>

            <div class="col-lg-4">
                <label>Tên <span class="require">*</span></label>
                {!! Form::text('name', $model->name, ['class' => 'form-control', 'required']) !!}
            </div> 
            <div class="col-lg-4">
                <label>Mật khẩu mới</label>
                {{-- {!! Form::text('password', null, ['class' => 'form-control','required']) !!} --}}
                <input type="text" name="password" class="form-control" placeholder="Không đổi thì không cần điền">
            </div>              
        </div>
        @endif
    </div>
    <div class="card-footer">
        <div class="row text-center">
            <div class="col-lg-12">
                <a onclick="history.back()" class="btn btn-danger mr-5"><i
                        class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Hoàn thành</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
<!--end::Card-->
@stop


