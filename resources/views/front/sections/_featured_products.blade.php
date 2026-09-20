<section class="featured-products py-5 bg-light" id="deals">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Featured Products</h2>
                <p class="text-muted">Check out our best selling products</p>
            </div>
            <div class="row g-4">
                @foreach ( $products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card product-card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <a href="{{route('products_single',$product->slug)}}">
                                    <div class="product-image bg-light d-flex align-items-center justify-content-center overflow-hidden">
                                       <img src="{{ asset('uploads/' . $product->photo) }}"  alt="{{ $product->name }}" class="img-fluid w-100 h-100">
                                    </div>
                                </a>
                                
                                <button class="btn btn-sm btn-primary position-absolute bottom-0 end-0 m-2">
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                            </div>
                            <div class="card-body">
                                <p class="small text-muted mb-1">{{ $product->product_category->name}}</p>
                                <h6 class="card-title"><a href="product-single.html" class="text-decoration-none text-dark">{!! $product->name  !!}</a></h6>
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
                                        @foreach ($product->product_variations as $item )
                                              <span class="text-primary fw-bold fs-5">tk{{$item->sale_price}}</span>
                                        <span class="text-muted text-decoration-line-through small ms-1">tk{{$item->regular_price}}</span>
                                       @break
                                        @endforeach
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    @endforeach
               


            </div>
        </div>
    </section>