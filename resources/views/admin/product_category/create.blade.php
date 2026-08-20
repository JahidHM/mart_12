@extends('admin.layouts.master')
@section('admin_main')
  <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Add Category </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_product_category_index')}}">All  Categories</a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_product_category_submit')}}" method="post" >
                                        @csrf
                                    
                                        <div class="row">
                                         
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name' )}}" required>
                                                </div>
                                                    </div>
                                                     <div class="col-md-6 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Slug *</label>
                                                    <input type="text" class="form-control" name="slug" value="{{old('slug' )}}" required>
                                                </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                     <div class="mb-4">
                                                    <label class="form-label">Show on home</label>
                                                   <select class="form-control" name="show_on_home" id="">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                   

                                                   </select>
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
                    </div>
                </div>
            </section>
        </div>
@endsection