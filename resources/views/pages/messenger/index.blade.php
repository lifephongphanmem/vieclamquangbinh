@extends('pages.layout')
@section('mainpanel')
<section class="panel">
				<header class="panel-heading">
				<div class="row ">
					<div class="col-sm-8 col-sm-offset-2">                   
					<div>
						<h3>Văn bản gần đây</h3>

					</div>
					</div>
				</div>
				</header>
<div class="row ">	
<div class="col-sm-10 col-sm-offset-1">
<div class="clear" style="clear:both;"><h4 class="text-info"> Danh sách Văn bản <i class="fa fa-play"></i></h4> </div>
	 @include('pages.messenger.partials.flash')
	<table  class="table table-striped  table-bordered">
	<thead  >
		<td width="5%"> # </td>
		<td width="20%"> Tiêu đề</td>
		<td width="40%"> Nội dung</td>
		<td width="20%"> File đính kèm</td>
		<td width="15%"> Người gửi</td>
		
	</thead>
	<tbody>   
	
	@each('pages.messenger.partials.thread', $threads, 'thread', 'pages.messenger.partials.no-threads')
	</tbody>
	</table>
</div>
</div>
</section>
@endsection
