

@section('top-menu')

		<div class="top-menu pull-right">
							<ul class="nav navbar-nav  mr-auto">
								<li><a href="{{URL::to('#')}}"><i class="fa fa-star"></i> Thông tin cá nhân</a></li>
								<li><a href="{{URL::to('#')}}"><i class="fa fa-users"></i> Hộ gia đình </a></li>
								<li><a href="{{URL::to('#')}}"><i class="fa fa-star"></i> Thành viên </a></li>
								<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa fa-star"></i>  DS lao động </a>
									<ul class="dropdown-menu">
										<li> <a href="{{URL::to('#')}}">LĐ đủ 15 tuổi </a> </li>
										<li> <a href="{{URL::to('#')}}">LĐ sắp tốt nghiệp PTTH </a> </li>
									</ul>							
		
								</li>								
								<li><a href="{{URL::to('#')}}"><i class="fa fa-star"></i> Xuất dữ liệu mẫu A3 </a></li>
								<li><a href="{{URL::to('#')}}"><i class="fa fa-envelope text-danger"> 3 </i> Hộp thư </a></li>
								<li><a href="{{URL::to('#')}}"><i class="fa fa-key"></i> Đổi mật khẩu</a></li>
								<li><a href="{{URL::to('logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
		</div>
@endsection				