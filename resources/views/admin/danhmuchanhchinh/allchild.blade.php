
@extends ('admin.layout')

@section ('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
	{{$p->name}}
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-3 m-b-xs">
    
      </div>
      <div class="col-sm-4">
	  
      </div>
      <div class="col-sm-5">
     
      <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('dmhc-bnc/'.$p->maquocgia)}}"> Tạo danh mục con mới  </a></i></button>
      <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('dmhc-ba')}}">Trở về </a></i></button>

	 </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>            
			<th>STT</th>
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