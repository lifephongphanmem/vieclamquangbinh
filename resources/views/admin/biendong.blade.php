
@extends('pages.layout')
@section('mainpanel')
<div class="top-menu">
						@include('pages.topmenu')
						@yield('top-menu') 
</div>


<div class="clear" style="clear:both;"></div>

<div class="row ">	
<div class="col-sm-10 col-sm-offset-1">
		<div class="function-menu pull-left">
			<ul class="nav navbar-nav">
										<li><a href="#"><i class="fa fa-plus"></i> Đăng tuyển dụng mới</a></li>								
										<li><a href="#"><i class="fa fa-minus"></i> Đóng tuyển dụng</a></li>								
																	
			</ul>
		</div>
		<div class="clear" style="clear:both;"><h3> Các tuyển dụng gần đây</h3>  </div>	

	
	
	<table  class="table">
	<thead class="thead-dark">
		<td width="10%"> # </td>
		<td width="20%"> Tiêu đề</td>
		<td width="20%"> Mô tả</td>
		<td width="10%"> Ngày bắt đầu</td>
		<td width="10%"> Ngày kết thúc</td>
		<td width="10%"> Khu vực</td>
		<td width="10%"> Ngày đăng</td>
		<td width="10%"> Tình trạng</td>
		
	</thead>
	<tbody>
	<tr>
		<td >1</td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td ></td>
		
	</tr>
	</tbody>
	</table>
</div>
	
</div>
@endsection