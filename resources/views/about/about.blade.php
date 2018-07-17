@extends('layouts.app')


@section('content')

    <div class="container-fluid">
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">ABOUT</h2>
                <div class="row">
                    <div class="col-6">
                        <h3 class="display-4 font-weight-bold">KASHIKARI</h3>
                        <p class="my-2">Kasu & Kariru</p>
                        <p>Platform where you can exchange goods.</p>
                        <p>You can also form the community to include user who has a similar taste.</p>
                    </div>
                    <div class="col-6">
                        <img src="/images/borrow.jpg" class="img-thumbnail" alt="borrow">
                        
                    </div>
                </div>
            
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">WHAT YOU CAN DO</h2>
                <div class="row">
                    <div class="col-4 text-center">
                        <i class="fas fa-10x fa-hand-holding-heart fa-border"></i> 
                        <p class="font-weight-bold text-center my-3">BORROW</p>
                        <p class="text-center my-3">Post what you need.<br>Find shared items and borrow it!</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-10x fa-people-carry fa-border"></i>
                        <p class="font-weight-bold text-center my-3">LEND</p>
                        <p class="text-center my-3">Post items you don't need.<br>Find people who need something.</p>
                    </div>
                    <div class="col-4 text-center">
                        <i class="fas fa-10x fa-comments fa-border"></i>
                        <p class="font-weight-bold text-center my-3">COMMUNICATE</p>
                        <p class="text-center my-3">Create or join group.<br>Chat each other and users who have a similar taste.</p>
                    </div>
                </div>
        </div>
        <div class="colored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">SHARED ITEMS</h2>
            <div class="row ml-3">
                  <div class="card-deck">
                        <div class="card shadow">
                            <img class="card-img-top" src="/images/vr.jpg" alt="items photo">
                            <div class="card-body">
                                <h5 class="card-title">VR
                                    <span class="badge badge-pill badge-success">Open</span>
                                </h5>
                                <p class="">
                                    <span class="text-muted">by Takumi</span>
                                </p>
                                <p class="card-text text-justify">You can experience VR!</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i> $50</p>
                                <button class="borrow btn btn-primary btn-block">Borrow it</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img class="card-img-top" src="/images/dress.jpg" alt="items photo">
                            <div class="card-body">
                                <h5 class="card-title">Dress
                                    <span class="badge badge-pill badge-success">Open</span>
                                </h5>
                                <p class="">
                                    <span class="text-muted">by Beth</span>
                                </p>
                                <p class="card-text text-justify">You can wear it at the formal party.</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i>$30</p>
                                <button class="borrow btn btn-primary btn-block">Borrow it</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img class="card-img-top" src="/images/soccerball.jpg" alt="items photo">
                            <div class="card-body">
                                <h5 class="card-title">Soccer Ball
                                    <span class="badge badge-pill badge-success">Open</span>
                                </h5>
                                <p class="">
                                    <span class="text-muted">by Manato.F</span>
                                </p>
                                <p class="card-text text-justify">10px with basket</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i> $5</p>
                                <button class="borrow btn btn-primary btn-block">Borrow it</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <img class="card-img-top" src="/images/table.jpg" alt="items photo">
                            <div class="card-body">
                                <h5 class="card-title">Dining Table
                                    <span class="badge badge-pill badge-danger">Booked</span>
                                </h5>
                                <p class="">
                                    <span class="text-muted">by Saaya</span>
                                </p>
                                <p class="card-text text-justify">1 table and 2 chairs. You can use it both inside and outside.</p>
                                <hr>
                                <p class="card-text"><i class="fas fa-gift text-secondary"></i> $30</p>
                                <button class="borrow btn btn-primary btn-block">Borrow it</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="uncolored content p-5">
            <h2 class="display-2 text-secondary font-weight-bold mb-5">VOICE</h2>
                <div class="row my-3">
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            Excellent communication, absolutely lovely people, amazing gimbal and an incredibly smooth process!
                        </p>    
                    </div>
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            Brilliant guy and very easy to deal with. Great kit and really easy to collect and return equipment.
                        </p> 
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                    <div class="col-4 box1">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                    <div class="col-4 box2">
                        <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                        <p class="m-3">
                            This is my second rental with Antonio - great equipment, great price and brilliant service!
                        </p>    
                    </div>
                </div>
            <p></p>
        <div class="text-center my-5">
            <a class="button1 shadow-lg" href="{{ route('register') }}">Sign Up Now</a>
        </div>
    </div>
</div>

@endsection