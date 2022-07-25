@extends('backend.layout.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
    </div>
    <form action="{{route('adminSizeAddSave')}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-8">
            <div class="card mb-4 border-left-primary">
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label class="col-md-3 mt-2">Size Name</label>
                        <input type="text" name="name" class="form-control bg-dark text-light border-0 small col-md-8" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>
                        Pastikan data yang anda masukan sudah sesuai dengan data yang diminta dan pastikan tidak kosong.
                    </p>
                    <a href="{{route('adminSize')}}" class="btn btn-outline-dark">Batal</a>
                    <button type="submit" class="btn btn-outline-success">Simpan Data</button>
                </div>
            </div>
        </div>
    </form>
@endsection
