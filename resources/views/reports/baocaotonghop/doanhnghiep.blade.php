@extends('main')
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
                <div class="card box">
                    <div class="card-header">
                        DANH SÁCH BÁO CÁO
                    </div>
                    <div class="card-body" style="height:500px">
                        <div class="row">
                            <div class="col-lg-12">
                                <ol>
                                    <li>
                                        <form class="form-inline" method="GET">
                                            <button class="btn btn-sm btn-clean text-primary" style="padding-left:0" name="export" value="1"
                                                type="submit">Xuất Báo cáo theo mẫu Mẫu số 02/PLI</button>
                                        </form>
                                    </li>
                                    <li>
                                        <a href="#" data-target="#thitruongld-modal" data-toggle="modal">Mẫu số
                                            04. Báo cáo về thông tin thị trường lao động</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    <!--Model thị trường lao động-->
                    <div id="thitruongld-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                        <form id="frmDanhsach" method="GET" action="{{'/bao_cao_tong_hop/thong_tin_thi_truong_ld'}}" accept-charset="UTF-8" enctype="multipart/form-data" target='_blank'>
                            @csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header modal-header-primary">
                                        <h4 id="modal-header-primary-label" class="modal-title">Mẫu 04</h4>
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12 mb-2">
                                        <label class="control-label">Năm điều tra</label>
                                        <select class="form-control select2basic" id="nam" name="nam" style="width:100%">
                                            <?php $nam_start = date('Y') - 5;
                                            $nam_stop = date('Y'); ?>
                                            @for ($i = $nam_start; $i <= $nam_stop; $i++)
                                                <option value="{{ $i }}" {{ $i == $nam_stop ? 'selected' : '' }}>Năm
                                                    {{ $i }}</option>
                                            @endfor
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

@endsection
