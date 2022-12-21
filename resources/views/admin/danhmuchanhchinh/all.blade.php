
@extends ('admin.layout')

@section ('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh mục hành chính
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
    
      </div>
      <div class="col-sm-5">
	     </div>
      <div class="col-sm-2">         
     	<form class="form-inline" method="POST" action="{{URL::to('dmhc-bi')}} " enctype= 'multipart/form-data'>
	  <label  class="btn btn-default"> Import File
	   <input type="file" name="import_file" onchange="this.form.submit()" style="display:none;">
		 {{ csrf_field() }}
	   </label>
	  
	   </form> 
	   
	 </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>            
			<th>Id</th>
            <th>Tên</th> 
            <th>Cấp</th>
            <th>Mã quốc gia</th>
            <th>Danh mục con</th>
            <th></th>
           
          </tr>
        </thead>
        <tbody>
     <?php 
		$i=0;
		foreach ($cats as $cat)
				
				{ $i++;
			?>
		  <tr>
            <td>
			{{$i}}
			</td>           
		   <td>
			 <a href="{{URL::to('dmhc-be').'/'.$cat->id}}" >{{$cat->name}}</a>
			</td>
			
            <td><span class="text-ellipsis">{{$cat->level}} </span></td>
            <td><span class="text-ellipsis">{{$cat->maquocgia}} </span></td>
            
            <td><span class="text-ellipsis">
			 <a href="{{URL::to('dmhc-bac').'/'.$cat->maquocgia}}" ><button>{{$cat->childs}}  <i class="fa fa-eye"></i></button></a>
			 </span></td>
            <td>
              <a href="{{URL::to('dmhc-bd').'/'.$cat->id}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn muốn xóa danh mục?');"><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
		  
	 <?php 
			} 
	
	 ?>
         
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
       <div class="row">
	
       <div class="d-flex justify-content-center">
	     Tổng cộng {{$cats->total()}}  kết quả 
		{!! $cats->links('pagination::bootstrap-4') !!}
      </div>
    </footer>
  </div>
</div>

@endsection