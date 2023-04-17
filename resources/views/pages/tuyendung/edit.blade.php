
@extends ('main')
@section('content')


{{-- <section class="panel">
				<header class="panel-heading">
				<div class="row ">
					<div class="col-sm-8 col-sm-offset-2">                   
					<div>
					 <h3> Xem tin tuyển dụng </h3>
					</div>
					</div>
				</div>
				</header> --}}
     <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Xem tin tuyển dụng</h3>
                    </div>
                    <div class="card-toolbar">
					
                    </div>

                </div>
				 <div class="card-body">
					<legend class="text-info">Thông tin chung</legend>
<form role="form" method="POST" action="{{URL::to('tuyendung-fu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
<div class="row">
	<div class="col-sm-6 col-sm-offset-1 " > 
		<div class="form-group">
			<label>Nội dung tuyển dụng </label>
			<textarea name="noidung" rows=10 required class="form-control">{{$td->noidung}}"</textarea>
		</div>
		<div class="form-group">
			<label>Thời hạn tuyển dụng </label>
			<input type='date' name="thoihan" class="form-control" value="{{$td->thoihan}}"required >
		</div>
	</div>
	<div class="col-sm-6 ">
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
	

 <div class="row">
	   <div class="col-xl-12">
		<button  class="btn btn-success">Vị trí tuyển dụng</button> 
		<?php
			$i=0;
		foreach ($vitris as $vitri) { $i++; ?>
		<div class="row" >
			<div class="col-sm-4 "> 
				<div class="form-group">
					<label>Tên công việc</label>
					<input type="text" name="soluong[]" value="{{$vitri->name}}" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Số lượng tuyển</label>
					<input type="text" name="soluong[]" value="{{$vitri->soluong}}" class="form-control" required>
				</div>
			</div>
			<div class="col-sm-8 "> 
				<div class="form-group">	
					<label> Mô tả công việc </label>
					 <textarea rows=6  name="description[]" class="form-control"> {{$vitri->description}} </textarea>
				</div>	
			</div>	
		</div>
		<?php } ?>
			</div>
	</div>
	

</form>

	</div>
        </div>
    </div>        
      </div> 
	  </div> 
	  
	</div>
</section>	
@endsection