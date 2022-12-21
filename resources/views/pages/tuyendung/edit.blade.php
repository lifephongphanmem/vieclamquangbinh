
@extends('pages.layout')
@section('mainpanel')
<section class="panel">
				<header class="panel-heading">
				<div class="row ">
					<div class="col-sm-8 col-sm-offset-2">                   
					<div>
					 <h3> Xem tin tuyển dụng </h3>
					</div>
					</div>
				</div>
				</header>
 
<form role="form" method="POST" action="{{URL::to('tuyendung-fu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 " > 
		 	
  <fieldset class="scheduler-border" >
		<legend class="scheduler-border text-info">Thông tin chung</legend>
		
	 <div class="row">
		
		<div class="col-sm-7 col-sm-offset-0 " > 
	
		<div class="form-group">
			<label>Nội dung tuyển dụng </label>
			<textarea name="noidung" rows=5 required class="form-control">{{$td->noidung}}"</textarea>
		</div>
		
		<div class="form-group">
			<label>Thời hạn tuyển dụng </label>
			<input type='date' name="thoihan" class="form-control" value="{{$td->thoihan}}"required >
		</div>
		
		
	</div>
	<div class="col-sm-5 ">
		
		<div class="form-group">
			<label> Họ và tên người liên hệ</label>
			<input type="text" size=40 name="contact"class="form-control" value="{{$td->contact}}" required >
				
		</div>
		<div class="form-group">
			<label> Điện thoại  </label>
			<input type="text" size=40 name="phonetd" class="form-control" required value="{{$td->phonetd}}" > 
		</div>
		<div class="form-group">
			<label>Email </label>
			<input type="email" size=40 name="emailtd" class="form-control"required value="{{$td->emailtd}}" >
		</div>
		
		
		<div class="form-group">
			<label> Yêu cầu TTDVVL</label>
			<select class="form-control " name ="yeucau" >
					<option value='Tư vấn'  >Tư vấn</option>
					<option value='Giới thiệu việc làm' <?php if($td->yeucau=='Gặp trực tiếp'){echo "selected";} ?>>Giới thiệu việc làm</option>
					<option value='Cung ứng lao động'<?php if($td->yeucau=='Cung ứng lao động'){echo "selected";} ?>>Cung ứng lao động</option>
					
				</select>	
		</div>
	</div>
</div>
</fieldset>
		

<fieldset class="scheduler-border"  >
		<legend class="scheduler-border text-info" >Vị trí</legend> 
	
		<?php
			$i=0;
		foreach ($vitris as $vitri) { $i++; ?>
		<div class="row" >
	
			<div class="col-sm-6 col-sm-offset-0"> 
				<div><a href="#" > {{$vitri->name}} </a> </div>
				<div class="form-group">
					<label>Số lượng tuyển</label>
					<input type="text" name="soluong[]" size=10 value="{{$vitri->soluong}}" required>
				
				</div>
			</div>
			<div class="col-sm-6 "> 
				<div class="form-group">	
					<label> Mô tả công việc </label>
					 <textarea   rows=6 cols= 30 name="description[]" > {{$vitri->description}} </textarea>
				</div>	
			</div>	
				
		</div>

		<?php } ?>
	
	</fieldset>

	</div>
	</div>	
</form>
</section>	
@endsection