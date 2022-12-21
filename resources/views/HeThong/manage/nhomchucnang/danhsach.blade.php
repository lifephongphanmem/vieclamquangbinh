@extends('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets/global/plugins/select2/select2.css') }}" />
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ url('assets/js/pages/select2.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });

        function setNhomTK(manhomchucnang, tennhomchucnang, stt) {
            var form = $('#frm_modify');
            form.find("[name='manhomchucnang']").val(manhomchucnang);
            form.find("[name='tennhomchucnang']").val(tennhomchucnang);
            form.find("[name='stt']").val(stt);
        }
    </script>
@stop
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Example-->
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách tài khoản trong nhóm chức năng:
                            {{ $m_nhom->tennhomchucnang }}</h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        {{-- @if (chkPhanQuyen('dsnhomtaikhoan', 'thaydoi')) --}}
                        {{-- <button type="button" class="btn btn-success btn-xs"
                        data-target="#modify-modal" data-toggle="modal">
                        <i class="icon-lg flaticon-refresh"></i>&nbsp;Thiết lập lại quyền</button> --}}
                        {{-- @endif --}}
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr class="text-center">
                                        <th width="10%">STT</th>
                                        <th>Tên đơn vị</th>
                                        <th>Tên tài khoản</th>
                                    </tr>
        
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach ($model as $tt)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $tt->name }}</td>
                                            <td>{{ $tt->username }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!--end::Example-->
    </div>
    <!--end::Row-->

    {!! Form::open(['url' => '/NhomChucNang/ThietLapLai', 'id' => 'frm_modify']) !!}
    <input type="hidden" name="manhomchucnang" value="{{ $inputs['manhomchucnang'] }}" />
    <div id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade kt_select2_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Thiết lập lại quyền cho nhóm tài khoản</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="form-group row">
                            <h3 class="text-warning">Các phân quyền của tài khoản sẽ được thay thế bằng phân quyền theo
                                nhóm. Bạn có chắc chắn muốn thay đổi ?</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" value="submit" class="btn btn-primary">Đồng
                        ý</button>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

    @include('includes.delete');

@stop
