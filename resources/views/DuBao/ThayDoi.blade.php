@extends('main')
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
            TableManaged4.init();
            TableManaged5.init();
        });
    </script>
@stop

@section('content')
    <!--begin::Card-->

    <div class="card card-custom" style="min-height: 600px">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label text-uppercase">Thông tin dự báo nhu cầu lao động</h3>
            </div>
            <div class="card-toolbar">
                <!--begin::Button-->
                <!--end::Button-->
            </div>
        </div>

        {!! Form::model($model, [
            'method' => 'POST',
            'url' => $inputs['url'] . 'thaydoi',
            'class' => 'form',
            'id' => 'frm_ThayDoi',
            'files' => true,
            'enctype' => 'multipart/form-data',
        ]) !!}
        {{ Form::hidden('madv', null, ['id' => 'madv']) }}
        {{ Form::hidden('madubao', null, ['id' => 'madubao']) }}
        <div class="card-body">
            <h4 class="text-dark font-weight-bold mb-5">Thông tin chung</h4>
            <div class="form-group row">

                <div class="col-lg-3">
                    <label>Ngày tháng tạo<span class="require">*</span></label>
                    {!! Form::input('date', 'thoigian', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <label>Mô tả hồ sơ</label>
                    {!! Form::textarea('noidung', null, ['class' => 'form-control', 'rows' => 2]) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom">
                        <div class="card-header card-header-tabs-line">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_cung">
                                            <span class="nav-icon">
                                                <i class="fas fa-users"></i>
                                            </span>
                                            <span class="nav-text">Thông tin cung</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_cau">
                                            <span class="nav-icon">
                                                <i class="fas fa-users"></i>
                                            </span>
                                            <span class="nav-text">Thông tin cầu</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_khac">
                                            <span class="nav-icon">
                                                <i class="far fa-user"></i>
                                            </span>
                                            <span class="nav-text">Nguồn thông tin khác</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-toolbar">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="kt_cung" role="tabpanel"
                                    aria-labelledby="kt_cung">
                                    <div class="form-group row">
                                        <div class="col-lg-12 text-right">
                                            <div class="btn-group" role="group">
                                                <button type="button" onclick="setThem('CUNG')" data-target="#modal-them"
                                                    data-toggle="modal" class="btn btn-light-dark btn-sm">
                                                    <i class="fa fa-plus"></i> Thêm</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="dscung">
                                        <div class="col-md-12">
                                            <table id="sample_4" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th width="5%">STT</th>
                                                        <th>Vị trí làm việc</th>
                                                        <th>Số lượng</th>
                                                        <th width="15%">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($model_cung as $key => $tt)
                                                        <tr class="odd gradeX">
                                                            <td class="text-center">{{ $i++ }}</td>
                                                            <td>{{ $tt->tentgktct2 }}</td>
                                                            <td>{{ $tt->soluong }}</td>
                                                            <td class="text-center">
                                                                <button title="Sửa thông tin" type="button"
                                                                    onclick="setThongTin('{{ $tt->id }}','{{ $tt->madmtgktct2 }}','{{ $tt->tentgktct2 }}','{{ $tt->soluong }}','CUNG')"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-thongtin" data-toggle="modal">
                                                                    <i class="icon-lg la fa-edit text-primary"></i>
                                                                </button>
                                                                <button title="Xóa" type="button"
                                                                    onclick="delKhenThuong('{{ $tt->id }}',  '{{ $inputs['url'] . 'XoaTapThe' }}', 'TAPTHE')"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-delete-khenthuong"
                                                                    data-toggle="modal">
                                                                    <i class="icon-lg la fa-trash text-danger"></i>
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_cau" role="tabpanel" aria-labelledby="kt_cau">
                                    <div class="form-group row">
                                        <div class="col-lg-12 text-right">
                                            <div class="btn-group" role="group">
                                                <button type="button" onclick="setHoGiaDinh()"
                                                    data-target="#modal-thongtin" data-toggle="modal"
                                                    class="btn btn-light-dark btn-icon btn-sm">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="dscau">
                                        <div class="col-md-12">
                                            <table id="sample_5" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th width="5%">STT</th>
                                                        <th>Vị trí làm việc</th>
                                                        <th>Số lượng</th>
                                                        <th width="15%">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($model_cau as $key => $tt)
                                                        <tr class="odd gradeX">
                                                            <td class="text-center">{{ $i++ }}</td>
                                                            <td>{{ $tt->tentgktct2 }}</td>
                                                            <td>{{ $tt->soluong }}</td>
                                                            <td class="text-center">
                                                                <button title="Sửa thông tin" type="button"
                                                                    onclick="setThongTin('{{ $tt->id }}','{{ $tt->madmtgktct2 }}','{{ $tt->tentgktct2 }}','{{ $tt->soluong }}','CAU')"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-thongtin" data-toggle="modal">
                                                                    <i class="icon-lg la fa-edit text-primary"></i>
                                                                </button>
                                                                <button title="Xóa" type="button"
                                                                    onclick="delKhenThuong('{{ $tt->id }}',  '{{ $inputs['url'] . 'XoaTapThe' }}', 'TAPTHE')"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-delete-khenthuong"
                                                                    data-toggle="modal">
                                                                    <i class="icon-lg la fa-trash text-danger"></i>
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="kt_khac" role="tabpanel" aria-labelledby="kt_khac">
                                    <div class="form-group row">
                                        <div class="col-lg-12 text-right">
                                            <div class="btn-group" role="group">
                                                <button title="Thêm đối tượng" type="button"
                                                    data-target="#modal-thongtin" data-toggle="modal"
                                                    class="btn btn-light-dark btn-icon btn-sm" onclick="setCaNhan()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="dskhac">
                                        <div class="col-md-12">
                                            <table id="sample_3" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th width="5%">STT</th>
                                                        <th>Vị trí làm việc</th>
                                                        <th>Số lượng</th>
                                                        <th width="15%">Thao tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach ($model_khac as $key => $tt)
                                                        <tr class="odd gradeX">
                                                            <td class="text-center">{{ $i++ }}</td>
                                                            <td>{{ $tt->tentgktct2 }}</td>
                                                            <td>{{ $tt->soluong }}</td>
                                                            <td class="text-center">
                                                                <button title="Sửa thông tin" type="button"
                                                                    onclick="setThongTin('{{ $tt->id }}','{{ $tt->madmtgktct2 }}','{{ $tt->tentgktct2 }}','{{ $tt->soluong }}','KHAC')"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-thongtin" data-toggle="modal">
                                                                    <i class="icon-lg la fa-edit text-primary"></i>
                                                                </button>

                                                                <button title="Xóa" type="button"
                                                                    onclick="delKhenThuong('{{ $tt->id }}',  '{{ $inputs['url'] . 'XoaTapThe' }}', 'TAPTHE')"
                                                                    class="btn btn-sm btn-clean btn-icon"
                                                                    data-target="#modal-delete-khenthuong"
                                                                    data-toggle="modal">
                                                                    <i class="icon-lg la fa-trash text-danger"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="card-footer">
            <div class="row text-center">
                <div class="col-lg-12">
                    <a href="{{ url($inputs['url'] . 'danhsach?madv=' . $model->madv) }}" class="btn btn-danger mr-5"><i
                            class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>Hoàn thành</button>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--end::Card-->

    {{-- tập thể --}}
    {!! Form::open([
        'url' => '',
        'id' => 'frm_ThongTin',
        'class' => 'form',
        'files' => true,
        'enctype' => 'multipart/form-data',
    ]) !!}
    <input type="hidden" name="madubao" value="{{ $model->madubao }}" />
    <input type="hidden" name="madmtgktct2" />
    <input type="hidden" name="id" />
    <div class="modal fade bs-modal-lg" id="modal-thongtin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thông tin dự báo nhu cầu lao động</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="form-control-label">Vị trí việc làm</label>
                            {!! Form::text('tentgktct2', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-9">
                            <label>Phân loại</label>
                            {!! Form::select('phanloai', ['CUNG' => 'Cung', 'CAU' => 'Cầu', 'KHAC' => 'Khác'], null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>

                        <div class="col-md-3">
                            <label>Số lượng</label>
                            {!! Form::text('soluong', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="LuuTapThe()">Cập nhật</button>
                    {{-- <button type="submit" class="btn btn-primary">Hoàn thành</button> --}}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    {!! Form::close() !!}

    <script>
        function setThongTin(id, madmtgktct2, tentgktct2, soluong, phanloai) {
            $('#frm_ThongTin').find("[name='id']").val(id);
            $('#frm_ThongTin').find("[name='madmtgktct2']").val(madmtgktct2);
            $('#frm_ThongTin').find("[name='tentgktct2']").val(tentgktct2);
            $('#frm_ThongTin').find("[name='soluong']").val(soluong);
            $('#frm_ThongTin').find("[name='phanloai']").val(phanloai).trigger('change');
        }

        function LuuTapThe() {
            var formData = new FormData($('#frm_ThongTin')[0]);

            $.ajax({
                url: "{{ $inputs['url'] }}" + "themchitiet",
                method: "POST",
                cache: false,
                dataType: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        if (data.phanloai == 'CUNG') {
                            $('#dscung').replaceWith(data.message);
                            TableManaged4.init();
                        }
                        if (data.phanloai == 'CAU') {
                            $('#dscau').replaceWith(data.message);
                            TableManaged5.init();
                        }
                        if (data.phanloai == 'KHAC') {
                            $('#dskhac').replaceWith(data.message);
                            TableManaged3.init();
                        }
                    }
                }
            })
            $('#modal-create-tapthe').modal("hide");
        }
    </script>

@stop
