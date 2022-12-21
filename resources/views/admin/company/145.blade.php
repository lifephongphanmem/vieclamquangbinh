@extends ('admin.layout')

@section ('content')
 

<section class="panel">
	<header class="panel-heading">
	   Chi tiết doanh nghiệp
	</header>
<div class="chitietdoanhnghiep">


		</div>
	<div class="row">
		
			
		<div class="col-sm-4 col-sm-offset-2">
		
			<h3>Thông tin khác </h3>
			<div>Tổng số lao động: {{$info->tonghop['slld']}}</div>
			<div>Số lao động ngoại tỉnh: {{$info->tonghop['slld']-$info->tonghop['trongtinh']}}</div>
			<div>Số lao động trực tiếp:{{$info->tonghop['tructiep']}} </div>
			<div>Số lao động nữ :{{$info->tonghop['nu']}}</div>
			<div>Số lao động đã ký HĐLĐ (tổng/nữ): {{$info->tonghop['dakyhd']}}/ {{$info->tonghop['nudakyhd']}} </div>
			<div>Số lao động nước ngoài (tổng/nữ): {{$info->tonghop['nuocngoai']}}/ {{$info->tonghop['nunuocngoai']}} </div>
			<div>Số lao động đã tốt nghiệp phổ thông :{{$info->tonghop['tnpt']}}</div>
			</div>
			<div class="col-sm-4 ">	
			<h3>Tiền lương</h3>
			<div>Lương bình quân 6 tháng cuối năm :{{$info->tonghop['avgluong']}}</div>
			<div>Lương thấp nhất 6 tháng cuối năm :{{$info->tonghop['minluong']}}</div>
			<div>Lương cao nhất 6 tháng cuối năm :{{$info->tonghop['maxluong']}}</div>
			
	
	
			</div>
		</div>
		<div class="row">
		
			
		<div class="col-sm-3 col-sm-offset-2">
			<h3>Phân bố LD theo trình độ CMKT </h3>
			<?php
			foreach($info->pbcmkt as $key =>$val) 
			{ ?> 
				<div>{{$key}} : {{$val}}</div> 
			<?php } ?>
			
			
		</div>
		<div class="col-sm-3">
			<h3>Phân bố LD theo lĩnh vực GDĐT </h3>
			<?php
			foreach($info->pblvdt as $key =>$val) 
			{ ?> 
				<div>{{$key}} : {{$val}}</div> 
			<?php } ?>
			
		</div>
		<div class="col-sm-3"> 
			<h3>Phân bố LD theo nhóm ngành nghề chính</h3>
			<?php
			foreach($info->pbnghenghiep as $key =>$val) 
			{ ?> 
				<div>{{$key}} : {{$val}}</div> 
			<?php } ?>
		</div>
	</div>	
</div>
</section>
@endsection