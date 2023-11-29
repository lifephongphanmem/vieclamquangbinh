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
    <script>


    </script>
@stop
<style>
    #luongmin,
    #luongmax {
        height: calc(1.5em + 1.3rem + 2px);
        padding: 0.65rem 1rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #3F4254;
        background-color: #ffffff;
        background-clip: padding-box;
        border: 1px solid #E4E6EF;
        border-radius: 0.42rem;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Ứng tuyển</h3>
                    </div>
                    <div class="card-toolbar">

                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        {{-- <div class="col-md-4">
                            <label style="font-weight: bold">Cấp bậc</label>
                            <select name="capbac" id="capbac" class="form-control">
                                <option value="">Chọn cấp bậc</option>
                                @foreach ($capbac as $item)
                                    <option value="{{ $item->madm }}"
                                        {{ $item->madm == $inputs['capbac'] ? 'selected' : '' }}>{{ $item->tendm }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" id="frm_checkluong" >
                            <label style="font-weight: bold;display: block">Mức lương</label>
                                <input type="number" name="luongmin" id="luongmin" placeholder="Nhỏ nhất"
                                    value="{{ isset($inputs['luongmin']) ? $inputs['luongmin'] : '' }}">
                                <input type="number" name="luongmax" id="luongmax" placeholder="Lớn nhất"
                                    value="{{ isset($inputs['luongmax']) ? $inputs['luongmax'] : '' }}">
                                <a onclick="checkluong()" class="btn btn-sm btn-success ml-3">Tìm</a>
                        </div> --}}

                    </div>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th> STT </th>
                                <th>Tên ứng viên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Vị trí ứng tuyển</th>
                                <th>Công ty</th>
                                <th>Nơi làm việc</th>
                                <th>Ngày</th>
                                <th>Trạng thái</th>
                                <th>Xem CV</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($model as $key => $item)
                            <tr>
                                <td style="text-align: center">{{ ++$key }}</td>
                                <td>{{ $item->hoten }}</td>
                                <td style="text-align: center">{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->tencty }}</td>
                                <td>{{ $item->diadiem }}</td>
                                <td style="text-align: center">{{ getDayVn($item->created_at) }}</td>
                                <td style="text-align: center">{{ $item->trangthai == '0' ? 'Chưa xem' : 'Đã xem' }}</td>
                                <td style="text-align: center">
                                    <a   class="btn btn-sm btn-clean btn-icon ml-3">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    
                                </td>
                            </tr> 
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal_trangthai" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        <form id="frmtrangthai" method="POST" action="{{ '/ungvien/trangthai' }}" accept-charset="UTF-8">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <h4 id="modal-header-primary-label" class="modal-title">Đồng thay đổi trạng thái?</h4>
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    </div>
                    <input name="user" id="user">
                    <input name="trangthai" id="trangthai">
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Hủy thao tác</button>
                        <button type="submit" class="btn btn-primary">Đồng
                            ý</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include('includes.delete')



@endsection
