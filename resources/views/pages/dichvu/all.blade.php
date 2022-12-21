
@extends ('pages.layout')

@section ('mainpanel')
 
	<h3> Danh sách dịch vụ</h3> </div>

<form class="form-inline" method="GET">
<div class="row ">	
	
	<div class="col-sm-3 ">
		<div class="function-search pull-right">
		<div class="input-group">
			 
		</div>
		</div>
	</div>
</div>
</form>
<div class="row ">	
<div class="col-sm-8 col-sm-offset-2">

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th width="5%">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th width="20%">Tên</th>
            <th width="50%">Mô tả</th>
            <th width="20%">Đăng Ký</th>
            
          </tr>
        </thead>
        <tbody>
     <?php if(count($dvs)){
			
				
			foreach ($dvs as $dv) {     
			
			?>
		  <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$dv->name}} </td>
            <td><span class="text-ellipsis">{{$dv->description }} </span></td>
             <td>
			<?php	if($dv->checkdk){ echo "Đã đăng ký"; } else { ?>
			  <a href="{{URL::to('dichvu-fr').'/'.$dv->id}}"  onclick="return confirm('Bạn muốn đăng ký dịch vụ?');"><i class="fa fa-check text-success text"></i> Đăng ký</a>
            <?php } ?>
			</td>
          </tr>
		  
	 <?php 
			} 
	 } 
	 ?>
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
       
       <div class="d-flex justify-content-center">
	     Tổng cộng {{$dvs->total()}}  kết quả 
		{!! $dvs->links('pagination::bootstrap-4') !!}
      </div>
      </div>
    </footer>
  </div>
</div>

@endsection