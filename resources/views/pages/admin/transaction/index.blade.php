@extends('layouts.parent')

@section('title', 'Transaction')

@section('content')

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">Transaction</li>
                    <li class="breadcrumb-item active">Transaction</li>
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
                        <th scope="col">Payment URL</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaction as $row)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->total_price }}</td>
                            <td>
                                @if ($row->payment_url == null)
                                    NULL
                                @else
                                    <a href="{{ $row->payment_url }}" target="black">MIDTRANS</a>
                                @endif

                            </td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge bg-danger">EXPIRED</span>
                                @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning">PENDING</span>
                                @elseif ($row->status == 'SETTLEMENT')
                                    <span class="badge bg-info">SETTLEMENT</span>
                                @else
                                    <span class="badge bg-success">SUCCESS</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#showMyTransactionModal{{ $row->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @include('pages.admin.my-transaction.show-my-transaction')
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
