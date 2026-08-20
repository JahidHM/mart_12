<section class="featured-products py-5 bg-light" id="deals">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Featured Products</h2>
                <p class="text-muted">Check out our best selling products</p>
            </div>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <a href="{{route('products_single',1)}}" class="text-decoration-none text-dark">
                            <div class="position-relative">
                                <div
                                    class="product-image bg-light d-flex align-items-center justify-content-center overflow-hidden">
                                    <img src="images/Green Apple.jpg" alt="Fresh Green Apples"
                                        class="img-fluid w-100 h-100">
                                </div>
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">-20%</span>
                            </div>
                            <div class="card-body">
                                <p class="small text-muted mb-1">Fruits</p>
                                <h6 class="card-title">Fresh Green Apples</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                    </span>
                                    <small class="text-muted ms-2">(4.5)</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-primary fw-bold fs-5">$4.99</span>
                                        <span class="text-muted text-decoration-line-through small ms-1">$6.99</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 m-2">
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card product-card h-100 border-0 shadow-sm">
                        <a href="{{route('products_single',1)}}" class="text-decoration-none text-dark">
                            <div class="position-relative">
                                <div
                                    class="product-image bg-light d-flex align-items-center justify-content-center overflow-hidden">
                                    <img src="images/Egg.jpg" alt="Farm Fresh Eggs" class="img-fluid w-100 h-100">
                                </div>
                                <span class="badge bg-primary position-absolute top-0 end-0 m-2">New</span>
                            </div>
                            <div class="card-body">
                                <p class="small text-muted mb-1">Dairy</p>
                                <h6 class="card-title">Farm Fresh Eggs (12)</h6>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-warning">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </span>
                                    <small class="text-muted ms-2">(5.0)</small>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-primary fw-bold fs-5">$5.99</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 m-2">
                            <i class="bi bi-cart-plus"></i>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>