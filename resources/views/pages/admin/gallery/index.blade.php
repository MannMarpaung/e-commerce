@extends('layouts.parent')

@section('title', 'Product Gallery')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery >> {{ $product->name }}</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Product Gallery</li>
                </ol>
            </nav>

            <a href="{{ route('admin.product.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#createProductGalleryModal">
                    <i class="bi bi-plus"></i>
                    Add Product Gallery
                </button>
                @include('pages.admin.gallery.modal-create')
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->product_galleries as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ url('storage/product/gallery', $row->image) }}" alt="" srcset="" class="img-thumbnail" width="100"></td>
                            <td>
                                <form action="{{ route('admin.product.gallery.destroy', [$product->id, $row->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit" class="d-inline">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data Is Empty</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

@endsection
