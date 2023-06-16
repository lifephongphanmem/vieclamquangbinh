

@section('top-menu')

		{{-- <div class="top-menu pull-right"> --}}
							<ul class="nav navbar-nav" style="display:block">
								<li class="col-md-3"><a href="{{URL::to('employer-ba').'/'.$info->id}}"><i class="fa fa-users"></i> Danh sách lao động DN </a></li>
								<li class="col-md-3"><a href="{{URL::to('report-detail?user='.$info->user.'')}}"><i class="fa fa-star"></i> Biến động DN </a></li>
								<li class="col-md-3"><a href="{{URL::to('tuyendung-ba').'/'.$info->id}}"><i class="fa fa-star"></i> Tuyển dụng </a></li>
								<li class="col-md-3"><a href="{{URL::to('doanhnghiep-br').'/'.$info->id}}"><i class="fa fa-star"></i> Tình hình sử dụng lao động </a></li>
							</ul>
		{{-- </div> --}}
@endsection				