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
            function loc() {
                 $url = 'dangkytimviec?tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val()
               + '&gioitinh_filter=' + $('#gioitinh_filter').val() + '&age_filter=' + $('#age_filter').val() + '&phien=' + $('#phien').val();
            }
            $('#tungay').change(function () { loc();
                window.location.href =  $url;
            });
            $('#denngay').change(function() { loc();
                window.location.href =  $url;
            });
            $('#gioitinh_filter').change(function() { loc();
                window.location.href =  $url;
            });
            $('#age_filter').change(function() { loc();
                window.location.href =  $url;
            });
            $('#phien').change(function() { loc();
                window.location.href = $url;
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
                        <h3 class="card-label text-uppercase">Danh sách đăng ký tìm việc</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{'/dangkytimviec/create?tungay='.$input['tungay'].'&denngay='.$input['denngay'].'&gioitinh_filter='
                        .$input['gioitinh_filter'].'&age_filter='.$input['age_filter'].'&phien='.$input['phien'] }}" class="btn btn-xs btn-success mr-3">
                        <i class="fa fa-plus"></i> &ensp;Tạo mới</a>

                        <a data-toggle="modal" data-target="#dangkytimviec_import" class="btn btn-xs btn-success mr-3">
                        <i class="fa fa-plus"></i> &ensp;Nhập excel</a>

                        <a  data-toggle="modal" data-target="#modal-baocao" class="btn btn-xs btn-success mr-3" target="_bank">
                            <i class="icon-lg la flaticon2-print"></i> &ensp;Tổng hợp</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label>Từ ngày</label>
                            <input type="date" class="form-control" name='tungay' id="tungay"
                                value="{{ $input['tungay']}}">
                        </div>
                        <div class="col-md-2">
                            <label for="">Đến ngày</label>
                            <input type="date" class="form-control" name='denngay' id="denngay"
                                value="{{$input['denngay'] }}">
                        </div>
                        <div class="col-sm-2 " >
                             <label for="">Giới tính</label>
                            <select name="gioitinh_filter" id="gioitinh_filter" class=" form-control">
                                <option value="0"> ---Chọn giới tính--- </option>
                                <option value="Nam" {{ $input['gioitinh_filter'] == 'Nam'?'selected':''}}>Nam</option>
                                <option value="Nữ" {{ $input['gioitinh_filter'] == 'Nữ'?'selected':''}} >Nữ</option>
                            </select>
                        </div>

                        <div class="col-sm-2" >
                            <label for="">Lọc theo độ tuổi</label>
                            <select name="age_filter" id="age_filter"  class=" form-control">
                                <option value="0"> ---Chọn lọc theo độ tuổi--- </option>
                                <option value="35" {{ $input['age_filter'] == '35'?'selected':''}}> 35 tuổi trở lên </option>

                            </select>
                        </div>
                        
                        <div class="col-sm-2" >
                            <label for="">Phiên giao dịch</label>
                            <select name="phien" id="phien"  class=" form-control">
                                <option value="0" onclick="loc()"> ---Chọn phiên--- </option>
                                <option {{ $input['phien'] == 'Phiên định kỳ'?'selected':'' }}>Phiên định kỳ</option>
                                <option {{ $input['phien'] == "Phiên đột xuất" ? 'selected' : '' }}>Phiên đột xuất</option>
                                <option {{ $input['phien'] == "Phiên online" ? 'selected' : '' }}>Phiên online</option>
                            </select>
                        </div>
                    </div>


                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="1%"> STT </th>
                                <th>Họ tên</th>
                                <th>CMND/CCCD</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ thường trú</th>
                                <th>Phiên</th>
                                <th>Ví trí </th>
                                <th>Doanh nghiệp ứng tuyển</th>
                                <th width="6%" >Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($model as $key => $item){?>
                                <tr>
                                    <td>{{  ++$key }}</td>
                                    <td><a href="{{'/dangkytimviec/edit?id='.$item->id.'&tungay='.$input['tungay'] .'&denngay='.$input['denngay'].
                                    '&gioitinh_filter='.$input['gioitinh_filter'].'&age_filter='.$input['age_filter'].'&phien='.$input['phien'] }}">{{$item->hoten}}</a></td>
                                    <td>{{  $item->cccd }}</td>
                                    <td>{{  getDayVn($item->ngaysinh) }}</td>
                                    <td>{{  $item->thuongtru }}</td>
                                    <td>{{  $item->phiengd }}</td>
                                    <td>{{  $item->tencongviec }}</td>
                                    <td>{{  $item->tendn }}</td>
                                    <td> 
                                        <button title="Xóa thông tin" data-toggle="modal" data-target="#delete-modal-confirm" type="button"
                                         onclick="cfDel('/dangkytimviec/delete/{{$item->id}}/{{$input['tungay']}}/{{$input['denngay']}}/{{$input['gioitinh_filter']}}/{{$input['age_filter']}}/{{$input['phien']}}')"
                                          class="btn btn-sm btn-clean btn-icon" fdprocessedid="q2u7ei"> <i class="icon-lg flaticon-delete text-danger"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('includes.delete')

    <div id="modal-baocao" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmbaocao" method="GET" action="#" accept-charset="UTF-8">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Tổng hợp</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li>
                                <div class="form-group">
                                    <a href="#" data-toggle="modal" data-target="#moda-tonghopdulieu"> Tổng hợp dữ liệu</a>
                                 </div>
                            </li>
                            <li>
                                <div class="form-group">
                                    <a href="{{'/dangkytimviec/bcchitiet?tungay='.$input['tungay'].'&denngay='.$input['denngay'].'&gioitinh_filter='.
                                    $input['gioitinh_filter'] . '&age_filter=' .$input['age_filter'] }}"  target="_bank"> Báo cáo chi tiết</a>
                                 </div>
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
    <div id="moda-tonghopdulieu" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmtonghopdulieu" method="get" action="{{'dangkytimviec/bctonghop'}}" accept-charset="UTF-8" enctype="multipart/form-data"  target="_bank">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Tổng hợp dữ liệu</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true"
                                class="close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Từ ngày</label>
                            <input type="date" name="tungay" value="{{$input['tungay']}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Từ ngày</label>
                            <input type="date" name="denngay" value="{{$input['denngay']}}" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="dangkytimviec_import" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="dangkytimviecImport" method="post" action="{{'dangkytimviec/importexcel'}}" accept-charset="UTF-8" enctype="multipart/form-data">
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
@endsection
