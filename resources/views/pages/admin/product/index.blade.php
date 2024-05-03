@extends('layouts.parent')

@section('title', 'Product')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Data Product</li>
                </ol>
            </nav>

            {{-- Button Create Product --}}
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i>
                    Add Product
                </a>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->category_id }}</td>
                            <td>{{ $row->price }}.</td>
                            <td>{{ $row->description }}</td>
                            <td>Action</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Is Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
