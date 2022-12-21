
@extends('pages.layout')
@section('mainpanel')
<div class="row ">	
	<div class="col-sm-10 col-sm-offset-1">
		<div class="top-menu">
			@include('pages.menu.dnmenu')
			@yield('top-menu') 
		</div>
	</div>
</div>

<div class="clear" style="clear:both;"></div>

<div class="row ">	
	<div class="col-sm-6 col-sm-offset-4">

		<div class="function-menu pull-right">
			<ul class="nav navbar-nav">
			<li><a href="{{URL::to('tuyendung-fn')}}"><i class="fa fa-plus"></i> Đăng tuyển dụng mới</a></li>													
										
			</ul>
		</div>
	</div>
</div>
<form class="form-inline" method="GET">
<div class="row ">	
	<div class="col-sm-4 col-sm-offset-2">
		<label>Lọc theo tình trạng</label>
		<select class="input-sm form-control w-sm inline v-middle" name="state_filter" onchange="this.form.submit()">
          <option value="0">Tất cả</option>
          <option value="1" <?php if($state_filter==1){echo "selected";}?>>Đã xác nhận</option>
          <option value="2"<?php if($state_filter==2){echo "selected";}?>>Đã báo cáo</option>
         </select>
	</div>
	<div class="col-sm-4 ">
	</div>
</div>
			 
</form>
<div class="row ">	
<div class="col-sm-8 col-sm-offset-2">
<div class="clear" style="clear:both;"><h3>Các tuyển dụng gần đây</h3> </div>
	
<div class="table-responsive">
	<table  class="table table-striped  table-bordered">
	<thead class="text-center" >
		<td width="5%"> # </td>
		<td width="20%"> Nội dung</td>
		<td width="25%"> Vị trí</td>
		<td width="10%"> Thời hạn</td>
		<td width="10%"> Ngày đăng</td>
		<td width="10%"> Tình trạng </td>
		<td width="10%"> Số LĐ đã tuyển</td>
		<td width="10%"> Chức năng </td>
		
	</thead>
	<tbody>
<?php 
		$i=($tds->currentPage()-1)*$tds->perPage();
		foreach ($tds as $td ){
			$i++;
	?>
	<tr>
		<td >{{$i}}</td>
		<td >
			<a href="{{URL::to('tuyendung-fe').'/'.$td->id}}">
				{{ $td->noidung }}
			</a>
		</td>
		<td > {!! $td->desc!!}</td>
		<td > {{ date('d-m-Y', strtotime($td->thoihan))}}</td>
		<td > {{ date('d-m-Y', strtotime($td->created_at))}}</td>
		<td > 
			<?php	
			switch($td->state){
			case "1":echo "Đã xác nhận"; break;
			case "2":echo "Đã  báo cáo kết quả"; break;
			default: 
					echo "Chưa xác nhận";
				} ?>
		</td>
		<td > {{ ($td->datuyen)?$td->datuyen:0}}</td>
		<td >
			<a href="{{URL::to('tuyendung-fr').'/'.$td->id}}" <?php if($td->state!=1){echo "class='btn disabled'";} ?>>
				Báo cáo kết quả
			</a>
		</td>
		
	</tr>
	<?php } ?>	  
	</tbody>
	</table>
</div>
	<footer class="panel-footer">
      <div class="row">
	
       <div class="d-flex justify-content-center">
	     Tổng cộng {{$tds->total()}}  kết quả 
		{!! $tds->links('pagination::bootstrap-4') !!}
      </div>
	  </div>
    </footer>
</div>
</div>
@endsection