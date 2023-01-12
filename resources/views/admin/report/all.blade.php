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

            $('#type_filter').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?type_filter=' + $('#type_filter').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });
            
            $('#tungay').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?type_filter=' + $('#type_filter').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });
            $('#denngay').change(function() {
                window.location.href = "{{ $inputs['url'] }}" + '?type_filter=' + $('#type_filter').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
            });
            $('#detail').onclick(function() {
                window.location.href = "{{'/report-detail'}}" + '?user=' + $('#user').val() +
                    '&tungay=' + $('#tungay').val() + '&denngay=' + $('#denngay').val();
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
                        <h3 class="card-label text-uppercase">Danh sách khai báo</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label>Từ ngày</label>
                            <input type="date" class="form-control" name='tungay' id="tungay"
                                value="{{ $tungay }}">
                        </div>
                        <div class="col-md-4">
                            <label for="">Đến ngày</label>
                            <input type="date" class="form-control" name='denngay' id="denngay"
                                value="{{ $denngay }}">
                        </div>
                        <div class="col-md-4">

                            {{-- <div class="col-sm-2 m-b-xs"> --}}
                            <label for="">Loại khai báo</label>
                            <select class=" form-control select2basic" name="type_filter" id="type_filter"
                                onchange="this.form.submit()">
                                <option value="0">Tất cả khai báo</option>
                                <option value="baotang" <?php if ($type_filter == 'baotang') {
                                    echo 'selected';
                                } ?>>Báo tăng</option>
                                <option value="baogiam"<?php if ($type_filter == 'baogiam') {
                                    echo 'selected';
                                } ?>>Báo giảm</option>
                                <option value="tamdung"<?php if ($type_filter == 'tamdung') {
                                    echo 'selected';
                                } ?>>Tạm dừng</option>
                                <option value="ketthuctamdung"<?php if ($type_filter == 'kethuctamdung') {
                                    echo 'selected';
                                } ?>>Kết thúc tạm dừng</option>
                                <option value="updateinfo"<?php if ($type_filter == 'updateinfo') {
                                    echo 'selected';
                                } ?>>Thay đổi thông tin</option>
                                 <option value="chuakhaibao"<?php if ($type_filter == 'chuakhaibao') {
                                    echo 'selected';
                                } ?>>Chưa khai báo</option>
                            </select>
                            {{-- </div> --}}
                        </div>
                        {{-- </form> --}}
                    </div>

                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <td width="5%"> # </td>

                                <td width="20%">Công ty</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 

		                    foreach ($model_congty as $key=>$rp ){ ?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td id="detail"><a href="{{ URL::to('/report-detail?user='.$rp->id.'&tungay='.$tungay.'&denngay='.$denngay.'&type_filter='.$type_filter) }}">{{ $rp->name }}</a></td>
                            </tr>

                            <?php } ?>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
