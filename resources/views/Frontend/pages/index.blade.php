@extends('Frontend.layout.layout')
@section('content')
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/img/hero.png')}}" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container">
        <div class="my-5 text-center content-heading">
            <h3>Discover NEW Arrivals</h3>
            <p class="mt-3">Recently added shirts!</p>
        </div>

        <div class="row">
            @foreach($products as $row)
            <div class="col-md-3">
                <a href="{{url('product_detail')}}/{{$row->id}}" class="card product-list">
                    <img src="{{asset($row->product_photo)}}" alt="" class="img-fluid">

                    <div class="card-body">
                        <h5 class="card-title">{{$row->product_name}}</h5>
                        <p class="card-text price">$ {{number_format($row->product_price)}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <img src="{{asset('assets/img/ic_1.png')}}" alt="">
                </div>
                <div class="tagline-prod">
                    <h2>Free Shipping</h2>
                    <p>Enjoy free shipping on all orders above $100</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <img src="{{asset('assets/img/ic_2.png')}}" alt="">
                </div>
                <div class="tagline-prod">
                    <h2>Free Shipping</h2>
                    <p>Enjoy free shipping on all orders above $100</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <img src="{{asset('assets/img/ic_3.png')}}" alt="">
                </div>
                <div class="tagline-prod">
                    <h2>Free Shipping</h2>
                    <p>Enjoy free shipping on all orders above $100</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <img src="{{asset('assets/img/ic_4.png')}}" alt="">
                </div>
                <div class="tagline-prod">
                    <h2>Free Shipping</h2>
                    <p>Enjoy free shipping on all orders above $100</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mb-5 justify-content-between">
            <div class="col-md-7">
                <div class="bg-dark py-3">
                    <div class="m-auto my-5 py-5">
                        <p class="text-white fs-3 text-center">PEACE OF MIND</p>
                        <p class="text-white text-center">A one-stop platform for all your fashion needs, hassle free, Buy with a peace of mind.</p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="bg-light text-decoration-none p-2 fw-light">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="bg-dark py-3">
                    <div class="m-auto my-5 py-5">
                        <p class="text-white fs-3 text-center">BUY 2 GET 1 FREE</p>
                        <p class="text-white text-center">End of season sale. Buy any 2 item of your choice and get 1 free.</p>
                        <div class="d-flex justify-content-center">
                            <a href="#" class="bg-light text-decoration-none p-2 fw-light">BUY NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="my-5 text-center content-heading">
            <h3>Top Sellers</h3>
            <p class="mt-3">Browse our top-selling products</p>
        </div>
        <div class="row">
            @foreach($products as $row)
                <div class="col-md-3">
                    <a href="{{url('product_detail')}}/{{$row->id}}" class="card product-list">
                        <img src="{{asset($row->product_photo)}}" alt="" class="img-fluid">

                        <div class="card-body">
                            <h5 class="card-title">{{$row->product_name}}</h5>
                            <p class="card-text price">$ {{number_format($row->product_price)}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="mt-5 d-flex justify-content-center">
            <a href="{{url('product')}}" class="btn btn-primary btn-sm btn-primary-custom text-white text-decoration-none px-4 py-3">SHOP NOW</a>
        </div>
    </div>
@endsection
