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
                        <h3 class="card-label text-uppercase">Biến động</h3>
                    </div>
                    <div class="card-toolbar">
                        @if (chkPhanQuyen('biendonghuyen', 'hoanthanh'))
                        <button title="In tổng hợp" class="btn btn-sm btn-success" onclick="intonghop()"
                            data-target="#modify-modal-intonghop" data-toggle="modal">
                            <i class="icon-lg la flaticon2-print"></i> In tổng hợp
                        </button>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">

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
                            <tr class="text-center">
                                <th style="width:20px;">
                                    STT
                                </th>
                                <th>Xã</th>
                                <th>Huyện</th>
                                {{-- <th>Số lượng</th>
                                <th>Số lượng lỗi</th>
                                <th>Số hộ</th> --}}
                                <th>Kỳ</th>
                                <th>Số lượng</th>
                                {{-- <th>Đơn vị cập nhật</th> --}}
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($xa_biendong as $key=>$val )
                                <tr>
                                    <td class="text-center">{{++$key}}</td>
                                    <td><a href="{{'/biendong/ChiTiet?madv='.$val->madv.'&kydieutra='.$inputs['kydieutra']}}">{{$val->name}}</a></td>
                                    {{-- <td>{{$inputs['huyen']}}</td> --}}
                                    <td>{{$a_huyen[$inputs['mahuyen']]}}</td>
                                    <td class="text-center">{{$val->kydieutra}}</td>
                                    <td class="text-center">{{dinhdangso($val->soluong)}}</td>
                                    <td class="text-center">
                                        @if (chkPhanQuyen('biendongxa', 'hoanthanh'))
                                        @if ($val->soluong != 0)
                                        <a href="{{ '/biendong/inbiendong?madv=' . $val->madv . '&kydieutra=' . $val->kydieutra }}"                                           
                                            class="btn btn-sm btn-clean btn-icon ml-3" target="_blank">
                                            <i class="icon-lg la flaticon2-print text-primary"></i>
                                        </a> 
                                        @endif

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


        <!-- modal in tổng hợp -->
        <form method="POST" action="" accept-charset="UTF-8" id="frm_modify_in" target="_blank">
            @csrf
            <div id="modify-modal-intonghop" tabindex="-1" class="modal fade kt_select2_modal" style="display: none;"
                aria-hidden="true">
                <div class="modal-dialog modal-xs">
                    <div class="modal-content">
                        <div class="modal-header modal-header-primary">
                            <h4 id="modal-header-primary-label" class="modal-title">In tổng hợp biến động</h4>
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="col-lg-12 mb-2">
                                <label class="control-label">Đơn vị</label>
                                {{-- {!! Form::select('tinhtrangvl', setArray($a_tinhtrangvl,'Tất cả',null), ['id' => 'tinhtrangvl', 'class' => 'form-control select2basic']) !!} --}}
                                <select name="mahuyen" id="" class="form-control select2basic"
                                    style="width:100%">
                                    <option value="">Tất cả</option>
                                    @foreach ($a_huyen as $key => $ct)
                                        <option value="{{ $key }}" {{session('admin')->maquocgia == $key?'selected':''}}>{{ $ct }}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="hidden" name='math' id='math'> --}}
                            </div>
                            <div class="col-lg-12">
                                <label class="control-label">Kỳ điều tra</label>
                                <select name="kydieutra" id="" class="form-control select2basic"
                                    style="width:100%">
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
        <script>
            function intonghop() {
                var url = '/biendong/tonghopbiendong'
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
