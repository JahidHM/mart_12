@extends('admin.layouts.master')
@section('admin_main')
  <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Add Users </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_user_index')}}">All Users </a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_user_submit')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    
                                        <div class="row">
                                            <div class="col-md-3">   
                                                <img src="uploads/user.jpg" alt="" class="profile-photo w_100_p">
                                                <input type="file" class="mt_10" name="photo">
                                            </div>
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
                                                    <label class="form-label">Email *</label>
                                                    <input type="email" class="form-control" name="email" value="{{old('email' )}}" required>
                                                </div>

                                                   </div>
                                                 <div class="col-md-6 col-12">
                                                    <div class="mb-4">
                                                    <label class="form-label"> phone </label>
                                                    <input type="text" class="form-control" name="phone" value="{{old('phone' )}}" >
                                                </div>
                                             
                                               </div>
                                               <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Address </label>
                                                    <input type="text" class="form-control" name="address" value="{{old('address' )}}" >
                                                </div>
                                               </div>
                                                    <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> City </label>
                                                    <input type="text" class="form-control" name="city" value="{{old('city' )}}" >
                                                </div>
                                               </div>
                                                   <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Country </label>
                                                    <input type="text" class="form-control" name="country" value="{{old('country' )}}" >
                                                </div>
                                               </div>
                                                  <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Division </label>
                                                    <input type="text" class="form-control" name="division" value="{{old('division' )}}" >
                                                </div>
                                               </div>
                                                  <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Zip Code </label>
                                                    <input type="text" class="form-control" name="zip" value="{{old('zip' )}}" >
                                                </div>
                                               </div>
                                                  <div class="col-md-6 col-12">
                                                     <div class="mb-4">
                                                    <label class="form-label">Status</label>
                                                   <select class="form-control" name="status" id="">
                                                    <option value="1">Active</option>
                                                    <option value="0">Pending</option>
                                                    <option value="2">Blocked</option>

                                                   </select>
                                                </div>
                                               </div>
                                               <br> 
                                            

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