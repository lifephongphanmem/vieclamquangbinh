
@extends ('admin.layout')

@section ('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh mục tham số
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        
      <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('ptype-bn')}}"> Tạo mới  </a></i></button>
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
                <input type="checkbox"><i></i>
              </label>
            </th>
			<th>Id</th>
            <th>Tên</th> 
            <th>Miêu tả</th>
            <th>Giá trị tham số</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
     <?php foreach ($cats as $cat)
				
				{
			?>
		  <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
			<td>
			{{$cat->id}}
			</td>           
		   <td>
			 <a href="{{URL::to('ptype-be').'/'.$cat->id}}" >{{$cat->name}}</a>
			</td>
			
            <td><span class="text-ellipsis">{{$cat->description}} </span></td>
            <td><span class="text-ellipsis"> <a href="{{URL::to('param-ba').'/'.$cat->id}}" > Xem {{$cat->param}} giá trị</a></span></td>
            
            <td>
              <a href="{{URL::to('ptype-bd').'/'.$cat->id}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn muốn xóa danh mục?');"><i class="fa fa-times text-danger text"></i></a>
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
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

@endsection