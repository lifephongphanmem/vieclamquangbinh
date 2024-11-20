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
                        <h3 class="card-label text-uppercase">Danh sách chuẩn đoán sự cố</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Tài khoản đăng nhập</label>
                            <select class="form-control select2basic" name="taikhoan">
                                <option value="ALL">---Chọn tài khoản---</option>
                                @foreach ( $taikhoan as $k=>$ct)
                                <option value="{{$k}}">{{$ct}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Thời gian từ</label>
                            <input type="date" name='tungay' class="form-control">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label style="font-weight: bold">Thời gian đến</label>
                            <input type="date" name='denngay' class="form-control">
                        </div>
                    
                    </div>
                    <div class="form-group row mb-2" style="align-items: center; justify-content: center;">
                        <button class="btn btn-success" >Tìm kiếm</button>
                    </div>

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th width="5%"> STT </th>
                                <th>Địa chỉ IP</th>
                                <th>Thời gian</th>
                                <th>Nội dung</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    @include('includes.delete')
@endsection
