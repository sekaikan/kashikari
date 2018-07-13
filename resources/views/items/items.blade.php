@if ($items)
<div class="row">
    <div class="card-columns">
@foreach ($items as $item)
    <?php $user = App\User::find($item->user_id) ?>
        <div class="card shadow">
            <img class="card-img-top" src="{!! $item->photo !!}" alt="items photo">
            <div class="card-body">
                    <h5 class="card-title"><a href="/items/{{$item->id}}" class="text-dark">{!! $item->name !!}</a>
                        @if($item->status == 'open')
                            <span class="badge badge-pill badge-success">{{ $item->status }}</span>
                        @else
                            <span class="badge badge-pill badge-danger">{{ $item->status }}</span>
                        @endif
                    </h5>
                    <p class="">
                        <span class="text-muted">by {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}</span>
                    </p>
                    <p class="card-text text-justify">{!! nl2br(e($item->content)) !!}</p>
                <hr>
                <p class="card-text"><i class="fas fa-gift text-secondary"></i>  {{ $item->reward }}</p>
                {!! link_to_route('items.show', "Details", ['id' => $item->id], ['class'=>'btn btn-primary btn-block']) !!}
            </div>
       </div>    
@endforeach
    </div>
</div>
{!! $items->render() !!}
@endif
