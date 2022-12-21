@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                            Thêm doanh nghiệp mới
                        </header>
                        <div class="panel-body">
						  <form role="form" method="POST" action="# " enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							<div class="row">
							<div class="col-sm-6 col-sm-offset-1">
                              
							   <table cellspacing='5'>
			<tr>
				<td>Mã số doanh nghiệp </td>
				<td>
					<input type="text" size=2 value=44 readonly>
				<input type="text" size=3  >
				<input type="text" size=5  >
				<input type="text" size=6  >
				</td>
			</tr>
			<tr>
				<td>Tên doanh nghiệp</td>
				<td><input type="text" size=30 ></td>
			</tr>
			<tr>
				<td>Mã số DKKD</td>
				<td><input type="text" size=30 ></td>
			</tr>
			<tr>
				<td>Tình trạng hoạt động</td>
				<td>	
				Hoạt động <input type='radio' value='1' name= 'active' checked> 
				Dừng <input type='radio' value='0' name= 'active' >
				</td>
			</tr>
			<tr>
				<td>Số điện thoại </td>
				<td><input type="text" size=30 ></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><input type="text" size=30> </td>
			</tr>
			<tr>
				<td>Website</td>
				<td><input type="text" size=30> </td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" size=30> </td>
			</tr>
			<tr>
				<td>Tỉnh</td>
				<td><input type="text" size=30 value="Quảng Bình" readonly></td>
			</tr>
			<tr>
				<td>Huyện/Thị xã/Thành phố </td>
				<td><select class="form-control input-sm m-bot5" name ="public" >
						<option value='1' selected >Đồng Hới</option>
						<option value='0'>Quảng Trạch</option>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>Xã/Phường</td>
				<td>
				<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' selected >Đức Ninh</option>
											<option value='0'>Đồng Hải</option>
											
				</select>	
				Thành thị <input type='radio' value='1' name= 'kv' checked> 
				Nông thôn <input type='radio' value='0' name= 'kv' >
											</td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td><input type="text" size=30 > </td>
			</tr>
			<tr>
				<td>Khu công nghiệp</td>
				<td><select class="form-control input-sm m-bot5" name ="public" >
					<option value='0' selected >Chọn KCN</option>
					<option value='1' >Tây bắc Đồng Hới</option>
					
					
				</select>
				</td>
			</tr>
			<tr>
				<td>Loại hình doanh nghiệp</td>
				<td><input type="text" size=30 > </td>
			</tr>
			<tr>
				<td>Ngành nghề</td>
				<td> <input type="text" size=30 > </td>
			</tr>
			<tr>
				<td>Hình ảnh giấy phép DKKD </td>
				<td> <input type="file" size=30 > </td>
			</tr>
			
		</table>	
			
		
							</div>
							<div class="col-sm-3">
							
								<div class="form-group">
									<label >Email</label>
										<input type="email" name ="name" class="form-control" required >						
								</div>
								<div class="form-group">
									<label >Mật khẩu đăng nhập hệ thống</label>
									<input type="password" name ="name" class="form-control" required >						
								</div>	
                                <div class="form-group">
									<label >Xác nhận lại mật khẩu</label>
									<input type="password" name ="name" class="form-control" required >						
								</div>	
								<input type="hidden" name="isnew" value= '1'>
								<input type="hidden" name="id" value= '0'>
								
                                <button type="submit" class="btn btn-info">Thêm công ty</button>
                            
                            </div>
</form>
                        </div>
                    </section>
				
@endsection