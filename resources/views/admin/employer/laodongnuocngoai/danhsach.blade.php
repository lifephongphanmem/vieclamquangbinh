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
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Danh sách người lao động</h3>
                    </div>
                    <div class="card-toolbar">
                        <button
                        data-target="#taonhanh-modal-confirm" data-toggle="modal"
                        class="btn btn-xs btn-success mr-3">
                        <i class=" flaticon-paper-plane"></i>Tạo nhanh
                    </button>
                    <a href="{{ '/laodongnuocngoai/ThemMoi' }}" class="btn btn-xs btn-success mr-3"><i class="fa fa-plus"></i>
                        Thêm mới</a>
                        <a href="{{ '/laodongnuocngoai/indanhsach' }}" target="_bank" class="btn btn-xs btn-success"><i class="icon-lg la flaticon2-print text-primary"></i>
                            In danh sách</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Quốc tịch</label>
                            <select class="form-control" name="nation">
                                <option value="ALL">---Chọn quốc tịch ---</option>
                                @foreach ( getCountries() as $k=>$ct)
                                <option value="{{$k}}">{{$ct}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Họ tên</label>
                            <input type="text" name='hoten' class="form-control">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Số hộ chiếu</label>
                            <input type="text" name='cmnd' class="form-control">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Giới tính</label>
                            <select name="gioitinh" class="form-control select2basic">
                                    <option value="nam">Nam</option>
                                    <option value="nu">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            {{-- <label style="font-weight: bold">Xã</label> --}}
                            <label style="font-weight: bold">Doanh nghiệp</label>
                            <select class="form-control" name="company">
                                <option value="ALL">--Chọn doanh nghiệp--</option>
                                @foreach ($company as $k=>$ct)
                                <option value="{{$k}}">{{$ct}}</option>
                                @endforeach
                            </select>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2" style="align-items: center; justify-content: center;">
                        <button class="btn btn-success" >Tìm kiếm</button>
                    </div>

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Tên</th>
                                <th>Số Hộ Chiếu</th>
                                <th>Ngày sinh</th>
                                <th>Công ty</th>
                                <th>Quốc Tịch</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
 
		foreach ($model as $key=>$ld ){
	?>
                            <tr>
                                <td>{{ ++$key }} </td>

                                <td><a href="{{ '/nguoilaodong/ChiTiet/' . $ld->id }}">{{ $ld->hoten }}</a></td>
                                <td><span class="text-ellipsis"> </span> {{ $ld->cmnd }}</td>
                                <td><span class="text-ellipsis"> </span>{{ getDayvn($ld->ngaysinh) }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->ctyname }}</td>
                                <td><span class="text-ellipsis"> </span>{{ $ld->nation }}</td>
                                <td>
                                    <a href="{{ '/vanban/thong_tin_nguoi_lao_dong_nuoc_ngoai?id='.$ld->id  }}" class="btn btn-sm mr-2" title="In thông tin" target="_blank">
                                        <i class="icon-lg la flaticon2-print text-dark"></i></a>
                                        <button title="Xóa thông tin" data-toggle="modal"
                                        data-target="#delete-modal-confirm" type="button"
                                        onclick="cfDel('{{ 'doanhnghiep-delete/' . $ld->id }}')"
                                        class="btn btn-sm btn-clean btn-icon">
                                        <i class="icon-lg flaticon-delete text-danger"></i>
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


    <!--create Modal-->
    <div class="modal fade" id="taonhanh-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="card-label">
                        Thông tin người lao động
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
                                <input type="text" id="hoten" name="name" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Quốc tịch</b></label>
                                <select class="form-control" name="nation">
                                    @foreach ( getCountries() as $k=>$ct)
                                    <option value="{{$k}}">{{$ct}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Ngày sinh</b></label>
                                <input type="date" id="ngaysinh" name="ngaysinh" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Số hộ chiếu</b></label>
                                <input type="text" id="cmnd" name="cmnd" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Điện thoại</b></label>
                                <input type="text" id="sdt" name="sdt" class="form-control" />
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group fv-plugins-icon-container">
                                <label><b>Doanh nghiệp</b></label>
                                <select class="form-control" name="company">
                                    @foreach ($company as $k=>$ct)
                                    <option value="{{$k}}">{{$ct}}</option>
                                    @endforeach
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
    @include('includes.delete')
@endsection
