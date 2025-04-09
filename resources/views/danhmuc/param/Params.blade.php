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
        });
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
                        <h3 class="card-label text-uppercase">{{ $paramtype->name }}</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="" class="btn btn-xs btn-success mr-2">Tạo mới</a> --}}
                        {{-- @if (chkPhanQuyen('chucvu', 'thaydoi')) --}}
                        <button type="button" onclick="add()" class="btn btn-success btn-sm" data-target="#modify-modal"
                            data-toggle="modal" title="Thêm mới">
                            <i class="fa fa-plus"></i>Thêm mới</button>
                        {{-- @endif --}}
                        {{-- </button>
                        <button class="btn btn-xs btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center odd">
                                <th style="width:5%">STT</th>
                                <th style="width:20%">Tên param</th>
                                <th>Ghi chú</th>
                                <th style="width:15%">Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $ct)
                                <tr>
                                    <td class="text-center">{{ ++$key }}</td>
                                    <td name='param'>{{ $ct->name }}</td>
                                    <td name='desc'>{{ $ct->description }}</td>
                                    <td class="text-center">
                                        {{-- @if (chkPhanQuyen('chucvu', 'thaydoi')) --}}
                                        <button onclick="edit(this,'{{ $ct->id }}','{{ $ct->type }}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                            title="Thay đổi thông tin" data-toggle="modal">
                                            <i class="icon-lg la fa-edit text-primary icon-2x"></i></button>
                                        <button title="Xóa thông tin" type="button"
                                            onclick="cfDel('{{ '/ParamType/XoaParam/' . $ct->id }}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                            data-toggle="modal">
                                            <i class="icon-lg flaticon-delete text-danger"></i></button>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
            <!--end::Example-->
        </div>
    </div>
    <!--end::Row-->
    @include('includes.delete')

    <form method="POST" action="" accept-charset="UTF-8" id="frm_modify">
        @csrf
        <div id="modify-modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin danh mục</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group ">
                                    <label class="control-label">Param</label>
                                    <input type="text" id="name" name="name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group ">
                                    <label class="control-label">Description</label>
                                    <textarea name="description" class="form-control" id="desc" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name='id' id='edit'>
                        <input type="hidden" name='type' value="{{$paramtype->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function add() {
            var url = '/ParamType/LuuParam';
            $('#name').val('');
            $('#desc').val('');
            $('#frm_modify').find('input[name=id]').val('');
            $('#frm_modify').attr('action', url);
        }

        function edit(e, id, type) {
            var url = '/ParamType/LuuParam';
            var tr = $(e).closest('tr');
            $('#name').val($(tr).find('td[name=param]').text());
            $('#desc').val($(tr).find('td[name=desc]').text());
            $('#frm_modify').find('input[name=id]').val(id);
            $('#frm_modify').find('input[name=type]').val(type);
            $('#frm_modify').attr('action', url);
        }
    </script>
@stop
