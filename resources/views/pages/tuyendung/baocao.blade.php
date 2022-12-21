
@extends('pages.layout')
@section('mainpanel')

		<div class="top-menu">
			@include('pages.menu.dnmenu')
			@yield('top-menu') 
		</div>
	

<div class="clear" style="clear:both;"></div>

<section class="panel">
<div class="row ">	
	<div class="col-sm-6 col-sm-offset-2">                   
		<div  " >
		<h3> Xem tin tuyển dụng </h3>
		</div>
	</div>
 </div>
<form role="form" method="POST" action="{{URL::to('tuyendung-fru')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
	
  
	  <div class="row">
		<fieldset class="col-sm-8 col-sm-offset-2">
		<legend>Thông tin chung</legend> 
	  <div class="col-sm-5 col-sm-offset-0 " > 
	
		<div class="form-group">
			<label>Nội dung tuyển dụng </label>
			<textarea name="noidung" rows=5 required class="form-control" readonly>{{$td->noidung}}"</textarea>
		</div>
		
		<div class="form-group">
			<label>Thời gian tuyển dụng </label>
			<input type='date' name="created_at" class="form-control" value="{{$td->created_at}}" readonly  >
		</div>
		
		</div>
		 <div class="col-sm-5  " > 
			<div class="form-group">
			<label>Số lượng đã tuyển dụng (*)</label>
			<input type='text' name="datuyen" class="form-control" value=" " required >
			</div>
			<div class="form-group">
			<label>Số lượng đã tuyển từ TTGTVL tỉnh Quảng Bình (*)</label>
			<input type='text' name="datuyentutt" class="form-control" value=" " required >
			</div>
		</div>
		<div class="col-sm-2  " > 
			<div class="form-group">
			<br>
			<button type="submit" class="btn btn-warning" > Báo cáo </button>
			</div>
			
		</div>
	</div>
	
	</fieldset>
		
	<input type="hidden" name="id" value="{{$td->id}}">
	</form>
                       
 </section>					
	
@endsection