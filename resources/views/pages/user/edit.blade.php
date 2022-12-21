
@extends('pages.layout')
@section('mainpanel')
<div class="row ">	
	<div class="col-sm-10 col-sm-offset-1">  
		<div class="top-menu">
			@include('pages.menu.dnmenu')
			@yield('top-menu') 
		</div>
	</div>
</div>
	
<section class="panel">
<div class="row ">	
	<div class="col-sm-6 col-sm-offset-2">                   
		<div >
		<h3> Thay đổi thông tin cá nhân </h3>
		</div>
	</div>
 </div>                   
 <div class="row w3-res-tb">
  <div class="col-sm-4 col-sm-offset-4">
		  <form role="form" method="POST" action="{{URL::to('user-fu')}}" enctype= 'multipart/form-data'>
									 {{ csrf_field() }}
							  <div class="form-group">
									<label >Họ Tên </label>
									<input type="text" name ="name" class="form-control" required value="{{$user->name}}" >
									
								</div>
								
								<div class="form-group">
									<label >Mật khẩu </label>

										<input class="form-control" type="password" id="password" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất 1 chữ viết hoa, 1 chữ số, 1 chữ thường và nhiều hơn 8 ký tự" >
								
								</div>
								<div class="form-group">
									<label >Xác nhận mật khẩu</label>
										<input  class="form-control" type="password" name ="password_confirmation" id ="password_confirmation"   >
										<span id='message'></span>
								</div>
								<div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
          <br>
								<div class="form-group">
									<label >Hiển thị mật khẩu</label>
										<input type="checkbox" onclick="showpass()">
								</div>
								<input type='hidden' name='id' value="{{$user->id}}">
								
                                <button type="submit" id="submit_btn" class="btn btn-info">Cập nhật người dùng</button>
                            </form>
			</div>

		</div>
	</section>
					<script> 
					$("#password_confirmation").on('keyup', function() {
						  var password = $("#password").val();
						  var confirmPassword = $("#password_confirmation").val();
						  if (password != confirmPassword){
							$("#CheckPasswordMatch").html("Mật khẩu không khớp !").css("color", "red");
							 $("#submit_btn").prop("disabled", true);
						  }else{
							  $("#submit_btn").prop("disabled", false);
							$("#CheckPasswordMatch").html("Mật khẩu trùng khớp !").css("color", "green");
						  }
					 });
					var 	showpass=	function() {
						   x = document.getElementById("password");
						  y = document.getElementById("password_confirmation");
						  if (x.type === "password") {
							x.type = "text";
							y.type = "text";
						  } else {
							x.type = "password";
							y.type = "password";
						  }
						}
					</script>
				
@endsection