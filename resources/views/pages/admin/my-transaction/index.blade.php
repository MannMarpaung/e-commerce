@extends('layouts.parent')

@section('title', 'My Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">My Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Transaction</li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>

        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction</div>

            <table class="table table-striped table-hover table-bordered data-table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name Account</th>
                        <th scope="col">Reciever Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myTransaction as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->total_price }}</td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge bg-danger">Expired</span>
                                @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($row->status == 'SETTLEMENT')
                                    <span class="badge bg-info">Settlement</span>
                                @else
                                    <span class="badge bg-success">Success</span>
                                @endif
                            </td>
                            <td>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.my-transaction.show', $row->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                        Detail
                                    </a>
                                @else
                                    <a href="{{ route('user.my-transaction.show', $row->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i>
                                        Detail
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Data is Empt</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
