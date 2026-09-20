@extends('admin.layouts.master')
@section('admin_main')
  <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1> Create Variation for <code>{{$product->name}}</code> </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_product_index')}}"> Back to Products </a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_product_variation_submit', $product->id)}}" method="post" >
                                        @csrf
                                    
                                        <div class="row">
                                         
                                            <div class="col-md-12">
                                                <div class="row">
                                                <div class="col-md-4 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Label *</label>
                                                    <input type="text" class="form-control" name="label" value="{{old('label' )}}" >
                                                </div>
                                                    </div>
                                                     <div class="col-md-2 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Sale price *</label>
                                                    <input type="text" class="form-control" name="sale_price" value="{{old('sale_price' )}}" >
                                                </div>
                                                    </div>
                                                     <div class="col-md-2 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Regular price *</label>
                                                    <input type="text" class="form-control" name="regular_price" value="{{old('regular_price' )}}" >
                                                </div>
                                                    </div>
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Sort order  *</label>
                                                    <input type="text" class="form-control" name="sort_order" value="{{old('sort_order' )}}" >
                                                </div>
                                                    </div>
                                                     <div class="col-md-2 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Stock *</label>
                                                    <input type="text" class="form-control" name="stock" value="{{old('stock' )}}" >
                                                </div>
                                                    </div>
                                                    </div>
                          
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table table-bordered table-md" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Label</th>    
                                                    <th> Sale Price</th>
                                                    <th>Regular Price</th>
                                                    <th>Stock</th>
                                                    <th> Sort Order</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach ($product_variations as $variation )
                                                    
                                               
                                              <tr>
                                                    <td>{{$loop->iteration }}</td>
                                                    
                                                    <td>{{$variation->label }}</td>
                                                     <td>{{$variation->sale_price }}</td>
                                                      <td>{{$variation->regular_price }}</td>
                                                       <td>{{$variation->stock }}</td>
                                                       <td>{{$variation->sort_order }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="{{route('admin_product_variation', $product->id)}}">Product Variation</a>
                                                    </td>
                                                   
                                                    <td class="pt_10 pb_10">
                                                        
                                                      <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$variation->id}}" > <i class="fas fa-edit"></i></a>
                                                        <a href="{{ route('admin_product_variation_delete', $variation->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?. you went to delete this variation ?');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    <div class="modal fade" id="modal_{{$variation->id}}" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('admin_product_variation_update', $variation->id)}}" method="POST">

                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" value="{{$product->id}}" name="product_id">
                                                                       
                                                                      <div class="form-group row bdb1 pt_10 mb_0">
                                                                        
                                                                            <label class="form-label">Label</label>
                                                                        <input type="text" class="form-control" value="{{$variation->label }}" name="label">
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                        
                                                                            <label class="form-label"> Regular Price</label>
                                                                        <input type="text" class="form-control" value="{{$variation->regular_price }}" name="regular_price">
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                        
                                                                            <label class="form-label">Sale Price</label>
                                                                        <input type="text" class="form-control" value="{{$variation->sale_price }}" name="sale_price">
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                        
                                                                            <label class="form-label">Stock</label>
                                                                        <input type="text" class="form-control" value="{{$variation->stock }}" name="stock">
                                                                        </div>
                                                                        <div class="form-group row bdb1 pt_10 mb_0">
                                                                        
                                                                            <label class="form-label">Sort Order</label>
                                                                        <input type="text" class="form-control" value="{{$variation->sort_order }}" name="sort_order">
                                                                        </div>
                                                                         <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <label class="form-label"></label>
                                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                    </form>
                                                                   
                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                 @endforeach 
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection