

@section('function-menu')

		<div class="function-menu pull-right">
			<ul class="nav navbar-nav">
										<li><a href="{{URL::to('laodong-fn')}}"><i class="fa fa-plus"></i> Báo tăng</a></li>								
										<li><a href="{{URL::to('laodong-fa').'/delete'}}"><i class="fa fa-minus"></i> Báo giảm</a></li>								
										<li><a href="{{URL::to('laodong-fa').'/tamdung'}}"><i class="fa fa-pause"></i> Tạm dừng</a></li>								
										<li><a href="{{URL::to('laodong-fa').'/kethuctamdung'}}"><i class="fa fa-undo"></i> Kết thúc tạm dừng</a></li>								
										<li><a href="{{URL::to('laodong-fa').'/update'}}"><i class="fa fa-user"></i> Thay đổi thông tin</a></li>								
										<li><a href="{{URL::to('laodong-fnothing')}}" onclick="return confirm('Doanh nghiệp không có biến động trong kỳ?');"><i class="fa fa-stop"></i> Báo không có biến động</a></li>								
																	
			</ul>
		</div>
@endsection				