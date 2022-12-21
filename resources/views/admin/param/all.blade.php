
@extends ('admin.layout')

@section ('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
	Giá trị tham số: <span>{{$catname}} </span>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
      <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('param-bn'.'/'.$catid)}}"> Tạo mới  </a></i></button>
       <button   class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('ptype-ba')}}">Trở về </a></i></button>

										
	  </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
       
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <i>STT</i>
              </label>
            </th>
			
            <th>Giá trị tham số</th> 
            <th>Miêu tả</th>
			<th>Id</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
     <?php
		$i=0;
		foreach ($params as $param)
				
				{ $i++;
			?>
		  <tr>
            <td>{{$i}}</label></td>
			          
		   <td>
			 <a href="{{URL::to('param-be').'/'.$param->id}}" >{{$param->name}}</a>
			</td>
			
            <td><span class="text-ellipsis">{{$param->description}} </span></td>
			<td>
			{{$param->id}}
			</td> 		
			<td>
              <a href="{{URL::to('param-bd').'/'.$param->id}}" class="active" ui-toggle-class="" onclick="return confirm('Cảnh báo ! Bạn muốn xóa giá trị?');"><i class="fa fa-times text-danger text"></i></a>
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
        
      </div>
    </footer>
  </div>
</div>

@endsection