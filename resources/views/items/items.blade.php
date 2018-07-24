@if ($items)
<div class="row mt-4">
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
                    
                    <p class="card-text">by <a href="/users/{{$user->id}}" class="text-dark"> {!! $user->name !!}</a>
                    </p>
                    <?php $url = $_SERVER['REQUEST_URI'];?>
                    @if(strstr($url,'users'))
                        <?php $group = $item->group()->get();?>
                        <p class="card-text"> @ <a href="/group/{{$item->group_id}}" class="text-dark">{!! $group->first()->name !!}</a>
                        </p>
                    @endif
                <hr>
                @if($item->reward != NULL)
                <p class="card-text"><i class="fas fa-gift text-secondary"></i>  {{ $item->reward }}</p>
                @else
                <p class="card-text"><i class="fas fa-gift text-secondary"></i>  Ask me!!</p>
                @endif
                {!! link_to_route('items.show', "Details", ['id' => $item->id], ['class'=>'btn btn-blue btn-block mt-2']) !!}
            </div>
       </div>    
@endforeach
    </div>
</div>
{!! $items->render() !!}
@endif
