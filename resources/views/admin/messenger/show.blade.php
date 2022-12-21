
@extends ('admin.layout')

@section('content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>{{ $thread->subject }}</h3>
    </div>
	<div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
       <button  class="btn" > <i class="fa fa-undo"> <a href="{{URL::to('admessages')}}">Trở về </a></i></button>
 
      <button class="btn"><i class="fa fa-plus"> <a href="{{URL::to('admessages')}}/create"> Tạo tin nhắn mới  </a></i></button>
      </div>
      <div class="col-sm-4">
	  <br>
		<br>
		<br>
		<?php if($thread->attach){ ?>	
				<a href="../storage/app/{{$thread->attach}}" download class="text-lg"> <i class="fa fa-file"></i> Tải File đính kèm </a>
			<?php } ?>	
      </div>
      <div class="col-sm-3">
        
      </div>
    </div>

<div class="panel-body">
    <div class="col-md-8">
       
        @each('admin.messenger.partials.messages', $thread->messages, 'message')

        @include('admin.messenger.partials.form-message')
    </div>
</div>
</div>
</div>
@stop
