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
                              <h3 class="card-label text-uppercase">Danh sách tuyển dụng</h3>
                          </div>
                      </div>
                      <div class="card-body">
                        <form class="form-inline" method="GET">
                            <div class="row col-xl-4" style="margin-bottom: 1%">
                                <div class="col-xl-2 ">
                                    <select class="form-control select2basic" name="dm_filter"
                                        onchange="this.form.submit()">
                                        <option value="0">Chọn huyện</option>
                                        <?php foreach ($dmhc_list as $dm) {?>
                                        <option value="{{ $dm->id }}" <?php if ($dm_filter == $dm->id) {
                                            echo 'selected';
                                        } ?>>{{ $dm->name }}</option>
                                        <?php } ?>
            
                                    </select>
                                </div>
                       
                                <div class="col-xl-2 " style="margin-left: 30%">
                                    <select class=" form-control select2basic" name="public_filter"
                                        onchange="this.form.submit()">
                                        <option value="0">Tình trạng </option>
                                        <option value="1" <?php if ($public_filter == 1) {
                                            echo 'selected';
                                        } ?>>Đã duyệt</option>
                                        <option value="2"<?php if ($public_filter == 2) {
                                            echo 'selected';
                                        } ?>>Đã báo cáo</option>
            
                                    </select>
                                </div>
                            
                            </div>
                        </form>
            <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                        <tr>
                            <th style="width:20px;">
                                STT
                            </th>
                            <th>Doanh nghiệp</th>
                            <th>Tên công việc</th>
                            <th>Vị trí</th>
                            <th>Số lượng</th>
                            <th>Ngày đăng</th>
                            <th>Hạn cuối</th>
                            <th>Duyệt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
		$i=($tds->currentPage()-1)*$tds->perPage();
		foreach ($tds as $td ){
			$i++;
	?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $td->name }}</td>
                            <td><a href="{{ URL::to('tuyendung-be') . '/' . $td->id }}">{{ $td->noidung }} </a></td>
                            <td>{{ $td->desc }}</td>
                            <td><span class="text-ellipsis">{{ $td->datuyentutt . '/' . $td->datuyen . '/' . $td->sltuyen }}</span>
                            </td>
                            <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($td->created_at)) }}</span></td>
                            <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($td->thoihan)) }} </span></td>
                            <td><span class="text-ellipsis">
                                    <?php if ($td->state==0){ 
				?>
                                    <a href="{{ URL::to('tuyendung-bu') . '/' . $td->id }}" ui-toggle-class="">
                                        <i class="fa fa-check text-success text-active"></i>
                                        Duyệt
                                    </a>
                                    <?php }elseif($td->state==1){ echo "Đã duyệt"; }
					else { echo "Đã báo cáo";}
					?>

                                </span>
                            </td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

        </div>
    </div>
  </div>
</div>

@endsection
