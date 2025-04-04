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
            // $('#madv').change(function() {
            //     // window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
            //     //     '&kydieutra=' + $('#kydieutra').val();
            //     window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
            //         '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val()+ '&vieclammongmuon=' + $('#vieclammongmuon').val()+ '&tinhtranghdkt=' + $('#tinhtranghdkt').val();
            // });
            // $('#mahuyen').change(function() {
            //     window.location.href = "{{ $inputs['url'] }}" + '?madv=' +
            //         '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val()+ '&vieclammongmuon=' + $('#vieclammongmuon').val()+ '&tinhtranghdkt=' + $('#tinhtranghdkt').val();
            // });
            // $('#kydieutra').change(function() {
            //     window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
            //         '&kydieutra=' + $('#kydieutra').val()+ '&vieclammongmuon=' + $('#vieclammongmuon').val()+ '&tinhtranghdkt=' + $('#tinhtranghdkt').val();
            // });
            $('#madv, #mahuyen, #kydieutra, #vieclammongmuon, #tinhtranghdkt ').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?madv=' + $('#madv').val() +
                    '&kydieutra=' + $('#kydieutra').val() + '&mahuyen=' + $('#mahuyen').val()+ '&vieclammongmuon=' + $('#vieclammongmuon').val()+ '&tinhtranghdkt=' + $('#tinhtranghdkt').val();
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
                        <h3 class="card-label text-uppercase">Danh sách người tìm việc</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{URL::to('nhankhau-ba') }}" class="btn btn-xs btn-success"><i class="fa fa-file-import"></i> &ensp;Nhận excel</a> --}}
                        @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $inputs['kydieutra'] == date('Y'))
                            <div class="card-toolbar">
                                <a onclick="themmoi('{{ $inputs['madv'] }}','{{ $inputs['kydieutra'] }}')"
                                    class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i> &ensp;Thêm</a>
                            </div>
                        @endif
                        <button data-target="#taonhanh-modal-confirm" data-toggle="modal"
                        class="btn btn-xs btn-success mr-3">
                        <i class=" flaticon-paper-plane"></i>Tạo nhanh
                    </button>
                        @if (session('admin')->capdo == 'H')
                            <button title="In danh sách lỗi" class="btn btn-sm btn-success" onclick="indanhsachloi()"
                                data-target="#modify-modal-dsloi" data-toggle="modal">
                                <i class="icon-lg la flaticon2-print"></i> Danh sách lỗi
                            </button>
                        @endif

                        @if (session('admin')->capdo == 'X')
                            <button onclick="Inchitiet('{{ session('admin')->madv }}','{{ $inputs['kydieutra'] }}')"
                                data-target="#in-modal-confirm" data-toggle="modal" title="In"
                                class="btn btn-sm btn-success ml-3">
                                <i class="icon-lg la flaticon2-print text-primary"></i>Xuất danh sách
                            </button>
                        @endif
                        @if (session('admin')->capdo == 'T')
                            <button onclick="Inchitiet('{{ $inputs['madv'] }}','{{ $inputs['kydieutra'] }}')"
                                data-target="#in-modal-confirm" data-toggle="modal" title="In"
                                class="btn btn-sm btn-success ml-3">
                                <i class="icon-lg la flaticon2-print text-primary"></i>In Danh Sách
                            </button>
                        @endif
                        <a href="{{'/TraCuu?madv='.$inputs['madv']}}" class="btn btn-sm btn-success ml-3"><i class="icon-lg la flaticon2-search text-primary"></i>Tra cứu
                    </a>
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
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Việc làm mong muốn</label>

                            <select name="vieclammongmuon" class="form-control" id='vieclammongmuon'>
                                <option value="ALL">Tất cả</option>
                                <option value="1" {{$inputs['vieclammongmuon'] == 1?'selected':''}} >Trong
                                    tỉnh,
                                    trong nước</option>
                                <option value="2" {{$inputs['vieclammongmuon'] == 2?'selected':''}} >Đi
                                    làm việc
                                    ở nước ngoài</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label style="font-weight: bold">Tình trạng hoạt động kinh tế</label>
                                <select name="tinhtranghdkt" class="form-control selec2basic" id='tinhtranghdkt'>
                                    <option value="ALL">Tất cả</option>
                                    @foreach ($m_tinhtrangvl as $val)
                                        <option value="{{$val->stt}}" {{$inputs['tinhtranghdkt'] == $val->stt?'selected':''}}>{{$val->tentgkt}}</option>
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
                                <th>Điện thoại</th>
                                <th>Địa chỉ</th>
                                {{-- <th>Tình trạng việc làm</th>
                                <th>Nơi làm việc</th> --}}
                                <th>Thao tác</th>
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
                                <td><span class="text-center"> </span> {{ $ld->cccd }}</td>
                                <td><span class="text-center"> </span>{{ getDayVn($ld->ngaysinh) }}</td>
                                <td><span class="text-center"> </span>{{ $ld->sdt }}</td>
                                <td><span class="text-center"> </span>{{ $ld->diachi }}</td>
                                {{-- <td><span class="text-ellipsis">
                                    </span>{{ $danhsachtinhtrangvl[$ld->tinhtranghdkt] ?? '' }}
                                </td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->noilamviec }}</td> --}}
                                <td class="text-center">
                                    @if (chkPhanQuyen('danhsachdieutra', 'thaydoi') && $ld->kydieutra == date('Y'))
                                        <button onclick="baogiam('{{ $ld->id }}')" data-target="#baogiam"
                                            data-toggle="modal" title="Báo giảm" class="btn btn-xs btn-warning ml-3"> Giảm
                                            {{-- <i class="fa fa-arrows-down-to-people"></i> --}}
                                        </button>
                                    @endif

                                    <a href="{{ '/nhankhau-innguoilaodong?id=' . $ld->id }}" title="In thông tin"
                                        target="_blank" class="btn btn-xs btn-primary ml-3">
                                        <i class="icon-lg la flaticon2-print text-dark"></i></a>
                                </td>
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
                        <textarea name="lydo" id="lydo" class="form-control" rows="4" required ></textarea>
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
                                    <option value="{{ $key }}"
                                        {{ $key == $inputs['kydieutra'] ? 'selected' : '' }}>
                                        {{ $ct }}</option>
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
        <!--create Modal-->
        <div class="modal fade" id="taonhanh-modal-confirm" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-label">
                        Thông tin việc cần tìm
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                {!! Form::open([
                    'url' => '',
                    'method' => 'post',
                    'id' => 'frm_create_edit',
                ]) !!}
                {{-- @csrf --}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Họ tên*</b></label>
                                <input type="text" id="hoten" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Vị trí</b></label>
                                <input type="text" id="vitri" name="vitri" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Kinh nghiệm</b></label>
                                <input type="text" id="kinhnghiem" name="kinhnghiem" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Trình độ</b></label>
                                <select class="form-control" name="trinhdo">
                                    <option value="daihoc">Không yêu cầu</option>
                                    <option value="daihoc">Đại học</option>
                                    <option value="caodang">Cao đẳng</option>
                                    <option value="trungcap">Trung cấp</option>
                                    <option value="cap3">Tốt nghiệp cấp 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Hình thức làm việc</b></label>
                                <select class="form-control" name="hinhthuclamviec">
                                    <option value="0">Toàn thời gian</option>
                                    <option value="1">Bán thời gian</option>
                                    <option value="2">Theo ca</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger font-weight-bold">Đồng ý</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
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
            if ($('#madv').val() == '') {
                toastr.warning('Bạn chưa chọn xã');
            } else {
                huyen = $('#mahuyen').val();
                url = '/dieutra/create?madv=' + madv + '&kydieutra=' + kydieutra + '&huyen=' + huyen;
                window.location.href = url;
            }

        }

        function baogiam(id) {
            var url = '/biendong/baogiam/' + id;
            $('#giam').attr('action', url);
        }
    </script>
@endsection
