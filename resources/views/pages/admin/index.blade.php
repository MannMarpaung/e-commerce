@extends('layouts.parent')

@section('title', 'Dashboard - Admin')

@section('content')

    <div class="section dashboard">

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Dashboard <span class="badge bg-danger text-white"><i class="bi bi-exclamation-octagon me-1"></i> {{ Auth::user()->role }}</span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span class="text-muted small pt-2 ps-1">{{ Auth::user()->email }}</span>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- End Customers Card -->

        <div class="row">

            <div class="col-md-4">
                <!-- Category Card -->
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Category</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Category Card -->
            </div>

            <div class="col-md-4">
                <!-- Product Card -->
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Product</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-bag"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $product }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Product Card -->
            </div>
            <div class="col-md-4">
                <!-- User Card -->
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">User</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person-check"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $user }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End User Card -->
            </div>
        </div>

    </div>

@endsection
