
@if ($items)
    <div class="row">
        <a href="items/create" class="btn btn-secondary btn-lg btn-block" role="button">Create！</a>
@foreach ($items as $item)
    <?php $user = $item->user; ?>
       <div class= "col-xl-3 col-md-4 col-6">
            <div class="card" style="width: 30rem;">
                <div class="card-header"> 
                    <img src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt="" class="rounded-circle" style=" margin-right:10px; margin-top:25px;  border-radius: 20px;">
                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">{{ $item->date }}</span>
                </div>
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
@endforeach
</div>
{!! $items->render() !!}
@endif

   
              
            
    