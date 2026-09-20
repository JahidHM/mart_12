@extends('admin.layouts.master')
@section('admin_main')

<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Manage All product </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_product_create')}}"> Cerat product</a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md" id="example1">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Photo</th>    
                                                    <th> Name</th>
                                                    <th>Category</th>
                                                    <th>Variation</th>
                                                    <th>Show on home</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach ($products as $product )
                                                    
                                               
                                              <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    @if ($product->photo)
                                                    <td>
                                                        <img style="width: 70px;" src="{{ asset('uploads/' . $product->photo) }}" alt="{{ $product->name }}">
                                                    </td>
                                                    @else
                                                    <td>
                                                         No image
                                                    </td>
                                                        
                                                    @endif
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->product_category?->name }}</td>
                                                     <td>
                                                         @if ($product->show_on_home == 1)
                                                         <span class="btn btn-success" >
                                                            Yes
                                                         </span>
                                                      
                                                          @else
                                                         <span class="btn btn-danger" >
                                                            No
                                                         </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" href="{{route('admin_product_variation', $product->id)}}">Product Variation</a>
                                                    </td>
                                                   
                                                    <td class="pt_10 pb_10">
                                                        
                                                      <a href="{{ route('admin_product_edit',$product->id) }}" class="btn btn-primary"> <i class="fas fa-edit"></i></a>
                                                        <a href="{{route('admin_product_delete',$product->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure?. you went to delete this products');"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    <div class="modal fade" id="modal_1" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">Item Name</label></div>
                                                                        <div class="col-md-8">Laptop</div>
                                                                    </div>
                                                                    <div class="form-group row bdb1 pt_10 mb_0">
                                                                        <div class="col-md-4"><label class="form-label">Description</label></div>
                                                                        <div class="col-md-8">This is a very good product. This is a very good product. This is a very good product. This is a very good product. This is a very good product. This is a very good product. </div>
                                                                    </div>
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