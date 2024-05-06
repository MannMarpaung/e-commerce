@extends('layouts.parent')

@section('title', 'Product - Create Product')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Create Product</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Data Product</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
            </nav>

            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-2">
                    <label for="inputName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
                </div>

                <div class="mb-2">
                    <label class="col-sm-2 col-form-label">Category Product</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>-=-=- Choose Category -=-=-</option>
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="inputPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" id="inputPrice" name="price" value="{{ old('price') }}">
                </div>

                <div class="mb-2 relative">
                    <label class="col-sm-2 col-form-label">Product Description</label>
                    <textarea class="form-control col-12" name="description">

                    </textarea>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <button class="btn btn-primary">
                        <i class="bi bi-plus"></i>
                        Create Product
                    </button>
                </div>
            </form>


        </div>
    </div>

@endsection
