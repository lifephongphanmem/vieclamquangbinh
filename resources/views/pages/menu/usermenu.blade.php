

@section('user-menu')
							<ul class="nav nav-pills pull-right">	
								<li><a href="{{URL::to('#')}}">
									{{-- <span> Xin chào  {{Auth::user()->name}}</span> --}}
									<span> Xin chào  {{session('admin')->tendv}}</span>
								</a></li>
								<li><a href="{{URL::to('user-fe')}}"><i class="fa fa-info"></i> Thông tin cá nhân</a></li>
								<li><a href="{{URL::to('logout')}}"><i class="fa fa-lock"></i>Đăng xuất</a></li>
							</ul>
		
@endsection				