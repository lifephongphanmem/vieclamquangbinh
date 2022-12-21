<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>
<tr>
	<td>
		{{$key +1 }}
	</td>
	<td>
		<div class="media alert {{ $class }}">
					
				<h4 class="media-heading">
					<a href="{{URL::to('messages').'/'. $thread->id}}">{{ $thread->subject }}</a>
				</h4>
		</div>
	</td>
	<td>
		<div class="media alert {{ $class }}">
								
				<p>
					{{ $thread->latestMessage->body }}
				</p>
		</div>
	</td>
	<td>
		<div class="media alert {{ $class }}">
			<?php if($thread->attach){ ?>	
				<a href="../storage/app/{{$thread->attach}}" download> Tải File đính kèm </a>
			<?php } ?>	
		</div>
	</td>
	<td>
		<div class="media alert {{ $class }}">
				
				<p>
					<small><strong>Người gửi:</strong> {{ $thread->creator()->name }}</small>
				</p>
				
		</div>
	</td>
</tr>