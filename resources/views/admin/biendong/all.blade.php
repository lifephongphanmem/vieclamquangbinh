
@extends ('admin.layout')

@section ('content')
 

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh sách lao động biến động
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-2 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Huyện thị</option>
          <option value="1">Đồng Hới</option>
          <option value="2">Quảng Trạch</option>
          <option value="3">Bố Trạch</option>
        </select>
	</div>
	<div class="col-sm-2 m-b-xs">
		 <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Ngành nghề</option>
          <option value="1">Du lịch</option>
          <option value="2">May mặc</option>
          <option value="3">Xây dựng</option>
        </select>
		</div>
	
	<div class="col-sm-2 m-b-xs">
			<select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Kỳ hiện tại</option>
          <option value="1">Kỳ trước</option>
          <option value="2">Trong năm</option>
          
        </select>          
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Tìm theo doanh nghiệp">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
			<th> STT </th>          
            <th>Loại</th>
            <th>Doanh nghiệp</th>
            <th>Khu vực</th>
            <th>Ngành nghề</th>
            <th>Số lượng</th>
            <th>Ngày khai báo</th>
            
          </tr>
        </thead>
        <tbody>
    
		  <tr>
          <td> 1</td>
		    <td>Tăng lao động </td>
			<td>Công ty TNHH ABCD</td>
			<td><span class="text-ellipsis"> Đồng Hới </span></td>
			<td><span class="text-ellipsis"> Du Lịch </span></td>
			<td><span class="text-ellipsis"> 6  </span></td>
			<td><span class="text-ellipsis"> 15/09/2021 </span></td>
			 
          </tr>
		  <tr>
		  <td> 2</td>
		    <td>Giảm lao động </td>
			<td>Công ty TNHH ABCD</td>
			<td><span class="text-ellipsis"> Đồng Hới </span></td>
			<td><span class="text-ellipsis"> Du Lịch </span></td>
			<td><span class="text-ellipsis"> 2  </span></td>
			<td><span class="text-ellipsis"> 10/09/2021 </span></td>
			 
          </tr>
		   <tr>
		  <td> 3</td>
		    <td>Tăng </td>
			<td>Công ty CP XYZ </td>
			<td><span class="text-ellipsis"> Quảng Trạch </span></td>
			<td><span class="text-ellipsis"> Xây Dựng </span></td>
			<td><span class="text-ellipsis"> 10  </span></td>
			<td><span class="text-ellipsis"> 5/09/2021 </span></td>
			 
          </tr>
		  <td> 4</td>
		    <td>Thay đổi thông tin lao động </td>
			<td>Công ty TNHH ABCD</td>
			<td><span class="text-ellipsis"> Đồng Hới </span></td>
			<td><span class="text-ellipsis"> Du Lịch </span></td>
			<td><span class="text-ellipsis"> 1  </span></td>
			<td><span class="text-ellipsis"> 1/09/2021 </span></td>
			 
          </tr>

         
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