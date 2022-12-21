
@extends('pages.layout')
@section('mainpanel')

<section id="mainpanel"><!--mainpanel-->
			<div class="row">
				<div class="col-sm-3 col-sm-offset-2">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="{{URL::to('login-user')}}"  id='signin' name='signin' method='POST'>
							{{csrf_field()}}
							<input type="email" name='email' placeholder="Email Address" />
							<input type="password" name='password' placeholder="Mật khẩu" />
							
							<span>
								<input type="checkbox" name='autolog'class="checkbox"> 
								Tự động đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-2 ">
					<center><h2 class="or" >Hoặc</h2><center>
				</div>
				<div class="col-sm-3">
					<div class="signup-form" data-toggle="validator"><!--sign up form-->
						<h2>Đăng ký mới!</h2>
						<form action="{{URL::to('signup')}}" id='signup' name='signup' method= 'POST' >
						{{csrf_field()}}
							
							<div class="form-group required">
							 
								@if ($errors->has('name'))
                                    <span  class="text-danger required">
                                        <i>Tên quá dài</i>
                                    </span>
                              @endif
						
							<input type="text" name='name'  placeholder="Họ Tên  " required />
		
							</div>
							
							<div class="form-group required">
							<input type="text" name='ctyname' placeholder="Tên công ty" required  />
							</div>
							<div class="form-group required">
							@if ($errors->has('dkkd'))
                                    <span  class="text-danger">
                                        <i>Mã số DKKD đã sữ dụng</i>
                                    </span>
                              @endif
								<input type="text" name='dkkd' placeholder="Mã số DKKD (* Không thể thay đổi sau này )" required />
							</div>
							<div class="form-group required">
							@if ($errors->has('email'))
                                    <span  class="text-danger">
                                        <i>Email đã được sữ dụng</i>
                                    </span>
                              @endif
							<input type="email" name='email' placeholder="Email Address (* Không thể thay đổi sau này)" ) required  />
							</div>
							<div class="form-group required">
							@if ($errors->has('password'))
                                    <span class="text-danger">
                                        <i>Mật khẩu chưa trùng khớp</i>
                                    </span>
                              @endif

							<input type="password" name='password'  placeholder="Mật khẩu  " required />
							<input type="password" name='password_confirmation'  placeholder="Xác nhận mật khẩu  " required />
							</div>
							
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		
	</section><!--/mainpanel-->


@endsection