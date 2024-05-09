@extends('layouts.parent')

@section('title', 'Users')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Users</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </nav>

            <!-- Table with hoverable rows -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $row)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->role }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#resetPasswordModal{{ $row->id }}">
                                <i class="bx bx-refresh"></i>
                                Reset Password
                            </button>
                            @include('pages.admin.user.modal-reset')
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data is Empty</td>
                        </tr>
                    @endforelse
                    
                </tbody>
            </table>
            <!-- End Table with hoverable rows -->


        </div>
    </div>


@endsection
