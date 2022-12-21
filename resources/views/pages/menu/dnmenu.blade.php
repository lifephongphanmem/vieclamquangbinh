

@section('top-menu')
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-right">
				<li  class="{{ (request()->is('doanhnghiep*')) ? 'active' : '' }}"><a href="{{URL::to('doanhnghieppanel')}}"><i class="fa fa-home"></i> Thông tin doanh nghiệp</a></li>
				<li class=" dropdown {{ (request()->is('laodong*')) ? 'active':""}} {{ (request()->is('report*')) ? 'active':""}}">
					<a href="#"  data-toggle="dropdown" class="dropdown-toggle " ><i class="fa fa-star"></i> Khai báo biến động định kỳ <span class="caret"></span> </a>
					<ul class="dropdown-menu">
												
						<li><a href="{{URL::to('laodong-fn')}}"><i class="fa fa-plus"></i> Báo tăng</a></li>								
						<li><a href="{{URL::to('laodong-fa').'/delete'}}"><i class="fa fa-minus"></i> Báo giảm</a></li>								
						<li><a href="{{URL::to('laodong-fa').'/tamdung'}}"><i class="fa fa-pause"></i> Tạm dừng</a></li>								
						<li><a href="{{URL::to('laodong-fa').'/kethuctamdung'}}"><i class="fa fa-undo"></i> Kết thúc tạm dừng</a></li>								
						<li><a href="{{URL::to('laodong-fa').'/update'}}"><i class="fa fa-user"></i> Thay đổi thông tin</a></li>								
						<li><a href="{{URL::to('laodong-fnothing')}}" onclick="return confirm('Doanh nghiệp không có biến động trong kỳ?');"><i class="fa fa-stop"></i> Báo không có biến động</a></li>								
						<li><a href="{{URL::to('report-fa')}}"><i class="fa fa-clock-o"></i> Lịch sử biến động</a></li>									
					</ul>
				</li>
				<li class="dropdown {{ (request()->is('tuyendung*')) ? 'active':""}}">
					<a href="#"  data-toggle="dropdown" class="dropdown-toggle" ><i class="fa fa-star"></i> Tuyển dụng  <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{URL::to('tuyendung-fn')}}"><i class="fa fa-plus"></i> Đăng tuyển dụng </a></li>
						<li><a href="{{URL::to('tuyendung-fa')}}"><i class="fa fa-clock-o "></i> Lịch sử tuyển dụng </a></li>
					</ul>
				</li>
				<li class="dropdown  {{ (request()->is('messages*')) ? 'active' :''}}" >
					<a href="#" data-toggle="dropdown" class="dropdown-toggle " ><i class="fa fa-star"></i> Gửi/Nhận văn bản @include('pages.messenger.unread-count')  <span class="caret"></span></a>
					
					<ul class="dropdown-menu">
							<li><a href="{{URL::to('messages')}}/"><i class="fa fa-file-text-o"></i> Văn bản đã lưu trữ </a></li>
							<li><a href="{{URL::to('messages')}}/create"><i class="fa fa-upload"></i> Gửi văn bản</a></li>
					</ul>
						
				</li>
			</ul>
		</div>
	</nav>
@endsection				