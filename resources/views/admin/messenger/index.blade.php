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
                        <h3 class="card-label text-uppercase">Hộp thư doanh nghiệp</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-sm-3" style="margin-left: 84% ">
                        <a class="btn btn-sm btn-success" href="{{ URL::to('admessages') }}/create"><i class="fa fa-plus"> &nbsp; Gửi văn bản mới </i></a>
                    </div>

                    <div  style="margin-bottom: 0.5% ">
                        <div  style="text-align: center">
                            <form class="form-inline" method="GET">
                                <label>Tình trạng</label>
                                <select class="form-control w-sm inline v-middle" name="state_filter"
                                    onchange="this.form.submit()">
                                    <option value="0">Tất cả</option>
                                    <option value="1" <?php if ($state_filter == 1) {
                                        echo 'selected';
                                    } ?>>Đã gửi</option>
                                    <option value="2"<?php if ($state_filter == 2) {
                                        echo 'selected';
                                    } ?>>Đã nhận</option>
                                </select>
                            </form>
                        </div>

                    </div>



                    <div class="panel-body">
                        @include('admin.messenger.partials.flash')
						<table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                                <td width="5%"> # </td>
                                <td width="20%"> Tiêu đề</td>
                                <td width="40%"> Nội dung</td>
                                <td width="20%"> File đính kèm</td>
                                <td width="15%"> Người gửi</td>

                            </thead>
                            <tbody>

                                @each('admin.messenger.partials.thread', $threads, 'thread', 'admin.messenger.partials.no-threads')

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>
 @stop
