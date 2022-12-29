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


    <!-- //market-->

    <div class="row">
        <div class="col-md-12">
            <div class="card card-custom">

                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Doanh nghiệp</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <button title="In tổng hợp" data-target="#modify-modal-in" data-toggle="modal"
                            class="btn btn-sm btn-success" onclick="intonghop()">
                            <i class="icon-lg la flaticon2-print"></i> In tổng hợp
                        </button> --}}
                    </div>
                </div>
                <div class="market-updates">
                    <div class="col-md-3 market-update-gd">
                        <div class="market-update-block clr-block-2">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-eye"> </i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>DOANH NGHIỆP</h4>
                                <h4>{{ $dinfo['pcompany'] }}/{{ $dinfo['upcompany'] }}</h4>
                                <p> Hoạt động/ Dừng</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 market-update-gd">
                        <div class="market-update-block clr-block-1">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Lao động</h4>
                                <h4>{{ $dinfo['laodong'] }}/{{ $einfo['tong'] }}</h4>
                                <p>Tổng số LĐ / Số LĐ được sử dụng </p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 market-update-gd">
                        <div class="market-update-block clr-block-3">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Tuyển dụng</h4>
                                <h3>{{ $dinfo['tuyendung'] }}</h3>
                                <p> Nhu cầu tuyển dụng</p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-3 market-update-gd">
                        <div class="market-update-block clr-block-4">
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="col-md-8 market-update-left">
                                <h4>Khai báo </h4>
                                <h3>{{ $dinfo['report'] }}</h3>
                                <p>Số khai báo của doanh nghiệp </p>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
				<form class="form-inline" method="GET">
					<button class="btn btn-sm btn-primary mb-3 ml-3" name="export" value="1" type="submit">Xuất Báo cáo theo mẫu Mẫu số 02/PLI</button>
				</form>
            </div>

        </div>
	</div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card card-custom">

                    <div class="card-header card-header-tabs-line">
                        <div class="card-title">
                            <h3 class="card-label text-uppercase">Cung lao động</h3>
                        </div>
                        <div class="card-toolbar">
                            {{-- <button title="In tổng hợp" data-target="#modify-modal-in" data-toggle="modal"
                            class="btn btn-sm btn-success" onclick="intonghop()">
                            <i class="icon-lg la flaticon2-print"></i> In tổng hợp
                        </button> --}}
                        </div>
                    </div>
                    <div class="market-updates">
                        <div class="col-md-3 market-update-gd">
                            <div class="market-update-block clr-block-2">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-eye"> </i>
                                </div>
                                <div class="col-md-8 market-update-left">
                                    <h4>LĐ trên 15 tuổi</h4>
                                    <h4>{{ $tongsonhankhau }}</h4>
                                    
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-3 market-update-gd">
                            <div class="market-update-block clr-block-1">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="col-md-8 market-update-left">
                                    <h4>LĐ có việc làm</h4>
                                    {{-- <h4>{{ $ldcovieclam }}/{{ $tongsonhankhau }}</h4> --}}
                                    <h4>{{ $ldcovieclam }}</h4>
                                   
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-3 market-update-gd">
                            <div class="market-update-block clr-block-3">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="col-md-8 market-update-left">
                                    <h4>LĐ thất nghiệp</h4>
                                    {{-- <h3>{{ $ldthatnghiep }}/{{ $tongsonhankhau }}</h3> --}}
                                    <h3>{{ $ldthatnghiep }}</h3>
                                  
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="col-md-3 market-update-gd">
                            <div class="market-update-block clr-block-4">
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-12 market-update-left">
                                    <h4>LĐ không tham gia HĐKT</h4>
                                    {{-- <h3>{{ $ldkhongthamgia }}/{{ $tongsonhankhau }}</h3> --}}
                                    <h3>{{ $ldkhongthamgia }}</h3>
                                 
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
					<a href="" class="btn btn-sm btn-primary col-md-3 mb-3 ml-3">Xuất báo cáo theo mẫu 03/TT1

					</a>
                </div>
            </div>
        </div>
        <!-- //market-->
        {{-- <div class="row mb-3"  >
			<div class="col-xl-12">
				<div class="card card-custom">
				<div class="card-header card-header-tabs-line">
					<div class="card-title">
                        <h3 class="card-label text-uppercase">Thông tin Sử dụng lao động</h3>
                    </div>
				  <div class="card-heading">Thông tin Sử dụng lao động</div>
				</div>
				  <div class="card-body">
				  <table class="table table-bordered centered">
					<thead>
					  <tr>
						<th rowspan=2>Người sử dụng lao động</th>
						<th colspan= 4>Tổng số lao động được sữ dụng</th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tổng</td>
						<td>{{$einfo['tong']}}</td>
						<td>{{$einfo['nu']}}</td>
						<td>{{$einfo['age']}}</td>
						<td>{{$einfo['bhxh']}}</td>
						<td>{{$einfo['quanly']}}</td>
						<td>{{$einfo['cmktcao']}}</td>
						<td>{{$einfo['cmkttrung']}}</td>
						<td>{{$einfo['cmktkhac']}}</td>
						<td>{{$einfo['hdkhongthoihan']}}</td>
						<td>{{$einfo['hdcothoihan']}}</td>
						<td>{{$einfo['hdkhac']}}</td>
					  </tr>
					 
					</tbody>
				  </table>
				 <form class="form-inline" method="GET">
					<button class="btn btn-sm btn-default" name="export" value="1" type="submit">Xuất Báo cáo theo mẫu Mẫu số 02/PLI</button>
				</form>
				  </div>
				</div>
				
			</div>
		</div> --}}
        {{-- <div class="row"  >
			<div class="col-xl-12">
				<div class="card card-custom">
					<div class="card-header card-header-tabs-line">
						<div class="card-title">
							<h3 class="card-label text-uppercase">Thông tin Sử dụng lao động</h3>
						</div>
					  <div class="card-heading">Thông tin Sử dụng lao động</div>
					</div>
					<div class="card-body">				  
				  <table class="table table-bordered centered">
					<caption style="text-align:center;"><div> Kỳ hiện tại (tháng <?php echo date('m / Y'); ?>)</div></caption>
					<thead>
					  <tr>
						<th rowspan=2>Biến động </th>
						<th colspan= 4>Tổng số lao động </th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tăng</td>
						<td>{{$rinfoup['tong']}}</td>
						<td>{{$rinfoup['nu']}}</td>
						<td>{{$rinfoup['age']}}</td>
						<td>{{$rinfoup['bhxh']}}</td>
						<td>{{$rinfoup['quanly']}}</td>
						<td>{{$rinfoup['cmktcao']}}</td>
						<td>{{$rinfoup['cmkttrung']}}</td>
						<td>{{$rinfoup['cmktkhac']}}</td>
						<td>{{$rinfoup['hdkhongthoihan']}}</td>
						<td>{{$rinfoup['hdcothoihan']}}</td>
						<td>{{$rinfoup['hdkhac']}}</td>
					  </tr>
					 <tr>
						<td>Giảm</td>
						<td>{{$rinfodown['tong']}}</td>
						<td>{{$rinfodown['nu']}}</td>
						<td>{{$rinfodown['age']}}</td>
						<td>{{$rinfodown['bhxh']}}</td>
						<td>{{$rinfodown['quanly']}}</td>
						<td>{{$rinfodown['cmktcao']}}</td>
						<td>{{$rinfodown['cmkttrung']}}</td>
						<td>{{$rinfodown['cmktkhac']}}</td>
						<td>{{$rinfodown['hdkhongthoihan']}}</td>
						<td>{{$rinfodown['hdcothoihan']}}</td>
						<td>{{$rinfodown['hdkhac']}}</td>
					  </tr>
					  <tr>
						<td>Tổng</td>
						<td>{{$rinfoup['tong']-$rinfodown['tong']}}</td>
						<td>{{$rinfoup['nu']-$rinfodown['nu']}}</td>
						<td>{{$rinfoup['age']-$rinfodown['age']}}</td>
						<td>{{$rinfoup['bhxh']-$rinfodown['bhxh']}}</td>
						<td>{{$rinfoup['quanly']-$rinfodown['quanly']}}</td>
						<td>{{$rinfoup['cmktcao']-$rinfodown['cmktcao']}}</td>
						<td>{{$rinfoup['cmkttrung']-$rinfodown['cmkttrung']}}</td>
						<td>{{$rinfoup['cmktkhac']-$rinfodown['cmktkhac']}}</td>
						<td>{{$rinfoup['hdkhongthoihan']-$rinfodown['hdkhongthoihan']}}</td>
						<td>{{$rinfoup['hdcothoihan']-$rinfodown['hdcothoihan']}}</td>
						<td>{{$rinfoup['hdkhac']-$rinfodown['hdkhac']}}</td>
					  </tr>
					</tbody>
				  </table>
				
				
				
				  <table class="table table-bordered centered">
					<caption style="text-align:center;"><div>Kỳ trước(tháng <?php echo date('m / Y', strtotime(date('Y-m-d', strtotime(date('Y-m-d'))) . '-1 month')); ?>)</div></caption>
					<thead>
					  <tr>
						<th rowspan=2>Biến động </th>
						<th colspan= 4>Tổng số lao động </th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tăng</td>
						<td>{{$last_rinfoup['tong']}}</td>
						<td>{{$last_rinfoup['nu']}}</td>
						<td>{{$last_rinfoup['age']}}</td>
						<td>{{$last_rinfoup['bhxh']}}</td>
						<td>{{$last_rinfoup['quanly']}}</td>
						<td>{{$last_rinfoup['cmktcao']}}</td>
						<td>{{$last_rinfoup['cmkttrung']}}</td>
						<td>{{$last_rinfoup['cmktkhac']}}</td>
						<td>{{$last_rinfoup['hdkhongthoihan']}}</td>
						<td>{{$last_rinfoup['hdcothoihan']}}</td>
						<td>{{$last_rinfoup['hdkhac']}}</td>
					  </tr>
					 <tr>
						<td>Giảm</td>
						<td>{{$last_rinfodown['tong']}}</td>
						<td>{{$last_rinfodown['nu']}}</td>
						<td>{{$last_rinfodown['age']}}</td>
						<td>{{$last_rinfodown['bhxh']}}</td>
						<td>{{$last_rinfodown['quanly']}}</td>
						<td>{{$last_rinfodown['cmktcao']}}</td>
						<td>{{$last_rinfodown['cmkttrung']}}</td>
						<td>{{$last_rinfodown['cmktkhac']}}</td>
						<td>{{$last_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$last_rinfodown['hdcothoihan']}}</td>
						<td>{{$last_rinfodown['hdkhac']}}</td>
					  </tr>
					  <tr>
						<td>Tổng</td>
						<td>{{$last_rinfoup['tong']-$last_rinfodown['tong']}}</td>
						<td>{{$last_rinfoup['nu']-$last_rinfodown['nu']}}</td>
						<td>{{$last_rinfoup['age']-$last_rinfodown['age']}}</td>
						<td>{{$last_rinfoup['bhxh']-$last_rinfodown['bhxh']}}</td>
						<td>{{$last_rinfoup['quanly']-$last_rinfodown['quanly']}}</td>
						<td>{{$last_rinfoup['cmktcao']-$last_rinfodown['cmktcao']}}</td>
						<td>{{$last_rinfoup['cmkttrung']-$last_rinfodown['cmkttrung']}}</td>
						<td>{{$last_rinfoup['cmktkhac']-$last_rinfodown['cmktkhac']}}</td>
						<td>{{$last_rinfoup['hdkhongthoihan']-$last_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$last_rinfoup['hdcothoihan']-$last_rinfodown['hdcothoihan']}}</td>
						<td>{{$last_rinfoup['hdkhac']-$last_rinfodown['hdkhac']}}</td>
					  </tr>
					</tbody>
				  </table>
			<form class="form-inline" method="GET">	
				<table class="table table-bordered centered">
					<caption style="text-align:center;"><div>
					Bắt đầu
					<input  type="month" name="m_filter_s" value="{{$m_filter_s}}" class="form-control "  onchange="this.form.submit();"  /> </td>
					Kết thúc
					<input type="month" name="m_filter_e" value="{{$m_filter_e}}" class="form-control "  onchange="this.form.submit();"  /> </td>
		
					</div></caption>
					<thead>
					  <tr>
						<th rowspan=2>Biến động </th>
						<th colspan= 4>Tổng số lao động </th>
						<th colspan= 4>Vị trí việc làm </th>
						<th colspan= 3>Loại và hiệu lực hợp đồng lao động</th>
					  </tr>
					  <tr>
						<th>Tổng</th>
						<th>Nữ </th>
						<th>Trên 35 tuổi</th>
						<th>Tham gia BHXH bắt buộc</th>
						<th>Nhà quản lý	</th>
						<th>Chuyên môn kỹ thuật bậc cao</th>
						<th>Chuyên môn kỹ thuật bậc trung</th>
						<th>Khác</th>
						<th>Số lao động tham gia HĐLĐ không xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ xác định thời hạn</th>
						<th>Số lao động tham gia HĐLĐ khác (dưới 1 tháng, thử việc)</th>
						
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tăng</td>
						<td>{{$cus_rinfoup['tong']}}</td>
						<td>{{$cus_rinfoup['nu']}}</td>
						<td>{{$cus_rinfoup['age']}}</td>
						<td>{{$cus_rinfoup['bhxh']}}</td>
						<td>{{$cus_rinfoup['quanly']}}</td>
						<td>{{$cus_rinfoup['cmktcao']}}</td>
						<td>{{$cus_rinfoup['cmkttrung']}}</td>
						<td>{{$cus_rinfoup['cmktkhac']}}</td>
						<td>{{$cus_rinfoup['hdkhongthoihan']}}</td>
						<td>{{$cus_rinfoup['hdcothoihan']}}</td>
						<td>{{$cus_rinfoup['hdkhac']}}</td>
					  </tr>
					 <tr>
						<td>Giảm</td>
						<td>{{$cus_rinfodown['tong']}}</td>
						<td>{{$cus_rinfodown['nu']}}</td>
						<td>{{$cus_rinfodown['age']}}</td>
						<td>{{$cus_rinfodown['bhxh']}}</td>
						<td>{{$cus_rinfodown['quanly']}}</td>
						<td>{{$cus_rinfodown['cmktcao']}}</td>
						<td>{{$cus_rinfodown['cmkttrung']}}</td>
						<td>{{$cus_rinfodown['cmktkhac']}}</td>
						<td>{{$cus_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$cus_rinfodown['hdcothoihan']}}</td>
						<td>{{$cus_rinfodown['hdkhac']}}</td>
					  </tr>
					  <tr>
						<td>Tổng</td>
						<td>{{$cus_rinfoup['tong']-$cus_rinfodown['tong']}}</td>
						<td>{{$cus_rinfoup['nu']-$cus_rinfodown['nu']}}</td>
						<td>{{$cus_rinfoup['age']-$cus_rinfodown['age']}}</td>
						<td>{{$cus_rinfoup['bhxh']-$cus_rinfodown['bhxh']}}</td>
						<td>{{$cus_rinfoup['quanly']-$cus_rinfodown['quanly']}}</td>
						<td>{{$cus_rinfoup['cmktcao']-$cus_rinfodown['cmktcao']}}</td>
						<td>{{$cus_rinfoup['cmkttrung']-$cus_rinfodown['cmkttrung']}}</td>
						<td>{{$cus_rinfoup['cmktkhac']-$cus_rinfodown['cmktkhac']}}</td>
						<td>{{$cus_rinfoup['hdkhongthoihan']-$cus_rinfodown['hdkhongthoihan']}}</td>
						<td>{{$cus_rinfoup['hdcothoihan']-$cus_rinfodown['hdcothoihan']}}</td>
						<td>{{$cus_rinfoup['hdkhac']-$cus_rinfodown['hdkhac']}}</td>
					  </tr>
					</tbody>
				</table>
			</form>
				  </div>
				</div>
				
			</div>
		</div> --}}

        {{-- <div class="row"  style="display:none;">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>Thống kê tình trạng thất nghiệp</h3>
										<div class="toolbar">
											
											
										</div>
								</header>
								<div class="agileits-box-body clearfix">
									<div id="hero-area"></div>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		
				</div>
			</div>
			<div class="clearfix"> </div>
		</div> --}}

        <div class="agileits-w3layouts-stats" style="display:none;">
            <div class="col-md-4 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Phân bố nhu cầu tuyển dụng</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">
                            <li>Lao động phổ thông <span class="pull-right">85%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar green" style="width:85%;"></div>
                                </div>
                            </li>
                            <li>Trung cấp <span class="pull-right">35%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar yellow" style="width:35%;"></div>
                                </div>
                            </li>
                            <li>Cao đẳng <span class="pull-right">78%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar red" style="width:78%;"></div>
                                </div>
                            </li>
                            <li>Đại học <span class="pull-right">50%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar blue" style="width:50%;"></div>
                                </div>
                            </li>
                            <li>Sau đại học <span class="pull-right">80%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar light-blue" style="width:80%;"></div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Phân bố doanh nghiệp hoạt động</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">
                            <li>Du lịch<span class="pull-right">85%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar green" style="width:85%;"></div>
                                </div>
                            </li>
                            <li>Điện <span class="pull-right">35%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar yellow" style="width:35%;"></div>
                                </div>
                            </li>
                            <li>Điện lạnh <span class="pull-right">78%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar red" style="width:78%;"></div>
                                </div>
                            </li>
                            <li>Giáo viên <span class="pull-right">50%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar blue" style="width:50%;"></div>
                                </div>
                            </li>
                            <li>Khác <span class="pull-right">80%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar light-blue" style="width:80%;"></div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stats-info widget">
                <div class="stats-info-agileits">
                    <div class="stats-title">
                        <h4 class="title">Phân bố thất nghiệp</h4>
                    </div>
                    <div class="stats-body">
                        <ul class="list-unstyled">
                            <li>Đồng Hới <span class="pull-right">85%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar green" style="width:85%;"></div>
                                </div>
                            </li>
                            <li>Quảng Trạch <span class="pull-right">35%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar yellow" style="width:35%;"></div>
                                </div>
                            </li>
                            <li>Bố Trạch <span class="pull-right">78%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar red" style="width:78%;"></div>
                                </div>
                            </li>
                            <li>Lệ Thủy <span class="pull-right">50%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar blue" style="width:50%;"></div>
                                </div>
                            </li>
                            <li>Tuyên Hóa <span class="pull-right">80%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar light-blue" style="width:80%;"></div>
                                </div>
                            </li>
                            <li>Minh Hóa <span class="pull-right">80%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar light-blue" style="width:80%;"></div>
                                </div>
                            </li>
                            <li>Quảng Ninh <span class="pull-right">80%</span>
                                <div class="progress progress-striped active progress-right">
                                    <div class="bar light-blue" style="width:80%;"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="taskoverview" style="display:none;">
            <div class="col-md-12 stats-info stats-last widget-shadow">
                <div class="stats-last-agile">
                    <table class="table stats-table ">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Công việc</th>
                                <th>Tình trạng</th>
                                <th>Tiến trình</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Tổ chức tuyển dụng trong kỳ</td>
                                <td><span class="label label-success">Đang tiến hành</span></td>
                                <td>
                                    <h5>85% <i class="fa fa-level-up"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Báo cáo định kỳ cho sở</td>
                                <td><span class="label label-warning">Sắp tới deadline</span></td>
                                <td>
                                    <h5>35% <i class="fa fa-level-up"></i></h5>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Tập huấn phần mềm cho cán bộ</td>
                                <td><span class="label label-danger">Quá hạn</span></td>
                                <td>
                                    <h5 class="down">40% <i class="fa fa-level-down"></i></h5>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <script>
            $(document).ready(function() {

                //CHARTS
                function gd(year, day, month) {
                    return new Date(year, month - 1, day).getTime();
                }

                graphArea2 = Morris.Area({
                    element: 'hero-area',
                    padding: 10,
                    behaveLikeLine: true,
                    gridEnabled: false,
                    gridLineColor: '#dddddd',
                    axes: true,
                    resize: true,
                    smooth: true,
                    pointSize: 0,
                    lineWidth: 0,
                    fillOpacity: 0.85,
                    data: [{
                            period: '2019 Q1',
                            cung: 2668,
                            cau: null
                        },
                        {
                            period: '2019 Q2',
                            cung: 15780,
                            cau: 13799
                        },
                        {
                            period: '2019 Q3',
                            cung: 12920,
                            cau: 10975
                        },
                        {
                            period: '2019 Q4',
                            cung: 8770,
                            cau: 6600
                        },
                        {
                            period: '2020 Q1',
                            cung: 10820,
                            cau: 10924
                        },
                        {
                            period: '2020 Q2',
                            cung: 9680,
                            cau: 9010
                        },
                        {
                            period: '2020 Q3',
                            cung: 4830,
                            cau: 3805
                        },
                        {
                            period: '2020 Q4',
                            cung: 15083,
                            cau: 8977
                        },
                        {
                            period: '2021 Q1',
                            cung: 10697,
                            cau: 4470
                        },

                    ],
                    lineColors: ['#eb6f6f', '#926383'],
                    xkey: 'period',
                    redraw: true,
                    ykeys: ['cung', 'cau'],
                    labels: ['Thất nghiệp', 'Nhu cầu'],
                    pointSize: 2,
                    hideHover: 'auto',
                    resize: true
                });


            });
        </script>

    @endsection
