
@extends ('main')
@section('content')


<div class="clear" style="clear:both;"></div>

<section class="panel">
<div class="row ">	
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Xem tin tuyển dụng</h3>
                    </div>

  </div>
                <div class="card-body">
 				
	<form role="form" method="POST" action="{{URL::to('tuyendung-fru')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
  
	  <div class="row">

		<legend>Thông tin chung</legend> 
	    <div class="col-sm-6 col-sm-offset-0 " > 
			<div class="form-group">
				<label>Nội dung tuyển dụng </label>
				<textarea name="noidung" rows=10 required class="form-control" readonly>{{$td->noidung}}"</textarea>
			</div>
		</div>
		
		<div class="col-sm-6" > 
			<div class="form-group">
			<label>Thời gian tuyển dụng </label>
			<input type='date' name="created_at" class="form-control" value="{{$td->created_at}}"   >
		</div>
			<div class="form-group">
			<label>Số lượng đã tuyển dụng (*)</label>
			<input type='text' name="datuyen" class="form-control" value=" " required >
			</div>
			<div class="form-group">
			<label>Số lượng đã tuyển từ TTGTVL tỉnh Quảng Bình (*)</label>
			<input type='text' name="datuyentutt" class="form-control" value=" " required >
			</div>
		</div>
		<div class="col-sm-12"  > 
			<button style="text-align: center;margin-left: 48%" type="submit" class="btn btn-warning" > Báo cáo </button>
		</div>
	</div>

	<input  type="hidden" name="id" value="{{$td->id}}">
	</form>
</div>
</div>
</div>   
                
 </section>					
	
@endsection