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
            <div class="col-md-12 mt-5">
                <table class="table table-borderless table-custom">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detail as $row)
                        <tr>
                            <td class="px-3">
                                <a href="{{url('cart/remove')}}/{{$row->id}}">
                                    <i class="bi bi-x-lg"></i>
                                </a>
                            </td>
                            <td class="fw-bold">{{$row->product_name}}</td>
                            <td class="fw-bold">{{$row->size}}</td>
                            <td class="fw-bold">${{number_format($row->price)}}</td>
                        </tr>
                    @endforeach
                    @if(count($detail) == 0)
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada barang dikeranjang</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4">
                <h2 class="fw-bold">Cart Totals</h2>
                <table class="table table-borderless table-custom mb-5">
                    <thead>
                    <tr>
                        <td class="fw-light">Subtotal</td>
                        <td class="text-end">${{number_format(($order?$order->total_price:0))}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="fw-light">Shipping</td>
                        <td class="text-end">Free</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Total</td>
                        <td class="text-end">${{number_format(($order?$order->total_price:0))}}</td>
                    </tr>
                    </tbody>
                </table>
                @if(isset($order) && $order->total_price)
                    <a href="{{url('billing')}}" class="btn btn-warning btn-custom btn-orange text-light">Proceed to Checkout</a>
                @else
                    <a href="{{url('product')}}" class="btn btn-primary btn-custom text-light">Proceed to List Product</a>
                @endif
            </div>
        </div>
    </div>
@endsection
