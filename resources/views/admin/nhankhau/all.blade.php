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
            $('#madv').change(function() {
                // window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                //     '&kydieutra=' + $('#kydieutra').val();
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
            });
            $('#mahuyen').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
            });
            $('#kydieutra').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val();
            });
            // getxa();
            // getdulieu();

        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách nhân khẩu</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{URL::to('nhankhau-ba') }}" class="btn btn-xs btn-success"><i class="fa fa-file-import"></i> &ensp;Nhận excel</a> --}}
                        @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $inputs['kydieutra'] == date('Y'))
                            <div class="card-toolbar">
                                <a onclick="themmoi('{{ $inputs['madv'] }}','{{ $inputs['kydieutra'] }}')"
                                    class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i> &ensp;Thêm</a>
                            </div>
                        @endif
                        @if (session('admin')->capdo == 'H')
                            <button title="In danh sách lỗi" class="btn btn-sm btn-success" onclick="indanhsachloi()"
                                data-target="#modify-modal-dsloi" data-toggle="modal">
                                <i class="icon-lg la flaticon2-print"></i> Danh sách lỗi
                            </button>
                        @else
                            <button onclick="Inchitiet('{{ session('admin')->madv }}','{{ $inputs['kydieutra'] }}')"
                                data-target="#in-modal-confirm" data-toggle="modal" title="In"
                                class="btn btn-sm btn-success ml-3">
                                <i class="icon-lg la flaticon2-print text-primary"></i>Danh sách lỗi
                            </button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>

                            <select name="kydieutra" id="kydieutra" class="form-control select2basic">
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ $key == $inputs['kydieutra'] ? 'selected' : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label style="font-weight: bold">Xã</label>
                            <select name="madv" id="madv" class="form-control select2basic">
                                @if (in_array(session('admin')->capdo, ['T', 'H']))
                                    <option value="">----Chọn xã---</option>
                                @endif

                                @foreach ($a_xa as $key => $ct)
                                    <option value="{{ $ct->madv }}"
                                        {{ $ct->madv == $inputs['madv'] ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label style="font-weight: bold">Huyện</label>
                            <select name="mahuyen" id="mahuyen" class="form-control select2basic">
                                @foreach ($a_huyen as $key => $ct)
                                    <option value="{{ $key }}"
                                        {{ isset($inputs['mahuyen']) ? ($inputs['mahuyen'] == $key ? 'selected' : '') : '' }}>
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Tình trạng việc làm</th>
                                <th>Nơi làm việc</th>
                                @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $inputs['kydieutra'] == date('Y'))
                                    <th>Thao tác</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
		foreach ($lds as $key=>$ld ){
	?>
                            <tr>
                                <td>{{ ++$key }} </td>
                                <td><a
                                        href="{{ URL::to('/nhankhau/ChiTiet/' . $ld->id . '?mahuyen=' . $inputs['mahuyen'] . '&view=nhankhau') }}">{{ $ld->hoten }}</a>
                                </td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cccd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayVn($ld->ngaysinh) }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->thuongtru }}</td>
                                <td><span class="text-ellipsis">
                                    </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? '' }}
                                </td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->noilamviec }}</td>
                                @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $ld->kydieutra == date('Y'))
                                    <td class="text-ellipsis">
                                        <button onclick="baogiam('{{ $ld->id }}')" data-target="#baogiam"
                                            data-toggle="modal" title="Báo giảm" class="btn btn-xs btn-warning ml-3"> Giảm
                                            {{-- <i class="fa fa-arrows-down-to-people"></i> --}}
                                        </button>
                                        {{-- <a href="{{'/nhankhau-innguoilaodong?id='.$ld->id}}" class="btn btn-sm mr-2" title="In danh sách" target="_blank">
                                        <i class="icon-lg la flaticon2-print text-dark"></i></a> --}}
                                    </td>
                                @endif
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!--Modal báo giảm-->
    <div id="baogiam" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="giam" method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    {{-- <div class="modal-body">
                            <label> <b>Nếu xóa thì sẽ xóa tất cả các nhân khẩu thuộc xã trên phần mềm trong kỳ điều tra
                                    này</b></label>
                        </div> --}}

                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- modal --}}
    <div id="cungld-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frm_cungld" method="get" accept-charset="UTF-8" action="{{ '/nhankhau-in' }}" target="_blank">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Báo cáo chi tiết nhân khẩu</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">

                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Đơn vị</b></label><br>
                                <select style="width: 100%" class="col-xl-12 select2basic form-control" id="user_id"
                                    name="user_id">
                                    @foreach ($dmdonvi as $dv)
                                        <option value="{{ $dv->madv }}">{{ $dv->tendv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-12">
                            <div class="form-group fv-plugins-icon-container">
                                <label style="font-weight:bold;">Kỳ Điều tra</label><br>
                                <select style="width: 100%" class="col-xl-12 select2basic form-control" id="danhsach_id"
                                    name="danhsach_id">
                                    @foreach ($danhsach as $ds)
                                        <option value="{{ $ds->id }}">{{ $ds->kydieutra }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng
                            ý gửi</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!--Model in danh sách lỗi xã-->
    <div id="in-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Danh sách</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <a href="" id='mau01' target="_blank">1. Danh sách điều tra</a></br>
                    <form id="dsloi" method="POST" action="" accept-charset="UTF-8"
                        enctype="multipart/form-data" target='_blank'>
                        @csrf
                        <button type="submit"
                            style="border: none;background-color:transparent;color:#6993FF;margin-left: -8px">2. Danh sách
                            lỗi</button>
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
                            <label class="control-label">Xã</label>
                            <select name="maxa" id="maxa" class="form-control" style="width:100%">
                                <option value="">Tất cả</option>
                                @foreach ($a_xa as $key => $ct)
                                    <option value="{{ $ct->madv }}">{{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 mt-2">
                            <label class="control-label">Kỳ điều tra</label>
                            <select name="kydieutra" id="kydieutra_dsloi" class="form-control" style="width:100%">
                                <option value="">Tất cả</option>
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $key }}" {{$key==$inputs['kydieutra']?'selected':''}}>{{ $ct }}</option>
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

        function getxa() {
            var madv = $('#mdv').val;
            var url = '/nhankhau/get_xa?madv=' + madv;
            var mahuyen = $('#mahuyen').val();
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mahuyen: mahuyen
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    $('#madv').find('.xa').remove();
                    $('#madv').append(data);
                },
                error: function(message) {
                    toastr.error(message, 'Lỗi!');
                }
            });
        };

        function getdulieu() {
            madv = $('#madv').val();
            window.location.href = "{{ $inputs['url'] }}" + '?madv=' + madv +
                '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val();
            // $('#madv option[value=' + madv + ' ]').attr('selected', 'selected');
            // getxa();
        }

        function themmoi(madv, kydieutra) {
            huyen = $('#huyen').val();
            xa = $('#xa').val();
            url = '/dieutra/create?madv=' + madv + '&kydieutra=' + kydieutra + '&huyen=' + huyen + '&xa=' + xa;
            window.location.href = url;
        }

        function baogiam(id) {
            console.log(1)
            var url = '/biendong/baogiam/' + id;
            $('#giam').attr('action', url);
        }
    </script>
@endsection

