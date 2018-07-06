<ul class="media-list">
@foreach ($items as $item)
    <?php $user = $item->user; ?>
    <li class="media">
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $item->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($item->name)) !!}</p>
                <p>{!! nl2br(e($item->content)) !!}</p>
                <p>{!! nl2br(e($item->status)) !!}</p>
                <p>{!! nl2br(e($item->reward)) !!}</p>
                <p>{!! nl2br(e($item->photo)) !!}</p>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $items->render() !!}