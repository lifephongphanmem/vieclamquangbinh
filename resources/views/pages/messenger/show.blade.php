@extends('pages.layout')
@section('mainpanel')
<section class="panel">
				<header class="panel-heading">
				<div class="row ">
					<div class="col-sm-8 col-sm-offset-2">                   
					<div>
						<h3>{{ $thread->subject }}</h3>
					</div>
					</div>
				</div>
				</header>
<div class="row ">	
	<div class="col-sm-4 col-sm-offset-2">
        
        @each('pages.messenger.partials.messages', $thread->messages, 'message')
  
    </div>
	<div class="col-sm-4 ">
		<br>
		<br>
		<br>
		<?php if($thread->attach){ ?>	
				<a href="../storage/app/{{$thread->attach}}" download class="text-lg"> <i class="fa fa-file"></i> Tải File đính kèm </a>
			<?php } ?>	
	</div>
</div>
<div class="row ">	
	<div class="col-sm-8 col-sm-offset-2">
	   @include('pages.messenger.partials.form-message')
	</div>
</div>

</section>
@endsection
