

@section('top-menu-bk')
	<div class="user-menu pull-right">
	<ul class="nav pull-right top-menu">
			<li><a href="{{URL::to('#')}}">
				<span> Xin chào  {{Auth::user()->name}}</span>
			</a></li>
			<li><a href="{{URL::to('#')}}"><i class="fa fa-info"></i> Thông tin cá nhân</a></li>
			
       
    </ul>
	</div>
@endsection				