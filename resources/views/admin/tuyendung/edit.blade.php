@extends ('admin.layout')

@section ('content')

<div class="clear" style="clear:both;"></div>

<section class="panel">
<div class="row ">	
	<div class="col-sm-6 col-sm-offset-2">                   
		<div class="" >
		<h3> Xem tin tuyển dụng </h3>
		</div>
	</div>
 </div>
<form role="form" method="POST" action="{{URL::to('tuyendung-fu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
	
  
	  <div class="row">
		<fieldset class="col-sm-8 col-sm-offset-2">
		<legend>Thông tin chung</legend> 
	  <div class="col-sm-5 col-sm-offset-0 " > 
	
		<div class="form-group">
			<label>Nội dung tuyển dụng </label>
			<textarea name="noidung" rows=5 required class="form-control">{{$td->noidung}}"</textarea>
		</div>
		
		<div class="form-group">
			<label>Thời hạn tuyển dụng </label>
			<input type='date' name="thoihan" class="form-control" value="{{$td->thoihan}}"required >
		</div>
		
		<div class="form-group">
			<label>Hình thức tuyển dụng </label>
			<select class="form-control input-sm " name ="type" >
						<option value='Trực tiếp'  >Trực tiếp </option>
						<option value='Qua điện thoại'  <?php if($td->type=='Qua điện thoại'){echo "selected";} ?>>Qua điện thoại</option>
						<option value='Phỏng vấn online' <?php if($td->type=='Phỏng vấn online'){echo "selected";} ?> >Phỏng vấn online</option>
						<option value='Nộp CV'  <?php if($td->type=='Nộp CV'){echo "selected";} ?>>Nộp CV</option>
						</select>
		</div>
		<div class="form-group">
			<label> Họ và tên người liên hệ</label>
			<input type="text" size=40 name="contact"class="form-control" value="{{$td->contact}}" required >
				
		</div>
	</div>
	<div class="col-sm-4 ">
	
		<div class="form-group">
			<label>Chức vụ </label>
			<input type="text" size=40 class="form-control" name="chucvutd" value="{{$td->chucvutd}}"  > 
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
			<label> Hình thức liên lạc</label>
			<select class="form-control input-sm " name ="contacttype" >
					<option value='Nhận SMS ứng tuyển'  >Nhận SMS ứng tuyển</option>
					<option value='Nhận Email'  <?php if($td->contacttype=='Nhận Email'){echo "selected";} ?>>Nhận Email</option>
					<option value='Gặp trực tiếp' <?php if($td->contacttype=='Gặp trực tiếp'){echo "selected";} ?>>Gặp trực tiếp</option>
					
				</select>
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
	
	</fieldset>
		
	
	</div>  
<hr>
	<div class="vitri" id='dynamicTable'>  
	<?php
		$i=0;
	foreach ($vitris as $vitri) { $i++; ?>
	<div class="row" id="1stld">
	
		<div class="col-sm-4 col-sm-offset-2"> 
			<div><a href="#" > Vị trí {{$i}} </a> </div>
				<label> Tên công việc </label>
				<input type="text" name="name[]" size=40 value="{{$vitri->name}}" required>
		
				<label>Số lượng tuyển</label>
				<input type="text" name="soluong[]" size=10 value="{{$vitri->soluong}}" required>
			
		</div>
		<div class="col-sm-4 "> 
				 <label> Mô tả công việc </label>
				 <textarea   rows=6 cols= 30 name="description[]" required> {{$vitri->description}} </textarea>
			</div>	
			
			
		
			
			</div>
		</div>
	<?php } ?>
	</div>
	
	</form>
                       
 </section>					

@endsection