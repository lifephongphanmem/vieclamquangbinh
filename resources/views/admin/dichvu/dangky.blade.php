
@extends ('admin.layout')

@section ('content')
 

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Dịch vụ
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên</th>
            <th>Ngày Đăng Ký</th>
            
            <th style="width:30px;"> Hoạt động</th>
          </tr>
        </thead>
        <tbody>
     <?php if(count($dks)){
			
				
			foreach ($dks as $dk) {     
			
			?>
		  <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><a href="{{URL::to('dichvu-be').'/'.$dv->id}}">{{$dk->company->name}}</a></td>
            <td><span class="text-ellipsis">{{$dk->created_at }} </span></td>
			<td>
				
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
	     Tổng cộng {{$dks->total()}}  kết quả 
		{!! $dks->links('pagination::bootstrap-4') !!}
      </div>
      </div>
    </footer>
  </div>
</div>

@endsection