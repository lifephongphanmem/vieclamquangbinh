@extends('main')
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
    <!--begin::Row-->
    <div class="row">
        <div class="col-xl-12">
            <!--begin::Example-->
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh mục chức năng</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                            <button type="button" onclick="add()" class="btn btn-success btn-xs btn-icon"
                                data-target="#modify-modal" data-toggle="modal" title="Thêm mới">
                                <i class="fa fa-plus"></i></button>
                        {{-- @endif --}}
                        {{-- <button class="btn btn-sm btn-icon btn-success mr-2" title="Nhận dữ liệu từ file Excel"
                            data-target="#modal-nhanexcel" data-toggle="modal">
                            <i class="fas fa-file-import"></i>
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th>STT</th>
                                <th>Mã số</th>
                                <th>Tên chức năng</th>
                                <th>Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $model_cd1 = $model->where('capdo', 1);
                            $i = 1;
                            ?>
                            @foreach ($model_cd1 as $key => $cd1)
                                <tr>
                                    @if ($cd1->trangthai == 1)
                                        <td>{{ convert2Roman($i++) }}</td>
                                        <td>{{ $cd1->maso }}</td>
                                        <td>{{ $cd1->tencn }}</td>
                                        @if ($cd1->capdo == 1)
                                            <td style="text-decoration: none;text-align: center">
                                                {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                    <button onclick="getChucNang('{{ $cd1->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la fa-edit text-primary icon-2x"></i></button>
                                                    <button
                                                        onclick="addChucNang('{{ $cd1->capdo }}','{{ $cd1->maso }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thêm chức năng" data-toggle="modal">
                                                        <i class="icon-lg la fa-plus text-primary icon-2x"></i>
                                                    </button>
                                                    <button title="Xóa thông tin" type="button"
                                                        onclick="cfDel('{{ '/Chuc_nang/destroy/' . $cd1->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon"
                                                        data-target="#delete-modal-confirm" data-toggle="modal">
                                                        <i class="icon-lg la fa-trash-alt text-danger icon-2x"></i>
                                                    </button>
                                                {{-- @endif --}}
                                            </td>
                                        @else
                                            <td style="text-decoration: none;text-align: center">
                                                {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                    <button onclick="getChucNang('{{ $cd1->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la fa-edit text-dark icon-2x"></i></button>

                                                    <button
                                                        onclick="addChucNang('{{ $cd1->capdo }}','{{ $cd1->maso }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thêm chức năng" data-toggle="modal">
                                                        <i class="icon-lg la fa-plus text-dark icon-2x"></i>
                                                    </button>
                                                    <button title="Xóa thông tin" type="button"
                                                        onclick="cfDel('{{ '/Chuc_nang/destroy/' . $cd1->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon"
                                                        data-target="#delete-modal-confirm" data-toggle="modal">
                                                        <i class="icon-lg la fa-trash-alt text-danger icon-2x"></i>
                                                {{-- @endif --}}
                                                </button>
                                            </td>
                                        @endif
                                    @else
                                        <td style="text-decoration: line-through;">{{ convert2Roman($i++) }}</td>
                                        <td style="text-decoration: line-through;">{{ $cd1->maso }}</td>
                                        <td style="text-decoration: line-through;">{{ $cd1->tencn }}</td>
                                        @if ($cd1->capdo == 1)
                                            <td style="text-decoration: none;text-align: center">
                                                {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                    <button onclick="getChucNang('{{ $cd1->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la fa-edit text-primary icon-2x"></i></button>
                                                {{-- @endif --}}
                                            </td>
                                        @else
                                            <td style="text-decoration: none;text-align: center">
                                                {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                    <button onclick="getChucNang('{{ $cd1->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la fa-edit text-dark icon-2x"></i></button>
                                                {{-- @endif --}}
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                                <?php $model_cd2 = $model->where('machucnang_goc', $cd1->maso);
                                $j = 1;
                                ?>
                                @foreach ($model_cd2 as $cd2)
                                    <tr>
                                        @if ($cd2->trangthai == 1)
                                            <td>{{ convert2Roman($i - 1) . '--' . $j++ }}</td>
                                            <td>{{ $cd2->maso }}</td>
                                            <td>{{ $cd2->tencn }}</td>
                                            <td style="text-decoration: none;text-align: center">
                                                {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                    <button onclick="getChucNang('{{ $cd2->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la fa-edit text-success icon-2x"></i></button>

                                                    <button
                                                        onclick="addChucNang('{{ $cd2->capdo }}','{{ $cd2->maso }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thêm chức năng" data-toggle="modal">
                                                        <i class="icon-lg la fa-plus text-success icon-2x"></i>
                                                    </button>
                                                    <button title="Xóa thông tin" type="button"
                                                        onclick="cfDel('{{ '/Chuc_nang/destroy/' . $cd2->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon"
                                                        data-target="#delete-modal-confirm" data-toggle="modal">
                                                        <i class="icon-lg la fa-trash-alt text-danger icon-2x"></i>
                                                    </button>
                                                {{-- @endif --}}
                                            </td>
                                        @else
                                            <td style="text-decoration: line-through;">
                                                {{ convert2Roman($i - 1) . '--' . $j++ }}</td>
                                            <td style="text-decoration: line-through;">{{ $cd2->maso }}</td>
                                            <td style="text-decoration: line-through;">{{ $cd2->tencn }}</td>
                                            <td style="text-decoration: none;text-align: center">
                                                {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                    <button onclick="getChucNang('{{ $cd2->id }}')"
                                                        class="btn btn-sm btn-clean btn-icon" data-target="#modify-modal"
                                                        title="Thay đổi thông tin" data-toggle="modal">
                                                        <i class="icon-lg la fa-edit text-success icon-2x"></i></button>
                                                {{-- @endif --}}
                                            </td>
                                        @endif
                                    </tr>
                                    <?php $model_cd3 = $model->where('machucnang_goc', $cd2->maso);
                                    $y = 1;
                                    
                                    ?>
                                    @foreach ($model_cd3 as $cd3)
                                        <tr>
                                            @if ($cd3->trangthai == 1)
                                                <td>{{ convert2Roman($i - 1) . '--' . ($j - 1) . '--' . $y++ }}</td>
                                                <td>{{ $cd3->maso }}</td>
                                                <td>{{ $cd3->tencn }}</td>
                                                <td style="text-decoration: none;text-align: center">
                                                    {{-- @if (chkPhanQuyen('chucnang', 'thaydoi')) --}}
                                                        <button onclick="getChucNang('{{ $cd3->id }}')"
                                                            class="btn btn-sm btn-clean btn-icon"
                                                            data-target="#modify-modal" title="Thay đổi thông tin"
                                                            data-toggle="modal">
                                                            <i class="icon-lg la fa-edit text-dark icon-2x"></i></button>

                                                        <button
                                                            onclick="addChucNang('{{ $cd3->capdo }}','{{ $cd2->maso }}')"
                                                            class="btn btn-sm btn-clean btn-icon"
                                                            data-target="#modify-modal" title="Thêm chức năng"
                                                            data-toggle="modal">
                                                            <i class="icon-lg la fa-plus text-dark icon-2x"></i>
                                                        </button>
                                                        <button title="Xóa thông tin" type="button"
                                                            onclick="cfDel('{{ '/Chuc_nang/destroy/' . $cd3->id }}')"
                                                            class="btn btn-sm btn-clean btn-icon"
                                                            data-target="#delete-modal-confirm" data-toggle="modal">
                                                            <i class="icon-lg la fa-trash-alt text-danger icon-2x"></i>
                                                        </button>
                                                    {{-- @endif --}}
                                                </td>
                                            @else
                                                <td style="text-decoration: line-through;">
                                                    {{ convert2Roman($i - 1) . '--' . ($j - 1) . '--' . $y++ }}</td>
                                                <td style="text-decoration: line-through;">{{ $cd3->maso }}</td>
                                                <td style="text-decoration: line-through;">{{ $cd3->tencn }}</td>
                                                <td style="text-decoration: none;text-align: center">
                                                    @if (chkPhanQuyen('chucnang', 'thaydoi'))
                                                        <button onclick="getChucNang('{{ $cd3->id }}')"
                                                            class="btn btn-sm btn-clean btn-icon"
                                                            data-target="#modify-modal" title="Thay đổi thông tin"
                                                            data-toggle="modal">
                                                            <i class="icon-lg la fa-edit text-dark icon-2x"></i></button>
                                                    @endif
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Card-->
            <!--end::Example-->
        </div>
    </div>

    <!--Model delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Nếu xóa thì sẽ xóa tất cả các chức năng
                            phụ thuộc</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" onclick="subDel()" data-dismiss="modal" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--end::Row-->
    <form method="POST" action="" accept-charset="UTF-8" id="frm_modify">
        @csrf
        <div id="modify-modal" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Thông tin chức năng</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    </div>
                    <div class="modal-body" data-select2-id="148">
                        <div class="form-horizontal" data-select2-id="147">
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label class="control-label">Mã số</label>
                                    <input class="form-control" name="maso" type="text" id="maso">
                                </div>

                                <div class="col-lg-8">
                                    <label class="control-label">Tên chức năng<span class="require">*</span></label>
                                    <input class="form-control" required="required" name="tencn" type="text"
                                        id="tencn">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Cấp độ</label>
                                    <select class="form-control select2me" name="capdo" id="capdo">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Chức năng gốc</label>
                                    <select class="form-control select2me " name='machucnang_goc' id='machucnang_goc'>
                                        <option value="">Không chọn</option>
                                        @foreach ($model as $item)
                                            <option value="{{ $item->maso }}">{{ $item->tencn }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Trạng thái</label>
                                    <select class="form-control select2me " name="trangthai" id="trangthai">
                                        <option value="0">Khóa chức năng</option>
                                        <option value="1">Kích hoạt</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit" id='edit'>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function cfDel(url) {
            $('#frmDelete').attr('action', url);
        }

        function subDel() {
            $('#frmDelete').submit();
        }

        function add() {
            $('#machucnang_goc').val('');
            $('#capdo').val('');
            $('#maso').val('');
            $('#tencn').val('');
            $('#edit').val('')
            $('#trngthai').val('')
            var url = '/Chuc_nang/store';
            $("#frm_modify").attr("action", url);

        }

        function addChucNang(capdo, maso) {
            var cd = ++capdo;
            var url = '/Chuc_nang/store';
            $('#capdo option[value=' + cd + ' ]').attr('selected', false);
            $('#capdo option[value=' + cd + ' ]').attr('selected', 'selected');
            $('#machucnang_goc option[value=' + maso + ' ]').attr('selected', false);
            $('#machucnang_goc option[value=' + maso + ' ]').attr('selected', 'selected');
            $("#frm_modify").attr("action", url);
        }

        function getChucNang(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/Chuc_nang/edit/' + id,
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#maso').val(data.maso);
                    $('#tencn').val(data.tencn);
                    $('#edit').val(data.id);
                    $('#capdo option[value=' + data.capdo + ' ]').attr('selected', false);
                    $('#capdo option[value=' + data.capdo + ' ]').attr('selected', 'selected');
                    $('#machucnang_goc option[value=' + data.machucnang_goc + ' ]').attr('selected', false);
                    $('#machucnang_goc option[value=' + data.machucnang_goc + ' ]').attr('selected',
                        'selected');
                    $('#trangthai option[value=' + data.trangthai + ']').attr('selected', false);
                    $('#trangthai option[value=' + data.trangthai + ']').attr('selected', 'selected');

                    var url = '/Chuc_nang/store';
                    $("#frm_modify").attr("action", url);
                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        }
    </script>
@stop
