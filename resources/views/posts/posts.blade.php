<div class="mt-4">
@foreach ($posts as $post)
<?php $user = App\User::find($post->user_id)?>
    <div class="card shadow mt-1">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-2">
                     <img class="usericon ssize" src="{{ $user->photo }}">
                </div>
                <div class="col-md-8 col-8 px-0">
                    @if($post->status==="Emergency")
                        <i class="fas fa-exclamation-triangle"></i>
                    @endif
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}
                    <small> 
                        <span class="text-muted"> at {{ $post->created_at }}</span>
                    </small>
                    
                    <div class="float-right">
                        <?php $url = $_SERVER['REQUEST_URI'];?>
                        @if(strstr($url,'users'))
                            <?php $group = $post->group()->get();?>
                            <p class="card-text"> @ <a href="/group/{{$post->group_id}}" class="">{!! $group->first()->name !!}</a>
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 col-2 text-right">
                        @if (Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                            {!! Form::close() !!}
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 offset-md-2 col-7 offset-2 px-0">
                    <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="col-md-3 col-3 text-right align-self-end">
                    {!! link_to_route('posts.show','', ['id' => $post->id], ['class'=>'fas fa-reply']) !!}
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>



