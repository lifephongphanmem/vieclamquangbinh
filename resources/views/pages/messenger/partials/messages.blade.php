<div class="media">
    <a class="pull-left" href="#">
        <img src="../../storage/app/defaultuser.png"
             alt="{{ $message->user->name }}" width="100" class="img-circle">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $message->user->name }}</h5>
        <p>{{ $message->body }}</p>
        <div class="text-muted">
            <small>Posted {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>