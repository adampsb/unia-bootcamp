@extends('Frontend.layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-secondary text-decoration-none">HOME</a></li>
                        <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">SHOPPING CART</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12 mt-3">
                <h1>Billing details</h1>
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name*</label>
                    <input type="text" class="form-control" id="name" form="checkout" name="full_name" value="{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Street address</label>
                    <input type="text" class="form-control" id="street" form="checkout" placeholder="House number and street name" name="address">
                </div>
                <div class="mb-3">
                    <label for="town" class="form-label">Town / City</label>
                    <input type="text" class="form-control" id="town" form="checkout" name="town">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" form="checkout" name="phone">
                </div>
                <div class="mb-3">
                    <label for="email_address" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email_address" form="checkout" name="email_order" value="{{$user->email}}">
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="fw-bold">Your order</h2>
                <table class="table table-borderless table-custom mb-5">
                    <thead>
                    <tr>
                        <td class="fw-light">Subtotal</td>
                        <td class="text-start">${{number_format($order->total_price)}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="fw-light">Shipping</td>
                        <td class="text-start">Free</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Total</td>
                        <td class="text-start">${{number_format($order->total_price)}}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="border px-3 py-5">
                    <div class="p-3 bg-grey w-100 mb-3">
                        <p class="p-0 m-0">Cash on delivery.  Please contact us if you require assistance or wish to make alternate arrangements.</p>
                    </div>
                    <div class="text-end">
                        <button type="submit" form="checkout" class="btn btn-warning btn-custom btn-orange text-light">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{url('checkout')}}" method="post" id="checkout">
        @csrf
    </form>
@endsection
