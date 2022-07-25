@extends('Frontend.layout.layout')
@section('content')
    <div class="header-box bg-about">
        <div class="container">
            <h1 class="header-title">
                About Northstar
            </h1>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="card border-0">
                    <img src="{{asset('assets/img/girls.png')}}" class="card-img border-radius-0">
                    <div class="card-overlay text-center">
                        <a href="#" class="bg-light text-decoration-none p-2 fw-light">BUY NOW</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card border-0">
                    <img src="{{asset('assets/img/boys.png')}}" class="card-img border-radius-0">
                    <div class="card-overlay text-center">
                        <a href="#" class="bg-light text-decoration-none p-2 fw-light">BUY NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="my-5 text-center content-heading">
            <h3>The Founders</h3>
        </div>

        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('assets/img/f1.png')}}" alt="HM Jawad" class="img-fluid">
                <p class="text-center nama-products fw-bold mt-3">HM Jawad</p>
            </div>
            <div class="col-md-3">
                <img src="{{asset('assets/img/f2.png')}}" alt="Furqan Abid" class="img-fluid">
                <p class="text-center nama-products fw-bold mt-3">Furqan Abid</p>
            </div>
            <div class="col-md-3">
                <img src="{{asset('assets/img/f3.png')}}" alt="Abdullah Ah" class="img-fluid">
                <p class="text-center nama-products fw-bold mt-3">Abdullah Ah</p>
            </div>
            <div class="col-md-3">
                <img src="{{asset('assets/img/f3.png')}}" alt="Abrar Khan" class="img-fluid">
                <p class="text-center nama-products fw-bold mt-3">Abrar Khan</p>
            </div>
        </div>
    </div>
@endsection
