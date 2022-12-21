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
@section('content')>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Dịch vụ</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a class="btn btn-xs btn-primary" href="{{ URL::to('dichvu-ba') }}"><i class="fa fa-undo">&ensp; Trở về </a></i> --}}
                        <a href="{{ URL::to('dichvu-bn') }}" class="btn btn-xs btn-success"><i class="fa fa-plus"> &ensp;Tạo
                                dịch vụ mới </a></i>
                    </div>
                </div>
                <div class="card-body">

                    <form method="GET">
                        <div class="row w3-res-tb" style="margin-bottom: 1%">
                            {{-- <div class="btn" style="margin-left: 84%">
                                <i class="fa fa-plus"> <a href="{{ URL::to('dichvu-bn') }}"> Tạo dịch vụ mới </a></i>

                            </div> --}}
                            <div class="col-sm-2 ">
                                <select class="form-control w-sm inline " name="public_filter"
                                    onchange="this.form.submit()">
                                    <option value="0">Lọc theo tình trạng</option>
                                    <option value="1" <?php if ($state_filter == 1) {
                                        echo 'selected';
                                    } ?>>Hoạt động</option>
                                    <option value="2"<?php if ($state_filter == 2) {
                                        echo 'selected';
                                    } ?>>Không hoạt động</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th style="width:20px;">
                                    <label class="i-checks m-b-none">
                                        <input type="checkbox"><i></i>
                                    </label>
                                </th>
                                <th>Tên</th>
                                <th>Mô tả</th>
                                <th>Doanh nghiệp Đăng Ký</th>
                                <th>Hoạt động</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($dvs)){
			
				
			foreach ($dvs as $dv) {     
			
			?>
                            <tr>
                                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label>
                                </td>
                                <td><a href="{{ URL::to('dichvu-be') . '/' . $dv->id }}">{{ $dv->name }}</a></td>
                                <td><span class="text-ellipsis">{{ $dv->description }} </span></td>
                                <td><span class="text-ellipsis"><a
                                            href="{{ URL::to('dichvudk-ba') . '/' . $dv->id }}">{{ $dv->company }}
                                        </a></span></td>
                                <td><span class="text-ellipsis">
                                        <?php if ($dv->state==1){ 
				?>
                                        <i class="fa fa-check text-success text-active"></i>
                                        <?php }else{ ?>
                                        <i class="fa fa-close text-success text-active" style="color:red"></i>

                                        <?php }?></span>
                                </td>
                                <td>

                                    <a href="{{ URL::to('dichvu-bd') . '/' . $dv->id }}"
                                        onclick="return confirm('Bạn muốn xóa dịch vụ?');"><i
                                            class="fa fa-times text-danger text"></i></a>
                                </td>
                            </tr>

                            <?php 
			} 
	 } 
	 ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
