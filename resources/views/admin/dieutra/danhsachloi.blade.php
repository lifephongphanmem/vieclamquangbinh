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
                        <h3 class="card-label text-uppercase">Danh sách dữ liệu lỗi</h3>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{'/dieutra/danhsach?madv=&kydieutra='.$inputs['kydieutra'].'&mahuyen='.$inputs['mahuyen']}}" class="btn btn-xs btn-primary"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr class="text-center">
                                <th style="width:20px;">
                                    STT
                                </th>
                                <th>Loại lỗi</th>
                                <th>Mô tả</th>
                                <th>Số lượng</th>
                                <th style="width: 8%">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($a_model as $key=>$ct )
                            <tr class="text-center">
                                <td>{{++$key}}</td>
                                <td>{{$ct['loailoi']}}</td>
                                <td class="text-left">{{$ct['mota']}}</td>
                                <td>{{$ct['soluong']}}</td>
                                <td>
                                    @if ($ct['loailoi']!= 'CCCD')
                                    <a href="{{'/dieutra/danhsachloi_chitiet?loailoi='.$ct['loailoi'].'&madv='.$ct['madv'].'&kydieutra='.$ct['kydieutra'].'&id='.$id.'&mahuyen='.$inputs['mahuyen']}}" title="Danh sach" type="button"
                                    {{-- onclick="cfDel('{{ }}')" --}}
                                    class="btn btn-sm btn-clean btn-icon">
                                    <i class="icon-lg flaticon-list text-success"></i>
                                </a>
                                {{-- <a href="" title="In báo cáo chi tiết"  class="btn btn-sm btn-clean btn-icon" target="_blank">
                                    <i class="icon-lg la flaticon2-print text-primary"></i>
                                </a> --}}
                                    @endif



                                   
                                </td> 
                            </tr>
                        @endforeach
                            {{-- <tr> --}}
                             
                                {{-- <td>
                                    <button title="Xóa thông tin" type="button"
                                        onclick="cfDel('{{ '/dieutra/XoaDanhSach/' . $td->id . '?mahuyen=' . $inputs['mahuyen'] . '&kydieutra=' . $inputs['kydieutra'] }}')"
                                        class="btn btn-sm btn-clean btn-icon" data-target="#delete-modal-confirm"
                                        data-toggle="modal">
                                        <i class="icon-lg flaticon-delete text-danger"></i>
                                    </button>

                                        <a href="{{'/nhankhau-in?user_id='.$td->user_id.'&danhsach_id='.$danhsach_id->id}}" title="In báo cáo chi tiết"  class="btn btn-sm btn-clean btn-icon" target="_blank">
                                            <i class="icon-lg la flaticon2-print text-primary"></i>
                                        </a>
                                   
                                </td> --}}

                            {{-- </tr> --}}
                            
                        </tbody>
                    </table>
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



        <script>
            function cfDel(url) {
                $('#frmDelete').attr('action', url);
            }

            function subDel() {
                $('#frmDelete').submit();
            }
        </script>
    @endsection
