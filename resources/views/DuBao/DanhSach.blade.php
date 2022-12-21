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
            $('#madv').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + 'danhsach?madv=' + $('#madv').val();
            });
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
                        <h3 class="card-label text-uppercase">Danh sách dự báo nhu cầu lao động</h3>
                    </div>
                    <div class="card-toolbar">
                        @if (chkPhanQuyen('dsdubao', 'thaydoi'))
                            <a href="{{ $inputs['url'] . 'them?madv=' . $inputs['madv'] }}" class="btn btn-xs btn-success mr-2"
                                title="Thêm mới"><i class="fa fa-plus"></i>Thêm mới
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label style="font-weight: bold">Đơn vị</label>
                            {!! Form::select('madv', $a_dsdv, $inputs['madv'], ['class' => 'form-control', 'id' => 'madv']) !!}
                        </div>
                    </div>

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th width="5%">STT </th>
                                <th width="10%">Thời điểm</th>
                                <th>Mô tả</th>
                                <th width="15%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $ld)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td> {{ getNgayThang($ld->thoigian) }}</td>
                                    <td> {{ $ld->noidung }}</td>
                                    <td>
                                        <a title="In tổng hợp" href="{{ url($inputs['url'] . 'indubao?madubao=' . $ld->madubao) }}" class="btn btn-sm btn-clean btn-icon" target="_blank">
                                            <i class="icon-lg la flaticon2-print text-primary"></i>
                                        </a>
                                        @if (chkPhanQuyen('dsdubao', 'thaydoi'))
                                            <a title="Sửa thông tin"
                                                href="{{ url($inputs['url'] . 'thaydoi?madubao=' . $ld->madubao) }}"
                                                class="btn btn-sm btn-clean btn-icon">
                                                <i class="icon-lg la flaticon-edit-1 text-primary"></i>
                                            </a>
                                            <button title="Xóa thông tin" type="button"
                                                onclick="cfDel('{{ $inputs['url'].'Xoa?id=' . $ld->id }}')"
                                                class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                                data-toggle="modal">
                                                <i class="icon-lg flaticon-delete text-danger"></i>
                                            </button>
                                        @endif
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

    <div id="modal-nhanexcel" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form action="{{ '/nguoilaodong/import' }}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="modal-dialog modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Nhận danh sách người lao động từ file Excel</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <input type="file" name="import_file" class="form-control">
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </form>
    </div>
@endsection
