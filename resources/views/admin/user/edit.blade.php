@extends('admin.layouts.master')
@section('admin_main')
  <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1> Update User </h1>
                    <a class="btn btn-md btn-primary" href="{{route('admin_user_index')}}">All Users </a>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{route('admin_user_update', $user->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                          @method('put')
                                        <div class="row">
                                            <div class="col-md-3"> 
                                                @if ($user->photo)
                                                 <img src="{{asset($user->photo)}}" alt="" class="profile-photo w_100_p">
                                                  @else 
                                                  <img src="{{asset('uploads/default.png')}}" alt="" class="profile-photo w_100_p"> 
                                                @endif  
                                               
                                                <input type="file" class="mt_10" name="photo">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="mb-4">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                                </div>

                                                    </div>
                                                     <div class="col-md-6 col-12">
                                                         <div class="mb-4">
                                                    <label class="form-label">Email *</label>
                                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                                </div>

                                                   </div>
                                                 <div class="col-md-6 col-12">
                                                    <div class="mb-4">
                                                    <label class="form-label"> phone </label>
                                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" >
                                                </div>
                                             
                                               </div>
                                               <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Address </label>
                                                    <input type="text" class="form-control" name="address" value="{{$user->address}}" >
                                                </div>
                                               </div>
                                                    <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> City </label>
                                                    <input type="text" class="form-control" name="city" value="{{$user->city}}" >
                                                </div>
                                               </div>
                                                   <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Country </label>
                                                    <input type="text" class="form-control" name="country" value="{{$user->country}}" >
                                                </div>
                                               </div>
                                                  <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Division </label>
                                                    <input type="text" class="form-control" name="division" value="{{$user->division}}" >
                                                </div>
                                               </div>
                                                  <div class="col-md-6 col-12">
                                                <div class="mb-4">
                                                    <label class="form-label"> Zip Code </label>
                                                    <input type="text" class="form-control" name="zip" value="{{$user->zip}}" >
                                                </div>
                                               </div>
                                                  <div class="col-md-6 col-12">
                                                     <div class="mb-4">
                                                    <label class="form-label">Status</label>
                                                   <select class="form-control" name="status" id="">
                                                    <option value="1" @selected($user->status ==1)>Active</option>
                                                    <option value="0"@selected($user->status ==0)>Pending</option>
                                                    <option value="2"@selected($user->status ==2)>Blocked</option>

                                                   </select>
                                                </div>
                                               </div>
                                               <br> 
                                            

                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update</button>
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