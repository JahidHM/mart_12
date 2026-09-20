@extends('admin.layouts.master')
@section('admin_main')
  <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1> Create Product </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_product_index')}}">All  Products </a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_product_submit')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    
                                        <div class="row">
                                         
                                            <div class="col-md-12">
                                                <div class="row">
                                                     <div class="col-md-12 mb_10">   
                                              
                                                <input type="file" class="mt_10" name="photo">
                                            </div>
                                                    <div class="col-md-4 col-12">
                                                     <div class="mb-4">
                                                    <label class="form-label">Category</label>
                                                   <select class="form-control" name="product_category_id" id="">
                                                    
                                                    @foreach ($product_categories as $category )
                                                      <option value="{{$category->id}}">{{$category->name}}</option>  
                                                    @endforeach

                                                   </select>
                                                </div>
                                               </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name' )}}" >
                                                </div>
                                                    </div>
                                                     <div class="col-md-4 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Slug *</label>
                                                    <input type="text" class="form-control" name="slug" value="{{old('slug' )}}" >
                                                </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Short description *</label>
                                                   <textarea class="form-control h_100" name="short_description" id="" rows="4">{{old('short_description')}}</textarea>
                                                </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Long Description *</label>
                                                   <textarea class="form-control editor " name="description" id="" rows="4">{{old('description')}}</textarea>
                                                </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label" for="seo_title">Seo Title *</label>
                                                   <input class="form-control" name="seo_title" id="seo_title" >{{old('seo_title')}}</inpout>
                                                </div>
                                                
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label"for="seo_description">Seo Description *</label>
                                                  <input class="form-control " name="seo_description" id="seo_description" >{{old('seo_description')}}</inpout>
                                                </div>
                                                    </div>
                                                  <div class="col-md-12 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Show on home</label>
                                                   <select class="form-control" name="show_on_home" id="">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                   

                                                   </select>
                                                </div>
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