@extends('layouts.app')


@section('content')

<div class="container my-5">
    <div class="colored content p-5">
        <h2 class="display-2 text-secondary font-weight-bold mb-5 text-center">ABOUT US</h2>
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
        <h3 class="display-4 font-weight-bold">WHAT YOU CAN DO</h3>
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
                <i class="fas fa-10x fa-comments yellow fa-border"></i>
                <p class="font-weight-bold text-center my-3">COMMUNICATE</p>
                <p class="text-center my-3">Create or join group.<br>Chat each other and users who have a similar taste.</p>
            </div>
        </div>
    </div>
    <div class="colored content p-5">
        <h3 class="display-4 font-weight-bold">SHARED ITEMS</h3>
        <div class="row ml-3">
            <div class="card-deck">
                <div class="card shadow">
                    <div class="ribbon_box3">
                        <img class="card-img-top" src="/images/vr.jpg" alt="items photo">
                        <div class="ribbon_area">
                           <span class="ribbon16">Open</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="">
                            <span class="text-muted">by Takumi</span>
                        </p>
                        <p class="card-text text-justify">You can experience VR!</p>
                        <hr>
                        <p class="card-text"><i class="fas fa-gift text-secondary"></i> $50</p>
                        <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="ribbon_box3">
                        <img class="card-img-top" src="/images/dress.jpg" alt="items photo">
                        <div class="ribbon_area">
                           <span class="ribbon16">Open</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="">
                            <span class="text-muted">by Beth</span>
                        </p>
                        <p class="card-text text-justify">You can wear it at the formal party.</p>
                        <hr>
                        <p class="card-text"><i class="fas fa-gift text-secondary"></i>$30</p>
                        <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="ribbon_box3 filter">
                        <img class="card-img-top close" src="/images/soccerball.jpg" alt="items photo">
                        <div class="ribbon_area">
                           <span class="ribbon17">closed</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="">
                            <span class="text-muted">by Manato.F</span>
                        </p>
                        <p class="card-text text-justify">10px with basket</p>
                        <hr>
                        <p class="card-text"><i class="fas fa-gift text-secondary"></i> $5</p>
                        <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="ribbon_box3">
                        <img class="card-img-top" src="/images/table.jpg" alt="items photo">
                        <div class="ribbon_area">
                           <span class="ribbon16">Open</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="">
                            <span class="text-muted">by Saaya</span>
                        </p>
                        <p class="card-text text-justify">1 table and 2 chairs. You can use it both inside and outside.</p>
                        <hr>
                        <p class="card-text"><i class="fas fa-gift text-secondary"></i> $30</p>
                        <button class="borrow btn btn-blue btn-block" style="pointer-events: none;">Borrow it</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uncolored content p-5">
        <h3 class="display-4 font-weight-bold">VOICE</h3>
        <div class="row my-3">
            <div class="col-4 box1">
                <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>JUN</h3>
                <p class="m-3">
                    I borrowed laptop on KASHIKARI for the first time. They have a variety of products to borrow and users are very kind.
                </p>    
            </div>
            <div class="col-4 box2">
                <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>ERIKA</h3>
                <p class="m-3">
                    This page is wonderful! I could find easily what I want to need and communicate with users.
                </p>    
            </div>
            <div class="col-4 box1">
                <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>TAKUMI</h3>
                <p class="m-3">
                    This is my second rental on KASHIKARI - great equipment, great price and brilliant service!
                </p> 
            </div>
        </div>
        <div class="row my-3">
            <div class="col-4 box2">
                <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>MANATEE</h3>
                <p class="m-3">
                    Excellent communication, absolutely lovely users, amazing gimbal and an incredibly smooth process!
                </p>    
            </div>
            <div class="col-4 box1">
                <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>SAAYA</h3>
                <p class="m-3">
                    It is easy to find what I want to borrow. I will use KASHIKARI for next time!!
                </p>    
            </div>
            <div class="col-4 box2">
                <h3 class="font-weight-bold m-3"><i class="fas fa-user-circle fa-2x text-muted mr-3"></i>MAHO</h3>
                <p class="m-3">
                    I borrowed coffee machine in coffee lovers group! I can not only borrow goods but also meet great people.
                </p>    
            </div>
        </div>
    </div>
    <div class="colored content p-5">
        <h3 class="display-4 font-weight-bold">LICENSE</h3>
        <div class="row my-3">
            <div class="col-10 offset-1">
                <p>Kashikari is developed with...</p>
                <ul>
                    <li><a href="///laravel.com">Laravel</a></li>
                    <li><a href="///getbootstrap.com">Bootstrap</a></li>
                    <li><a href="///unsplash.com">Unsplash</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection