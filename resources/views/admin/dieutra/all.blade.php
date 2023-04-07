{{-- @extends ('admin.layout') --}}
@extends ('main')
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
            $('#madv').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
            });
            $('#mahuyen').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
            });

            $('#kydieutra').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
            });
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách điều tra</h3>
                    </div>
                    <div class="card-toolbar">
                        <button title="In danh sách lỗi" class="btn btn-sm btn-success" onclick="indanhsachloi()"
                            data-target="#modify-modal-dsloi" data-toggle="modal">
                            <i class="icon-lg la flaticon2-print"></i> Danh sách lỗi
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        {{-- <div class="col-md-4">
                            <label style="font-weight: bold">Đơn vị</label>

                            <select class="form-control select2basic" id="madv">
                                @foreach ($m_diaban->where('capdo', 'H') as $diaban)
                                    <optgroup label="{{ $diaban->name }}">
                                        <?php $a_xa = array_column($m_diaban->where('parent', $diaban->maquocgia)->toarray(), 'id'); ?>
                                        <?php $donvi = $m_donvi->wherein('madiaban', $a_xa); ?>
                                        @foreach ($donvi as $ct)
                                            <option {{ $ct->madv == $inputs['madv'] ? 'selected' : '' }}
                                                value="{{ $ct->madv }}">{{ $ct->tendv }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>
                            {!! Form::select('kydieutra', $a_kydieutra, $inputs['kydieutra'], [
                                'class' => 'form-control',
                                'id' => 'kydieutra',
                            ]) !!}
                        </div> --}}
                        <div class="col-md-4">
                            <label style="font-weight: bold">Huyện</label>
                            <select name="mahuyen" id="mahuyen" onchange="MaHuyen()" class="form-control select2basic">
                                @foreach ($a_huyen as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ isset($inputs['mahuyen']) ? ($inputs['mahuyen'] == $key ? 'selected' : '') : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Xã</label>
                            <select name="madv" id="madv" class="form-control select2basic">
                                <option value="">----Chọn xã ---</option>
                                @foreach ($a_xa as $key => $ct)
                                    <option value="{{ $ct->madv }}"
                                        {{ $ct->madv == $inputs['madv'] ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>

                            <select name="kydieutra" id="kydieutra" onchange="kydieutra()"
                                class="form-control select2basic">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ $key == $inputs['kydieutra'] ? 'selected' : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <div class="col-md-4 float-right">
                        </div> --}}
                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    STT
                                </th>
                                <th>Xã</th>
                                <th>Huyện</th>
                                <th>Số lượng</th>
                                <th>Số lượng lỗi</th>
                                <th>Số hộ</th>
                                <th>Kỳ</th>
                                <th>Ngày đăng</th>
                                <th>Đơn vị cập nhật</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
			$dmhc_names=array();
		foreach ($dmhc_list as $dm) {
			$dmhc_names[$dm->maquocgia]=$dm->name;
		}
		foreach ($dss as $key=>$td ){
	?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $dmhc_names[$td->xa] }}</td>
                                <td>{{ $dmhc_names[$td->huyen] }}</td>
                                <td><a href="#">{{ $td->soluong }} </a></td>
                                {{-- <td><a href="#">{{ count($data_loi->where('madv', $td->user_id)) }} </a></td> --}}
                                <td><a
                                        href="{{ '/dieutra/danhsachloi/' . $td->id . '?mahuyen=' . $td->huyen . '&kydieutra=' . $inputs['kydieutra'] }}">{{ $td->loi_cccd + $td->loi_ngaysinh + $td->loi_loai2 + $td->loi_loai3 + $td->loi_loai4 }}
                                    </a></td>
                                <td><a href="#">{{ $td->soho }} </a></td>
                                <td>{{ $td->kydieutra }}</td>
                                <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($td->created_at)) }}</span></td>
                                <td><span
                                        class="text-ellipsis">{{ $td->donvinhap != null ? $a_donvi[$td->donvinhap] : '' }}
                                    </span></td>
                                {{-- <td><span class="text-ellipsis">Trung tâm dịch vụ việc làm Quảng Bình </span></td> --}}
                                <td>
                                    @if (chkPhanQuyen('danhsachdieutra', 'danhsach'))
                                        <button title="Danh sách" type="button"
                                            onclick="List('{{ $td->user_id }}','{{ $td->kydieutra }}')"
                                            class="btn btn-sm btn-clean btn-icon" data-target="#danhsach-modal-confirm"
                                            data-toggle="modal">
                                            <i class="icon-lg flaticon-list text-success"></i>
                                        </button>
                                    @endif
                                    @if (chkPhanQuyen('danhsachdieutra', 'thaydoi'))
                                        <button title="Xóa thông tin" type="button"
                                            onclick="cfDel('{{ '/dieutra/XoaDanhSach/' . $td->id . '?mahuyen=' . $inputs['mahuyen'] . '&kydieutra=' . $inputs['kydieutra'] }}')"
                                            class="btn btn-sm btn-clean btn-icon ml-3" data-target="#delete-modal-confirm"
                                            data-toggle="modal">
                                            <i class="icon-lg flaticon-delete text-danger"></i>
                                        </button>
                                    @endif
                                    @if (chkPhanQuyen('danhsachdieutra', 'hoanthanh'))
                                        {{-- <div class="col-md-4 float-right" style="margin-left: 97%;margin-top: -2%"> --}}
                                        {{-- <a href="{{'/nhankhau-in?madv='.$td->user_id.'&kydieutra='.$td->kydieutra}}" title="In"  class="btn btn-sm btn-clean btn-icon ml-3" target="_blank">
                                            <i class="icon-lg la flaticon2-print text-primary"></i>
                                        </a> --}}

                                        <button 
                                            onclick="Inchitiet('{{ $td->user_id }}','{{ $td->kydieutra }}')"
                                            data-target="#in-modal-confirm" data-toggle="modal" title="In"
                                            class="btn btn-sm btn-clean btn-icon ml-3">
                                            <i class="icon-lg la flaticon2-print text-primary"></i>
                                        </button>
                                        {{-- </div> --}}
                                    @endif
                                </td>

                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <!--Model delete-->
        <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <form id="frmDelete" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xóa</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <label> <b>Nếu xóa thì sẽ xóa tất cả các nhân khẩu thuộc xã trên phần mềm trong kỳ điều tra
                                    này</b></label>
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

        <!--Model danh sách-->
        <div id="danhsach-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            <form id="frmDanhsach" method="POST" action="{{ '/nhankhau/danhsach_tinhtrang' }}" accept-charset="UTF-8"
                enctype="multipart/form-data" target='_blank'>
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">Danh sách</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                        </div>
                        <div class="modal-body">
                            <select name="tinhtrang" id="" class="form-control select2basic"
                                style="width:100%">
                                <option value="2">Thất nghiệp</option>
                                <option value="3">Không tham gia hoạt động kinh tế</option>
                                <option value="4">Sắp tốt nghiệp PTTH</option>
                            </select>
                            <input type="hidden" name='madv' id='madonvi'>
                            <input type="hidden" name='kydieutra' id='ky_dieu_tra'>
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
        <!-- modal in tổng hợp -->
        <form method="POST" action="" accept-charset="UTF-8" id="frm_modify_in" target="_blank">
            @csrf
            <div id="modify-modal-in" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">In tổng hợp</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 mb-2">
                                <label class="control-label">Đơn vị</label>
                                {{-- {!! Form::select('tinhtrangvl', setArray($a_tinhtrangvl,'Tất cả',null), ['id' => 'tinhtrangvl', 'class' => 'form-control select2basic']) !!} --}}
                                <select name="madv" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($a_dsdv as $key => $ct)
                                        <option value="{{ $key }}">{{ $ct }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="hidden" name='math' id='math'> --}}
                            </div>
                            <div class="col-lg-12">
                                <label class="control-label">Kỳ điều tra</label>
                                <select name="kydieutra" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($a_kydieutra as $key => $ct)
                                        <option value="{{ $key }}">{{ $ct }}</option>
                                    @endforeach
                                </select>
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
            </div>
        </form>

        <!--Model in-->
        <div id="in-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Danh sách</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{-- <select name="tinhtrang" id="" class="form-control select2basic" style="width:100%">
                                            <option value="1">Mẫu 01/PLI (NĐ 145/2020)</option>
                                            <option value="2">Mẫu 02 (TT 01/2022)</option>
                                        </select> --}}
                        <a href="" id='mau01' target="_blank">1. Danh sách điều tra</a></br>
                        <form id="dsloi" method="POST" action="" accept-charset="UTF-8" enctype="multipart/form-data" target='_blank'>
                            @csrf
                        <button  type="submit" style="border: none;background-color:transparent;color:#6993FF;margin-left: -8px" >2. Danh sách lỗi</button>
                        </form>
                        <input type="hidden" name='madv' id='madonvi'>
                        <input type="hidden" name='kydieutra' id='ky_dieu_tra'>
                    </div>
                </div>
            </div>
        </div>
            <!-- modal in danh sách lỗi huyện -->
            <div id="modify-modal-dsloi" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                aria-hidden="true">
                <form method="POST" action="" accept-charset="UTF-8" id="frm_modify_dsloi" target="_blank">
                    @csrf
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <h4 id="modal-header-primary-label" class="modal-title">In danh sách lỗi huyện</h4>
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-12">
                                    <label class="control-label">Kỳ điều tra</label>
                                    <select name="kydieutra" id="kydieutra_dsloi" class="form-control"
                                        style="width:100%">
                                        <option value="">Tất cả</option>
                                        @foreach ($a_kydieutra as $key => $ct)
                                            <option value="{{ $key }}">{{ $ct }}</option>
                                        @endforeach
                                    </select>
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
            function intonghop() {
                var url = '/dieutra/intonghop'
                $('#frm_modify_in').attr('action', url);
            }

            function cfDel(url) {
                $('#frmDelete').attr('action', url);
            }

            function subDel() {
                $('#frmDelete').submit();
            }

            function List(madv, kydieutra) {
                $('#madonvi').val(madv);
                $('#ky_dieu_tra').val(kydieutra);
            }

            function Inchitiet(madv, kydieutra) {
                var url1 = '/nhankhau-in?madv=' + madv + '&kydieutra=' + kydieutra;
                $('#mau01').attr('href', url1);

                var url2 = '/dieutra/indanhsachloi?madv=' + madv + '&kydieutra=' + kydieutra;
                $('#dsloi').attr('action', url2);
            }

            function indanhsachloi() {
                var mahuyen = $('#mahuyen').val();
                var kydieutra = $('#kydieutra').val();

                $('#kydieutra_dsloi option[value=' + kydieutra + ' ]').attr('selected', 'selected');
                var kydieutra_dsloi = $('#kydieutra_dsloi').val();
                var url = '/dieutra/indanhsachloi?mahuyen=' + mahuyen + '&kydieutra=' + kydieutra_dsloi;
                $('#frm_modify_dsloi').attr('action', url);

            }
        </script>
    @endsection
