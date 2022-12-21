@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/select2/select2.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-managed.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
@stop
@section('content')
    <form method="POST" action="{{ '/dmdonvi/store' }}" accept-charset="UTF-8" class="horizontal-form" id="update_dmdonvi"
        enctype="multipart/form-data">
        @csrf
        <div class="card card-custom wave wave-animate-slow wave-primary" style="min-height: 600px">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <div class="card-title">
                    <h3 class="card-label text-uppercase">Thông tin chi tiết đơn vị</h3>
                </div>
                <div class="card-toolbar">
                    <!--begin::Button-->
                    <!--end::Button-->
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    {{-- <div class="col-lg-4">
                    <label>Mã quan hệ ngân sách</label>
                    <input class="form-control" name="maqhns" type="text">
                </div> --}}

                    <div class="col-lg-4">
                        <label>Tên đơn vị<span class="require">*</span></label>
                        <input class="form-control" required="" autofocus="" name="tendv" type="text">
                    </div>

                    <div class="col-lg-4">
                        <label>Tên đơn vị hiển thị báo cáo</label>
                        <input class="form-control" name="tendvhienthi" type="text">
                    </div>
                    <div class="col-lg-4">
                        <label>Email</label>
                        <input class="form-control" name="email" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Tên đơn vị cấp trên</label>
                        <select class="form-control select2me" name="madvcq">
                            <option value="">--- Chọn đơn vị ---</option>
                            @if ($model_donvi != null)
                                @foreach ($model_donvi as $donvi)
                                    <option value="{{ $donvi->madv }}">{{ $donvi->tendv }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-lg-4">
                        <label>Địa chỉ trụ sở</label>
                        <input class="form-control" name="diachi" type="text">
                    </div>

                    <div class="col-lg-4">
                        <label>Địa danh</label>
                        <input class="form-control" name="diadanh" type="text">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Chức vụ người ký</label>
                        <input class="form-control" name="chucvuky" type="text">
                    </div>

                    <div class="col-lg-4">
                        <label>Họ tên người ký</label>
                        <input class="form-control" name="nguoiky" type="text">
                    </div>

                    {{-- <div class="col-lg-4">
                    <label>Chức vụ người ký thay</label>
                    <input class="form-control" name="chucvukythay" type="text">
                </div>                 --}}
                </div>

                <div class="form-group row">
                    <div class="col-lg-8">
                        <label>Thông tin liên hệ</label>
                        <input class="form-control" name="ttlienhe" type="text">
                    </div>
                </div>
                <input type="hidden" name='madonvi' id=madonvi value="{{ $inputs }}">
                <input type="hidden" name='madiaban' id=madiaban value="{{ $inputs }}">
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <a href="{{ $furl . 'danh_sach_don_vi/' . $model_diaban->id }}" class="btn btn-danger"><i
                                class="fa fa-reply"></i>&nbsp;Quay lại</a>
                        <button type="submit" class="btn btn-primary mr-2"><i class="fa fa-check"></i>Hoàn thành</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
