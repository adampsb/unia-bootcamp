@extends('Frontend.layout.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <img src="{{asset($product->product_photo)}}" alt="Single Product Woman" class="w-100 img-fluid">
            </div>
            <div class="col-md-6 mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="text-secondary text-decoration-none">HOME</a></li>
                        <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">SHOP</li>
                    </ol>
                </nav>
                <h1>{{$product->product_name}}</h1>
                <div>
                    @for($i =0;$i<4;$i++)
                        <i class="bi bi-star-fill star"></i>
                    @endfor
                    <i class="bi bi-star-fill star-no"></i>
                </div>
                <div class="mt-2">
                    <p class="price"><span class="real-price mx-2">$ {{number_format($product->product_price)}}</span></p>
                    <p>{!! $product->description !!}</p>

                    <select class="form-select w-50 py-3 select-size mt-5" name="size" required form="FormOrder">
                        <option value="" selected>Select Size</option>
                        @foreach($size as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>

                    <div class="mt-3">
                        @if(session()->get('customers_id'))
                            <button type="submit" class="btn btn-primary btn-primary-custom btn-default" form="FormOrder">ADD TO CART</button>
                        @else
                            <button type="button" data-bs-toggle="modal" data-bs-target="#ModalLogin" class="btn btn-primary btn-primary-custom btn-default">ADD TO CART</button>
                        @endif
                    </div>
                    <p class="mt-3">
                        <span class="fw-bold">Category</span>: Women, Polo, Casual <br>
                        <span class="fw-bold">Tags</span>: Modern, Design, cotton
                    </p>
                    @if(session()->get('customers_id'))
                    <form method="post" action="{{route('productOrder')}}" id="FormOrder">
                        @csrf
                        <input type="hidden" name="id_product" value="{{$product->id}}">
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-4 d-flex">
                <a href="#" class="border text-decoration-none text-dark px-3 py-2">Description</a>
                <a href="#" class="border text-decoration-none text-secondary bg-light p-2">Reviews(0)</a>
            </div>
            <div class="col-md-12">
                <div class="border p-5">
                    <p>A key objective is engaging digital marketing customers and allowing them to interact with the brand through servicing and delivery of digital media. Information is easy to access at a fast rate through the use of digital
                        communications. Users with access to the Internet can use many digital mediums, such as Facebook, YouTube, Forums, and Email etc. Through Digital communications it creates a Multi-communication channel where information can be
                        quickly exchanged around the world by anyone without any regard to whom they are.[28] Social segregation plays no part through social mediums due to lack of face to face communication and information being wide spread instead to a selective audience. </p>
                </div>
            </div>
        </div>
    </div>
@endsection
