@extends('front.layouts.master')
@section('main_content')
<!-- Breadcrumb -->
<section class="breadcrumb-section py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.html" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="customer-dashboard.html" class="text-primary">My Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Orders</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Customer Orders Section -->
<section class="customer-orders py-5">
    <div class="container">
        <div class="row">
         <!-- Sidebar -->
         @include('user.pages.sidebar')

            <!-- Orders Content -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-bold mb-0">My Orders</h3>
                    <div>
                        <select class="form-select">
                            <option>All Orders</option>
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Delivered</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                </div>
                
                <!-- Orders List -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="px-4 py-3">Order ID</th>
                                        <th class="py-3">Date</th>
                                        <th class="py-3">Items</th>
                                        <th class="py-3">Total</th>
                                        <th class="py-3">Status</th>
                                        <th class="py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-3 fw-bold">#ORD-2024-1003</td>
                                        <td class="py-3">Nov 05, 2025</td>
                                        <td class="py-3">7 items</td>
                                        <td class="py-3 fw-bold text-primary">$78.25</td>
                                        <td class="py-3"><span class="badge bg-warning">Pending</span></td>
                                        <td class="py-3">
                                            <a href="{{route('orders_single',1)}}" class="btn btn-sm btn-primary me-1">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
@endsection