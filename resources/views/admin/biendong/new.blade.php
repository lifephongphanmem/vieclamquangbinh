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
							<div class="col-sm-4 col-sm-offset-2">
                              
							   <div class="form-group">
									<label >Tên</label>

										<input type="text" name ="name" class="form-control" required >
								
								</div>
								<div class="form-group">
									<label >Mã số DKKD</label>

										<input type="text" name ="name" class="form-control" required >
								
								</div>
								<div class="form-group">
									<label >Hoạt động</label>
										<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' selected >Có</option>
											<option value='0'>Không</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Số Điện thoại</label>
										<input type="text" name ="name" class="form-control" required >						
								</div>	
								<div class="form-group">
									<label >Website</label>
										<input type="text" name ="name" class="form-control" required >						
								</div>	
								
								
								<div class="form-group">
									<label >Ngành nghề hoạt động</label>
										<select class="form-control input-sm m-bot15" name ="parent" >
											<option value='0' selected >Du lịch</option>
											<option value='0'  >Xây dựng</option>
											<option value='0'  >Kinh doanh thương mại</option>
											<option value='0'  >Thủy sản</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Địa chỉ</label>
										<input type="text" name ="name" class="form-control" required >						
								</div>
								<div class="form-group">
									<label >Huyện Thị</label>
										<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' selected >Đồng Hới</option>
											<option value='0'>Quảng Trạch</option>
											
										</select>					
								</div>
								
								<div class="form-group">
									<label >Phường xã</label>
										<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' selected >Đức Ninh</option>
											<option value='0'>Đồng Hải</option>
											
										</select>					
								</div>
								<div class="form-group">
                                    <label for="exampleInputFile">Hình ảnh giấy DKKD </label>
                                    <input type="file" id="catImage" name ="image">
                                    
                                </div>
							</div>
							<div class="col-sm-4">
							
								<div class="form-group">
									<label >Email</label>
										<input type="email" name ="name" class="form-control" required >						
								</div>
								<div class="form-group">
									<label >Mật khẩu đăng nhập hệ thống</label>
										<input type="text" name ="name" class="form-control" required >						
								</div>	
                                
								<input type="hidden" name="isnew" value= '1'>
								<input type="hidden" name="id" value= '0'>
								
                                <button type="submit" class="btn btn-info">Thêm công ty</button>
                            
                            </div>
</form>
                        </div>
                    </section>
				
@endsection