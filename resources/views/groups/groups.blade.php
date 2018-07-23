@if (count($groups) > 0)
<div class="row">
                    @foreach ($groups as $group)
                       <div class="col-4 mt-3">
                            <div class="card bg-dark text-white">
                                <?php $image_rand = array(
                                    "images/image1.jpg",
                                    "images/image2.jpg",
                                    "images/image3.jpg", 
                                    "images/home1.jpg", 
                                  );
                                $image_rand = $image_rand[mt_rand(0, count($image_rand)-1)];
                                ?>
                                <img class="card-img card-img-home" src="{{ secure_asset($image_rand) }}">
                                <div class="card-img-overlay group-name"> 
                                    {!! $group->name !!}
                                    <p></p>
                                    {!! link_to_route('group.show',  'Go!' , ['id' => $group->id],['class'=>'btn btn-orange btn-block']) !!}
                                </div>
                            </div>
                        </div>   
                    @endforeach
</div>
{!! $groups->render() !!}
@endif






