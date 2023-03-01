{{-- @extends('pages.layout')
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
@endsection --}}
@extends ('main')
@section('custom-style')
    <link rel="stylesheet" type="text/css"
        href="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css') }}" />
    <style>
        .col-md-3 {
            float: left;
        }

        .wrapper {
            margin-top: 0px;
            padding: 0px 15px;
        }
    </style>
@stop

@section('custom-script')
    <script type="text/javascript" src="{{ url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>

    <script src="{{ url('assets/admin/pages/scripts/table-lifesc.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged3.init();
        });
    </script>
@stop
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label text-uppercase">Văn bản gần đây</h3>
                    </div>
                    <div class="card-toolbar">
                        {{-- <a href="{{URL::to('nhankhau-ba') }}" class="btn btn-xs btn-success"><i class="fa fa-file-import"></i> &ensp;Nhận excel</a> --}}
                    </div>

                </div>
                <div class="card-body">

                    <form class="form-inline" method="GET">
                        <div class="row ">

                            <div class="col-sm-3 ">
                                <div class="function-search pull-right">
                                    <div class="input-group">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="sample_3" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
							<td width="5%"> # </td>
							<td width="20%"> Tiêu đề</td>
							<td width="40%"> Nội dung</td>
							<td width="20%"> File đính kèm</td>
							<td width="15%"> Người gửi</td>
                        </thead>
                        <tbody>
							@foreach ($threads as $key=>$thread )

							<?php $class = $thread->isUnread(session('admin')->id) ? 'alert-info' : ''; ?>
							<tr style="font-size: 25px">
								<td>
									{{$key +1 }}
								</td>
								<td>
									<div class=" {{ $class }}">
												
											{{-- <h4 class="media-heading"> --}}
												<a href="{{URL::to('messages').'/'. $thread->id}}">{{ $thread->subject }}</a>
											{{-- </h4> --}}
									</div>
								</td>
								<td>
									<div class=" {{ $class }}">
															
											<p>
												{{ $thread->latestMessage->body }}
											</p>
									</div>
								</td>
								<td>
									<div class=" {{ $class }}">
										<?php if($thread->attach){ ?>	
											<a href="../storage/app/{{$thread->attach}}" download> Tải File đính kèm </a>
										<?php } ?>	
									</div>
								</td>
								<td>
									<div class=" {{ $class }}">
											
											<p>
												<strong>Người gửi:</strong> {{ $thread->creator()->name }}
											</p>
											
									</div>
								</td>
							</tr>
										
							@endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('includes.delete')
@endsection

