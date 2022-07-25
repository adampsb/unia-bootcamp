@extends('Frontend.layout.layout')
@section('content')
    <div class="container">
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
@endsection
