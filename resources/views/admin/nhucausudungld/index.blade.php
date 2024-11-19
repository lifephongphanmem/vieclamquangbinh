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
                        <h3 class="card-label text-uppercase">Nhu cầu sử dụng lao động</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>

                </div>
                <div class="card-body">

                    {{-- <div class="row "> --}}
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead class="text-center">
                            <td width="2%"> # </td>
                            <td width="20%"> Tổng số lao động cần bổ sung</td>
                            <td width="20%"> Thời gian bổ sung</td>
                            <td width="8%"> Thời gian làm việc</td>
                            <td width="8%"> Vị trí bổ sung</td>
                            <td width="10%"> Thao tác </td>
                        </thead>
                        <tbody>

                            @foreach ($model as $key => $sd)
                                <tr>
                                    <td>{{ ++$key }}</td>

                                    <td> {{$sd->tong}}</td>
                                    <td> {{ $a_thoihan[$sd->thoigianbosung] }}</td>
                                    <td> {{ $a_thoigian[$sd->thoigianlamviec] }}</td>

                                    <td> {{$sd->sovitri}}</td>

                                    <td>
                                    <button title="Xóa thông tin" type="button"
                                    onclick="cfDel('{{'/tuyendung/del/'.$sd->id}}')"
                                    class="btn btn-sm btn-clean btn-icon ml-3" data-target="#delete-modal-confirm"
                                    data-toggle="modal">
                                    <i class="icon-lg flaticon-delete text-danger"></i>
                                </button>
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
                <form id="frmDelete" method="GET" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-header-primary">
                                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xóa</h4>
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                            </div>
                            {{-- <div class="modal-body">
                                <label> <b>Nếu xóa thì sẽ xóa tất cả các nhân khẩu thuộc xã trên phần mềm trong kỳ điều tra
                                        này</b></label>
                            </div> --}}
    
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
