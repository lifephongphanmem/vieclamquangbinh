<?php $class = $thread->isUnread(session('admin')->id) ? 'alert-info' : ''; ?>
<tr style="font-size: 25px">
	<td>
	
		{{$key +1 }}
	</td>
	<td>
		<div class=" {{ $class }}">
					
				<p class="media-heading">
					<a href="{{URL::to('messages').'/'. $thread->id}}">{{ $thread->subject }}</a>
				</p>
		</div>
	</td>
	<td>
		<div class=" {{ $class }}">
								
				<p>
						<?php if (isset($thread->latestMessage->body)) print_r ($thread->latestMessage->body); ?> 
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
					{{ $thread->creator()->name }}
				</p>
				
		</div>
	</td>
</tr>