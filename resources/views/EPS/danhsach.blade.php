{{-- @extends ('admin.layout') --}}
@extends ('main')
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
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách người lao động đăng ký thi EPS</h3>
                    </div>
                    <div class="card-toolbar">
                        @if (chkPhanQuyen('danhsachdangkyeps', 'hoanthanh'))
                            <button title="In tổng hợp" class="btn btn-sm btn-success" data-target="#modify-modal"
                                data-toggle="modal">
                                <i class="icon-lg la flaticon2-print"></i> Tổng hợp
                            </button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th width="2%"> STT </th>
                                <th width="6%"> Số báo danh </th>
                                <th width="15%">Họ tên</th>
                                <th width="5%">Ngày sinh</th>
                                <th width="4%" style="text-align: center">Giới tính</th>
                                <th width="5%"> Số CCCD/<br>Hộ chiếu</th>
                                <th width="14%"> Ngành đăng ký dự thi</th>
                                <th width="5%">Điện thoại</th>
                                <th>Xã</th>
                                <th>Huyện</th>
                                <th>Tỉnh</th>
                                <th>Dấu thời gian</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $k => $ct)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td style="text-align: center">{{ $ct->sobaodanh }}</td>
                                    <td>
                                        <a href="/EPS/Edit/{{ $ct->id }}">{{ $ct->hoten }}</a>
                                    </td>
                                    <td>{{ getDayVn($ct->ngaysinh) }}</td>
                                    <td style="text-align: center">{{ $ct->gioitinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    <td>{{ $ct->cccd }}</td>
                                    <td>{{ NganhDKthi()[$ct->nganhdkthi] }}</td>
                                    <td style="text-align: center">{{ $ct->sdt }}</td>
                                    <td width="7%">{{ $ct->xa }}</td>
                                    <td width="7%">{{ $ct->huyen }}</td>
                                    <td width="7%">{{ $ct->tinh }}</td>
                                    <td width="10%">{{ \Carbon\Carbon::parse($ct->created_at)->format('s:i:h d/m/Y') }}
                                    </td>
                                    <td style="text-align: center">
                                        @if (chkPhanQuyen('danhsachdangkyeps', 'hoanthanh'))
                                            <button title="In thông tin" type="button"
                                                onclick="inphieu('{{ $ct->id }}')"
                                                class="btn btn-sm btn-clean btn-icon" data-target="#mauphieu-modal-confirm"
                                                data-toggle="modal">
                                                <i class="icon-lg la flaticon2-print text-primary"></i>
                                            </button>
                                        @endif
                                        @if (chkPhanQuyen('danhsachdangkyeps', 'thaydoi'))
                                            <button title="Xóa thông tin" type="button"
                                                onclick="cfDel('{{ '/EPS/Del/' . $ct->id }}')"
                                                class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                                data-toggle="modal">
                                                <i class="icon-lg flaticon-delete text-danger"></i></button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('includes.delete')
    <!-- Modal xóa -->
    {{-- <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" onclick="subDel()" data-dismiss="modal" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div> --}}
    <!-- Modal tổng hợp -->
    <div id="modify-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmDanhsach" method="POST" action="/EPS/TongHop" accept-charset="UTF-8" enctype="multipart/form-data"
            target='_blank'>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Danh sách người lao động</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label class="control-label">Từ ngày</label>
                            <input type="date" name='ngaytu' class="form-control">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <label class="control-label">Đến ngày</label>
                            <input type="date" name='ngayden' class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal in mẫu phiếu -->
    <div id="mauphieu-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmDanhsach" method="POST" action="/EPS/TongHop" accept-charset="UTF-8" enctype="multipart/form-data"
            target='_blank'>
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Chọn mẫu phiếu in</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <a href="" id="phieu04" target="_blank">1. Mẫu phụ lục 04</a>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <a href="" id="phieuthu" target="_blank">2. Phiếu thu</a>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" id="submit" name="submit" value="submit"
                            class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function inphieu(id) {
            var url = '/EPS/Phuluc4?id=' + id;
            var url1 = '/EPS/Phieuthu?id=' + id;
            $('#phieu04').attr('href', url);
            $('#phieuthu').attr('href', url1);
        }
    </script>
@endsection
