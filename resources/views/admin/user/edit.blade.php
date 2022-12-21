@extends ('admin.layout')

@section ('content')
 

			<section class="panel">
                        <header class="panel-heading">
                           Cập nhật người dùng
                        </header>
			<div class="row w3-res-tb">
		  <div class="col-sm-3 m-b-xs">
			
					  </div>
		  <div class="col-sm-4">
		  </div>
		  <div class="col-sm-5">
			<button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('user-bn')}}"> Tạo mới  </a></i></button>
		   <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('user-ba')}}">Trở về </a></i></button>

											

		  </div>
		</div>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" method="POST" action="{{URL::to('user-bu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Họ Tên </label>
									<input type="text" name ="name" class="form-control" required value="{{$user->name}}" >
									
								</div>
								<div class="form-group">
									<label > Email </label>

										<input type="email" name ="email" class="form-control" required  value="{{$user->email}}">
								
								</div>
								<div class="form-group">
									<label >Mật khẩu </label>

										<input class="form-control" type="password" id="password" name="password" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất 1 chữ viết hoa, 1 chữ số, 1 chữ thường và nhiều hơn 8 ký tự" >
								
								</div>
								<div class="form-group">
									<label >Xác nhận mật khẩu</label>
										<input  class="form-control" type="password" name ="confirm_password" id ="confirm_password" onkeyup='check();' >
										<span id='message'></span>
								</div>
								
								
								<div class="form-group">
									<label >Hoạt động</label>
										<select class="form-control input-sm m-bot5" name ="public" >
											<option value='1' <?php  if($user->public){echo 'selected';} ?> >Có</option>
											<option value='0' <?php  if(!$user->public){echo 'selected';} ?>>Không</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Loại người dùng</label>
										<select class="form-control input-sm m-bot5" name ="level" >
											<option value='2' <?php if($user->level==2){echo "selected";}?> >Quản trị</option>
											<option value='3' <?php if($user->level==3){echo "selected";}?>>Doanh nghiệp</option>
											
										</select>
								</div>
								<div class="form-group">
									<label >Nhóm</label>
										<select class="form-control input-sm m-bot5" name ="category" >
											 <?php foreach ($cats as $cat){ ?>
												  <option value="{{$cat->id}}" <?php if($user->category==$cat->id){echo "selected";}?> >{{$cat->name}}</option>
											  <?php } ?>
																			</select>
								</div>
                          
								<input type='hidden' name='id' value="{{$user->id}}">
								
                                <button type="submit" class="btn btn-info">Cập nhật người dùng</button>
                            </form>
                            </div>

                        </div>
                    </section>
					<script> 
					var check = function() {
							  if (document.getElementById('password').value ==
								document.getElementById('confirm_password').value) {
								document.getElementById('message').style.color = 'green';
								document.getElementById('message').innerHTML = '';
							  } else {
								document.getElementById('message').style.color = 'red';
								document.getElementById('message').innerHTML = 'Không trùng';
							  }
							}
					</script>
				
@endsection