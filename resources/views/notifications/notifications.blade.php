<div class="card">
    <div class="card-header">
        Notifications <span class="badge badge-secondary">{{ Auth::user()->notifications()->count() }}</span>
    </div>
    <ul class="list-group list-group-flush">
        <?php $notifications = Auth::user()->notifications()->paginate(5); ?>
        @foreach ($notifications as $notification)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-1">
                        <img src="/images/user1.jpg" class="img-fluid rounded-circle"></img>
                    </div>
                    <div class="col-11">
                        <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->sender_id)->name }}</span> sent you a reply. <span class="badge badge-secondary">New</span></small>
                        <p class="card-text text-muted">
                            {{ $notification->content }}
                        </p>
                    </div>
                </div>
            </li>
        @endforeach
        {!! $notifications->render() !!}
    </ul>
</div>