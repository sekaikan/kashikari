@if (count($groups) > 0)
<div class="row">
                    @foreach ($groups as $group)
                        <div class="card col-4">
                            <div class="card-header text-center"> 
                                    <h3>{!! link_to_route('group.show',  $group->name , ['id' => $group->id]) !!}</h3>
                             </div>
          
                          <?php $image_rand = array(
                                "images/image1.jpg",
                                "images/image2.jpg",
                                "images/image3.jpg", 
                                "images/home1.jpg", 
                              );
                 
                            $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                          ?>

                           <img class="card-img-top" src="{{ secure_asset($image_rand) }}">
                        </div>
                    @endforeach
</div>
{!! $groups->render() !!}
@endif