@if ($items)
<div class="row">
    <div class="card-columns">
@foreach ($items as $item)
    <?php $user = App\User::find($item->user_id) ?>
        <div class="card shadow">
            @if($item->status == 'open')
            <div class="ribbon_box3">
                
            <img class="card-img-top" src="{!! $item->photo !!}" alt="items photo">
            
            <div class="ribbon_area">
               <span class="ribbon16">{{ $item->status }}</span>
            </div>
            </div>
            @else
            <div class="ribbon_box3 filter">
                
            <img class="card-img-top close" src="{!! $item->photo !!}" alt="items photo">
            
            <div class="ribbon_area">
               <span class="ribbon17">{{ $item->status }}</span>
            </div>
            </div>
            @endif
            <div class="card-body">
                    <h5 class="card-title"><a href="/items/{{$item->id}}" class="text-dark">{!! $item->name !!}</a>
                    </h5>
                    
                    <p class="card-text"><a href="/users/{{$user->id}}" class="text-dark">by {!! $user->name !!}</a>
                    </p>
                <hr>
                @if($item->reward != NULL)
                <p class="card-text"><i class="fas fa-gift text-secondary"></i>  {{ $item->reward }}</p>
                @else
                <p class="card-text"><i class="fas fa-gift text-secondary"></i>  Ask me!!</p>
                @endif
                {!! link_to_route('items.show', "Details", ['id' => $item->id], ['class'=>'btn btn-blue btn-block']) !!}
            </div>
       </div>    
@endforeach
    </div>
</div>
{!! $items->render() !!}
@endif
