@if ($items)
<div class="row">
    <div class="card-columns">
@foreach ($items as $item)
    <?php $user = App\User::find($item->user_id) ?>
        <div class="card shadow">
            <div class="ribbon_box3">
            <img class="card-img-top" src="{!! $item->photo !!}" alt="items photo">
            <div class="ribbon_area">
                  @if($item->status == 'open')
               <span class="ribbon16">{{ $item->status }}</span>
                  @else
               <span class="ribbon17">{{ $item->status }}</span>
                  @endif
            </div>
            </div>
            <div class="card-body">
                    <h5 class="card-title"><a href="/items/{{$item->id}}" class="text-dark">{!! $item->name !!}</a>
                    </h5>
                    
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
