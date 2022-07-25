@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4 border-left-primary">
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Size Name</label>
                        <p class="form-control bg-light text-dark border-0 small col-md-8 mb-0">{{$row->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
