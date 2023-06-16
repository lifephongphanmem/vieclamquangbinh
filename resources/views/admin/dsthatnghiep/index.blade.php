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

            $('#kydieutra').change(function () {
                window.location.href = 'dsthatnghiep?kydieutra=' + $('#kydieutra').val() +'&huyen='+ $('#huyen').val()  + '&xa='+ $('#xa').val() ;
            });
            $('#huyen').change(function() {
                window.location.href = 'dsthatnghiep?kydieutra=' + $('#kydieutra').val() +'&huyen='+ $('#huyen').val()  + '&xa='+ $('#xa').val() ;
            });
            $('#xa').change(function() {
                window.location.href = 'dsthatnghiep?kydieutra=' + $('#kydieutra').val() +'&huyen='+ $('#huyen').val()  + '&xa='+ $('#xa').val() ;
            });
         
        });
        function xa() {
            if($('#huyen').val() == 0){
                 toastr.warning('Bạn chưa chọn huyện');
            }
        }

    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Thông tin người thất nghiệp</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{'/dsthatnghiep/create'}}" class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i> &ensp;Tạo mới</a>

                        <a data-toggle="modal" data-target="#thatnghiep_import" class="btn btn-xs btn-success mr-3">
                        <i class="fa fa-plus"></i> &ensp;Nhập excel</a>

                        <a data-toggle="modal" data-target="#modal-baocao" class="btn btn-xs btn-success mr-3" target="_bank">
                        <i class="icon-lg la flaticon2-print"></i> &ensp;In Báo cáo</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label style="font-weight: bold">Huyện</label>
                              <select name="huyen" id="huyen" class="form-control " >
                                <option value="0">---Chọn huyện---</option>
                                @foreach($huyen as $key => $val)
                                    <option value="{{$val->maquocgia}}" {{$val->maquocgia == $input['huyen'] ?'selected' : ''}}>{{$val->name}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="col-md-4">
                            <label style="font-weight: bold">Xã</label>
                              <select onclick="xa()" name="xa" id="xa" class="form-control">
                                <option value="0">---Chọn xa---</option>
                                @foreach($xa as $key => $val)
                                    <option value="{{$val->maquocgia}}" {{$val->maquocgia == $input['xa'] ?'selected' : ''}}>{{$val->name}}</option>
                                @endforeach
                              </select>
                        </div>

                        <div class="col-md-4">
                            <label style="font-weight: bold">Kỳ điều tra</label>
                            {{-- <input type="month" name="kydieutra" id="kydieutra" class="form-control " value="{{date('Y-m')}}" > --}}
                            <select name="kydieutra" id="kydieutra" class="form-control " >
                                @foreach($kydieutra as $key => $kdt)
                                    <option {{$kdt == $input['kydieutra'] ?'selected' : ''}}>{{$kdt}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th width="1%" > STT </th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Số cccd</th>
                                <th>Số bhxh</th>
                                <th>Nguyên nhân</th>
                                <th >Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $key => $item)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><a href="{{'/dsthatnghiep/edit?id='.$item->id}}">{{$item->hoten}}</a></td>
                                    <td>{{getDayVn($item->ngaysinh) }}</td>
                                    <td>{{$item->cccd}}</td>
                                    <td>{{$item->bhxh}}</td>
                                    <td>{{$item->nguyennhan}}</td>
                                    <td>
                                        <button title="Xóa thông tin" data-toggle="modal" data-target="#delete-modal-confirm" type="button"
                                         onclick="cfDel('/dsthatnghiep/delete/{{$item->id}}')" class="btn btn-sm btn-clean btn-icon" fdprocessedid="q2u7ei">
                                            <i class="icon-lg flaticon-delete text-danger"></i>
                                        </button>

                                    </td>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-baocao" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmbaocao" method="GET" action="#" accept-charset="UTF-8">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">In báo cáo</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>
                                <a href="{{'/dsthatnghiep/bctonghop?kydieutra='.$input['kydieutra'] }}"  target="_bank"> Báo cáo tổng hợp</a>
                            </li>
                            <li>
                                <a href="{{'/dsthatnghiep/bcchitiet?kydieutra='.$input['kydieutra'] }}"  target="_bank"> Báo cáo chi tiết</a>
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Đóng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="thatnghiep_import" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="thatnghiepImport" method="post" action="{{'dsthatnghiep/importexcel'}}" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Nhập liệu</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="import_file" accept=".xlsx,.xls,.csv"  required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  @include('includes.delete')

@endsection
