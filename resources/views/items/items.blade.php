@if ($items)
    <div class="row">
@foreach ($items as $item)
    <?php $user = $item->user; ?>
       <div class= "col-xl-3 col-md-4 col-6">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">{{ $item->date }}</span>
            </div>
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{!! nl2br(e($item->photo)) !!}" alt="items photo">
                <div class="card-body">
                    <h5 class="card-title">{!! nl2br(e($item->name)) !!}</h5>
                    <p class="card-text">{!! nl2br(e($item->content)) !!}</p>
                 <ul class="list-group list-group-flush">
                    <li class="list-group-item">Reward: {!! nl2br(e($item->reward)) !!}</li>
                    <li class="list-group-item">{!! nl2br(e($item->status)) !!}</li>
                 </ul>
                  {!! link_to_route('items.show', "Detail", ['id' => $item->id]) !!}
                </div>
           </div>    
            
            
        </div>
    </li>
@endforeach
</ul>
{!! $items->render() !!}
@endif

   
              
            
    