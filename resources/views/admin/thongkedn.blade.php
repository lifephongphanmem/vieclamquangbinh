
@extends ('admin.layout')

@section ('content')
 

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Thống kê doanh nghiệp
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
          <option value="0">Xã,phường</option>
          <option value="1">Đồng Hải</option>
          <option value="2">Đồng Phú</option>
          <option value="3">Bảo Ninh</option>
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
          <option value="0">Tình trạng</option>
          <option value="1">Hoạt động</option>
          <option value="2">Tạm dừng</option>
          <option value="3">Giải thể</option>
        </select>
    	</div>
	<div class="col-sm-2 m-b-xs">
			<select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Khai báo trong kỳ</option>
          <option value="1">Đã khai báo</option>
          <option value="2">Chưa khai báo</option>
          
        </select>          
      </div>
      
    </div>
	<div class= "row w3-res-tb">
	<div class="col-sm-10 m-b-xs"> 
		
		<select class="input-sm form-control w-sm inline v-middle" style="width:60%;">
          <option value="0">Chọn biểu mẫu thống kê </option>
          <option value="1"> 1a, 1b CƠ CẤU DOANH  NGHIỆP PHÂN THEO LOẠI HÌNH DOANH NGHIỆP VÀ  QUY MÔ LAO ĐỘNG</option>
          <option value="2"> 2a, 2b SỐ LƯỢNG DOANH NGHIỆP PHÂN THEO NGÀNH KINH TẾ VÀ LOẠI HÌNH DOANH NGHIỆP</option>
      </select>  

		<button class="btn btn-sm btn-default" type="button">Tổng hợp</button>
		<button class="btn btn-sm btn-default" type="button">Xuất Báo cáo</button>
	</div>
	</div>
	
	
  </div>
</div>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Xuất báo cáo 
    </div>
	
    <div class="row w3-res-tb">
      <div class="col-sm-8 m-b-xs">
      <input type="text"   placeholder="Điền MST hoặc Tên"></input><button class="btn btn-sm btn-default" type="button"> Tìm kiếm DN</button>
	</div>
	
    </div>
	<div class= "row w3-res-tb">
	<div class="col-sm-10 m-b-xs"> 
		
		<select class="input-sm form-control w-sm inline v-middle" style="width:60%;">
          <option value="1" selected>Thong tu so 28.2015.TT-BLĐTBXH</option>
          <option value="2">NĐ_145_2020(khai báo sử dụng lao động)</option>
          <option value="3">27-TT-BLDTBXH</option>
      </select>  

		<button class="btn btn-sm btn-default" type="button">Tổng hợp</button>
		<button class="btn btn-sm btn-default" type="button">Xuất Báo cáo</button>
	</div>
	</div>
	
	
  </div>
</div>
@endsection