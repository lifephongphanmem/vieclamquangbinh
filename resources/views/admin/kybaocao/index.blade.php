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

                $('#kydieutra').change(function() {
                window.location.href = "kybaocao?madiaban=" + $('#madiaban').val() + '&kydieutra=' + $('#kydieutra').val();
                     });
                $('#madiaban').change(function() {
                window.location.href = "kybaocao?madiaban=" + $('#madiaban').val() + '&kydieutra=' + $('#kydieutra').val();
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
                        <h3 class="card-label text-uppercase">Thông tin xét duyệt</h3>
                    </div>
                    <div class="card-toolbar">
                            <div class="card-toolbar">
                                @if ($capdo == "X")
                                    <a data-target="#taomoi" data-toggle="modal" class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i> &ensp;Tạo mới</a>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>
                            <select name="kydieutra" id="kydieutra" class="form-control select2basic" >
                                @foreach ($a_kydieutra as $key => $ct)
                                    <option value="{{ $ct }}"
                                        {{ $key == $inputs['kydieutra'] ? 'selected' : '' }}
                                        >
                                        {{ $ct }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                       <div class="col-md-4" >
                            <label style="font-weight: bold">Địa bàn</label>
                            <select name="madiaban" id="madiaban" class="form-control select2basic" 
                            {{ session('admin')->capdo != 'T' ? 'disabled' : '' }} >
                                @foreach ($donvi as $key => $ct)
                                    <option value="{{ $ct->madiaban }}" {{ $ct->madiaban == $inputs['madiaban'] ? 'selected' : '' }} >
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th width="1%" > STT </th>
                                <th>Nội dung</th>
                                <th>Đơn vị gửi</th>
                                <th>Thời điểm</th>
                                <th>Trạng thái</th>
                                <th>Đơn vị tiếp nhận</th>
                                <th width="11%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$item->noidung}}</td>
                                    {{-- đơn vị gửi --}}
                                    <td>
                                        @if ($capdo == 'X')
                                            @foreach($donvi as $dv)
                                                @if ($dv->madv == $item->madv_x)
                                                    <span>{{$dv->tendv}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($capdo == 'H')
                                            @if ($item->trangthai_h == 'cc' || $item->trangthai_h == 'btl')
                                                @foreach($donvi as $dv)
                                                    @if ($dv->madv == $item->madv_x)
                                                        <span>{{$dv->tendv}}</span>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if ($item->trangthai_h == 'dc')
                                                @foreach($donvi as $dv)
                                                    @if ($dv->madv == $item->madv_h)
                                                        <span>{{$dv->tendv}}</span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                        @if ($capdo == 'T')
                                            @foreach($donvi as $dv)
                                                @if ($dv->madv == $item->madv_h)
                                                    <span>{{$dv->tendv}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    {{-- thời điểm --}}
                                    <td>
                                        @if ($capdo == 'X')
                                            @if ($item->trangthai_t == 'dd')
                                              {{$item->thoidiem_t}}
                                            @endif
                                            @if ($item->trangthai_x == 'cc' )
                                                {{$item->created_at}}
                                            @endif
                                            @if ($item->trangthai_x == 'dc' && $item->trangthai_t != 'dd')
                                                {{$item->thoidiem_x}}
                                            @endif
                                            @if ($item->trangthai_x == 'btl')
                                                {{$item->thoidiem_h}}
                                            @endif
                                        @endif
                                        @if ($capdo == 'H')
                                            @if ($item->trangthai_t == 'dd')
                                              {{$item->thoidiem_t}}
                                            @endif
                                            @if ($item->trangthai_h == 'cc')
                                                {{$item->thoidiem_x}}
                                            @endif
                                            @if ($item->trangthai_h == 'dc' && $item->trangthai_t != 'dd')
                                                {{$item->thoidiem_h}}
                                            @endif
                                            @if ($item->trangthai_h == 'btl')
                                                {{$item->thoidiem_t}}
                                            @endif
                                        @endif
                                        @if ($capdo == 'T')
                                            @if ($item->trangthai_t == 'cd')
                                                {{$item->thoidiem_h}}
                                            @endif
                                            @if ($item->trangthai_t == 'dd')
                                                {{$item->thoidiem_t}}
                                            @endif
                                            @if ($item->trangthai_t == 'hd')
                                                {{$item->thoidiem_t}}
                                            @endif
                                        @endif
                                    </td>
                                    {{-- Trạng thái --}}
                                    <td>
                                        @if ($capdo == 'X')
                                            @if ($item->trangthai_t == 'dd')
                                                <span>Đã duyệt</span>
                                            @endif
                                            @if ($item->trangthai_x == 'cc')
                                                <span>Chưa chuyển</span>
                                            @endif
                                            @if ($item->trangthai_x == 'dc' && $item->trangthai_t != 'dd')
                                                <span>Đã chuyển</span>
                                            @endif
                                            @if ($item->trangthai_x == 'btl')
                                                <span>Bị trả lại</span>
                                            @endif
                                        @endif
                                        @if ($capdo == 'H')
                                            @if ($item->trangthai_t == 'dd')
                                                <span>Đã duyệt</span>
                                            @endif
                                            @if ($item->trangthai_h == 'cc')
                                                <span>Chưa chuyển</span>
                                            @endif
                                            @if ($item->trangthai_h == 'dc' && $item->trangthai_t != 'dd')
                                                <span>Đã chuyển</span>
                                            @endif
                                            @if ($item->trangthai_h == 'btl')
                                                <span>Bị trả lại</span>
                                            @endif
                                        @endif
                                        @if ($capdo == 'T')
                                            @if ($item->trangthai_t == 'cd')
                                                <span>Chưa duyệt</span>
                                            @endif
                                            @if ($item->trangthai_t == 'dd')
                                                <span>Đã duyệt</span>
                                            @endif
                                            @if ($item->trangthai_t == 'hd')
                                                <span>Đã hủy duyệt</span>
                                            @endif
                                        @endif
                                    </td>
                                    {{-- cơ quan tiếp nhận --}}
                                    <td>
                                        @if ($capdo == 'X')
                                            @foreach($donvi as $dv)
                                                @if ($dv->madv == $item->cqtiepnhan_x)
                                                    <span>{{$dv->tendv}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if ($capdo == 'H')
                                            @if ($item->trangthai_h == 'cc' || $item->trangthai_h == 'btl')
                                                @foreach($donvi as $dv)
                                                    @if ($dv->madv == $item->cqtiepnhan_x)
                                                        <span>{{$dv->tendv}}</span>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if ($item->trangthai_h == 'dc')
                                                @foreach($donvi as $dv)
                                                    @if ($dv->madv == $item->cqtiepnhan_h)
                                                        <span>{{$dv->tendv}}</span>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                         @if ($capdo == 'T')
                                            @foreach($donvi as $dv)
                                                @if ($dv->madv == $item->cqtiepnhan_h)
                                                    <span>{{$dv->tendv}}</span>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    {{-- thao tác --}}
                                    <td>
                                        <button title="In báo cáo" onclick="xem('{{$item->madv_x}}','{{$item->kydieutra}}')" data-target="#modify-modal-xa-" data-toggle="modal" 
                                        class="btn btn-sm btn-clean btn-icon"><i class="icon-lg fas fa-print " style="color: #1a7e92e0"></i></button>

                                        @if ($capdo == 'X')
                                            @if ($item->trangthai_x == 'cc' || $item->trangthai_x == 'btl')
                                                {{-- <a onclick="sua('{{$item->id}}','{{$item->madv_x}}','{{$item->noidung}}')" data-target="#sua" data-toggle="modal" > <input type="button" class="btn" value="Sửa"></a> --}}
                                                <button title="Gửi đi" onclick="gui('{{$item->id}}','{{$item->madv_x}}','{{$item->noidung}}')" 
                                                data-target="#gui" data-toggle="modal" class="btn btn-sm btn-clean btn-icon">
                                                <i class="icon-lg fas fa-share-square text-primary "></i></button>
                                                
                                                <button title="Xóa" type="button" onclick="cfDel('{{'/kybaocao/delete/'.$item->id}}')"
                                                 class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm" data-toggle="modal">
                                                <i class="icon-lg flaticon-delete text-danger"></i></button> 
                                            @endif
                                            @if ($item->trangthai_x == 'btl' && $item->lydo_x != null)
                                                <button title="Lý do" onclick="lydo('{{$item->lydo_x}}')" data-target="#lydo" data-toggle="modal" 
                                                    class="btn btn-sm btn-clean btn-icon"><i class="icon-lg fas fa-search text-info"></i></a>
                                            @endif
                                        @endif

                                        @if ($capdo == 'H')
                                             @if ($item->trangthai_h == 'cc' || $item->trangthai_h == 'btl' )
                                                <button title="Gửi đi" onclick="gui('{{$item->id}}','{{$item->madv_h}}')" data-target="#gui" 
                                                data-toggle="modal" class="btn btn-sm btn-clean btn-icon"><i class="icon-lg fas fa-share-square text-primary "></i></button>

                                                <button title="Trả lại" onclick="tralai('{{$item->id}}','{{$item->madv_h}}')" data-target="#tralai" 
                                                data-toggle="modal" class="btn btn-sm btn-clean btn-icon"><i class="icon-lg fas fa-reply text-warning "></i></a>
                                            @endif
                                            @if ($item->trangthai_h == 'btl' && $item->lydo_h != null)
                                                <button title="Lý do" onclick="lydo('{{$item->lydo_h}}')" data-target="#lydo" data-toggle="modal" 
                                                class="btn btn-sm btn-clean btn-icon" > <i class="icon-lg fas fa-search text-info"></i></button>
                                            @endif
                                        @endif
                                        @if ($capdo == 'T')
                                            @if ($item->trangthai_t == 'cd' || $item->trangthai_t == 'hd')
                                                <button title="Duyệt" onclick="duyet('{{$item->id}}')" data-target="#duyet" data-toggle="modal"
                                                class="btn btn-sm btn-clean btn-icon"><i class="icon-lg fas fa-check text-success "></i></a>

                                                <button title="Trả lại" onclick="tralai('{{$item->id}}','{{$item->madv_t}}')" data-target="#tralai" 
                                                data-toggle="modal"  class="btn btn-sm btn-clean btn-icon"> <i class="icon-lg fas fa-reply text-warning"></i></button>
                                            @endif 
                                            @if ($item->trangthai_t == 'dd' )
                                                <button title="Hủy duyệt" onclick="huyduyet('{{$item->id}}')" data-target="#huyduyet" data-toggle="modal"
                                                class="btn btn-sm btn-clean btn-icon"><i class="icon-lg fas fa-times-circle text-danger "></i></a>

                                                <button title="Trả lại" onclick="tralai('{{$item->id}}','{{$item->madv_t}}')" data-target="#tralai"
                                                data-toggle="modal"  class="btn btn-sm btn-clean btn-icon"> <i class="icon-lg fas fa-reply text-warning "></i></button>
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
    {{-- them mới --}}
    <div id="taomoi" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="taomoi" method="POST" action="{{'kybaocao/store'}}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng ý</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                            <input name="madiaban" value="{{$inputs['madiaban']}}" hidden>
                            <input name="kdt" value="{{$inputs['kydieutra']}}" hidden>
                        <div class="col-md-12">
                            <label style="font-weight: bold">Xã</label>
                            <select name="madv" id="madv" style="width: 100%;" class="form-control select2basic">
                                <?php $donvi_xa = $donvi->where('capdo','X') ?>
                                @foreach ($donvi_xa as $key => $ct)
                                    <option value="{{ $ct->madv }}"
                                        {{ $ct->madiaban == $inputs['madiaban'] ? 'selected' : '' }}>
                                        {{ $ct->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label style="font-weight: bold">Kỳ điều tra</label>
                            <select name="kydieutra" id="kydieutra" style="width: 100%;" class="form-control select2basic">
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
                        <button type="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div> 
        <!-- modal in báo cáo xã -->
        <form method="POST" action="{{ '/dieutra/intonghop' }}" accept-charset="UTF-8"
                                        id="frm_modify_xa-" target="_blank">
                                        @csrf
                                        <div id="modify-modal-xa-" tabindex="-1" class="modal fade kt_select2_modal"
                                            style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-header-primary">
                                                        <h4 id="modal-header-primary-label" class="modal-title">In báo
                                                            cáo</h4>
                                                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                                            class="close">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                               
                                                            <input id="madv_xem" name="madv"  hidden>
                                                            <input id="kydieutra_xem" name="kydieutra" hidden>
                                                   
                                                        <div class="col-lg-12 mt-3">
                                                            <label class="control-label">Chọn tùy biến</label>
                                                        </div>
                                                        <div class="row mt-1 ml-5" id="1stld">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="gioitinh_xa" name=gender value="gender">
                                                                <label class="form-check-label" for="gioitinh_xa">Giới
                                                                    tính</label>
                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="tthdkt" id="tthdkt_xa" value="tthdkt">
                                                                <label class="form-check-label" for="tthdkt_xa">Tình
                                                                    trạng HĐKT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="dtut" id="dtut_xa" value="dtut">
                                                                <label class="form-check-label" for="dtut_xa">Đối tượng
                                                                    UT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trinhdogdpt" id="trinhdogdpt_xa"
                                                                    value="trinhdogdpt">
                                                                <label class="form-check-label"
                                                                    for="trinhdogdpt_xa">Trình độ GDPT</label>

                                                            </div>
                                                            <div class="form-check form-check-inline ml-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="trinhdocmkt" id="trinhdocmkt_xa"
                                                                    value="trinhdocmkt">
                                                                <label class="form-check-label"
                                                                    for="trinhdocmkt_xa">Trình độ CMKT</label>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="col-lg-10 d-none mt-2" id='gt_xa'>
                                                                <label class="control-label">Giới tính</label>
                                                                <select name="gioitinh" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    <option value="Nam">Nam</option>
                                                                    <option value="Nữ">Nữ</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='hdkt_xa'>
                                                                <label class="control-label">Tình trạng HĐKT</label>
                                                                <select name="tinhtranghdkt" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['dmtinhtranghdkt'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentgkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='ut_xa'>
                                                                <label class="control-label">Đối tượng UT</label>
                                                                <select name="uutien" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['dmuutien'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tendoituong }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='gdpt_xa'>
                                                                <label class="control-label">Trình độ DGPT</label>
                                                                <select name="trinhdogiaoduc" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['trinhdoGDPT'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tengdpt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-10 d-none mt-2" id='cmkt_xa'>
                                                                <label class="control-label">Trình độ CMKT</label>
                                                                <select name="chuyenmonkythuat" id=""
                                                                    class="form-control select2basic"
                                                                    style="width:100%">
                                                                    @foreach ($baocao['trinhdocmkt'] as $val)
                                                                        <option value="{{ $val->stt }}">
                                                                            {{ $val->tentdkt }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal"
                                                            class="btn btn-default">Hủy thao tác</button>
                                                        <button type="submit" id="submit" name="submit"
                                                            value="submit" class="btn btn-primary">Đồng
                                                            ý</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        </form>
        {{-- delete --}}
<div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
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
                    <button type="submit" onclick="subDel()" class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>
    {{-- gửi --}}
<div id="gui" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmgui" method="POST" action="{{ '/kybaocao/gui' }}"  accept-charset="UTF-8">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Sau khi gửi sẽ không thể thay đổi</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                </div>
                 <div class="modal-body">
                    <input id="id_gui"  name="id" hidden>
                    <input id="madv_gui" name="madv" hidden>
                    <input name="madiaban" value="{{$inputs['madiaban']}}" hidden>
                    <input name="kdt" value="{{$inputs['kydieutra']}}" hidden>
                    @if ($capdo == 'X')
                        <label class="form-check-label" for="gioitinh_xa">Nội dung</label>
                        <textarea id="noidung_gui" name="noidung" type="text" class="form-control" ></textarea>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                    <button type="submit"  class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>
    {{-- trả lại --}}
<div id="tralai" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmtralai" method="POST" action="{{ '/kybaocao/tralai' }}"  accept-charset="UTF-8">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Bạn muốn trả lại người gửi?</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                </div>
                 <div class="modal-body">
                    <input id="id_tralai"  name="id" hidden>
                    <input id="madv_tralai" name="madv" hidden>
                    <input id="capdo_tralai" name="capdo" value="{{$capdo}}" hidden>
                    <input name="madiaban" value="{{$inputs['madiaban']}}" hidden>
                    <input name="kdt" value="{{$inputs['kydieutra']}}" hidden>
                    <label class="form-check-label" for="gioitinh_xa">Lý do trả lại</label>
                    <textarea name="lydo" type="text" class="form-control" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                    <button type="submit"  class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>
    {{-- duyệt --}}
<div id="duyet" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmduyet" method="POST" action="{{ '/kybaocao/duyet' }}"  accept-charset="UTF-8">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý duyệt báo cáo?</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                </div>
                 <div class="modal-body">
                    <input id="id_duyet" name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                    <button type="submit"  class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>
    {{--hủy duyệt --}}
<div id="huyduyet" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmhuyduyet" method="POST" action="{{ '/kybaocao/huyduyet' }}"  accept-charset="UTF-8">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy duyệt báo cáo?</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                </div>
                 <div class="modal-body">
                    <input id="id_huyduyet"  name="id" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                    <button type="submit"  class="btn btn-primary">Đồng ý</button>
                </div>
            </div>
        </div>
    </form>
</div>
    {{--lýdo--}}
<div id="lydo" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <form id="frmlydo" method="POST" action="{{ '/kybaocao/tralai' }}"  accept-charset="UTF-8">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <h4 id="modal-header-primary-label" class="modal-title">Bạn muốn trả lại người gửi?</h4>
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                </div>
                 <div class="modal-body">
                    <label class="form-check-label" for="gioitinh_xa">Lý do trả lại</label>
                    <textarea id="lydotl" name="lydo" class="form-control" ></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                </div>
            </div>
        </div>
    </form>
</div>
    <script>
        function xem(madv,kydieutra) {
            $('#madv_xem').val(madv);
            $('#kydieutra_xem').val(kydieutra);
        }
        function gui(id,madv,noidung) {
            $('#id_gui').val(id);
            $('#madv_gui').val(madv);
             $('#noidung_gui').val(noidung);
        }
        function tralai(id,madv) {
            $('#id_tralai').val(id);
            $('#madv_tralai').val(madv);
        }
        function duyet(id) {
            $('#id_duyet').val(id);
        }
        function huyduyet(id) {
            $('#id_huyduyet').val(id);
        }
        function lydo(lydo) {
            $('#lydotl').val(lydo);
        }
        function cfDel(url){
            $('#frmDelete').attr('action', url);
        }

    </script>
@endsection
