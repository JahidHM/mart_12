
@extends('front.layouts.master')
@section('main_content')
<!-- Breadcrumb -->
<section class="breadcrumb-section py-3 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.html" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="customer-dashboard.html" class="text-primary">My Account</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Customer Profile Section -->
<section class="customer-profile py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
         @include('user.pages.sidebar')

            <!-- Profile Content -->
            <div class="col-lg-9">
                <h3 class="fw-bold mb-4">Profile Settings</h3>
                
                <!-- Personal Information -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold">Personal Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('profile_submit') }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row g-3">
                                         <div class="col-md-12">
                                           
                                                <img src="uploads/user.jpg" alt="" class="profile-photo w_100_p">
                                                <input type="file" class="mt_10" name="photo">
                                            </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label"> Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::guard('web')->user()?->name}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::guard('web')->user()?->email }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Number </label>
                                    <input type="tel" class="form-control" name="phone" value="{{Auth::guard('web')->user()?->phone}}">
                                </div>
                                 <div class="col-6">
                                    <label class="form-label"> Address </label>
                                    <input type="text" class="form-control" name="address" value="{{Auth::guard('web')->user()?->address}}">
                                </div>
                                   <div class="col-md-6">
                                    <label class="form-label">Country </label>
                                    <input type="text" class="form-control" name="country" value="{{Auth::guard('web')->user()?->country}}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">City </label>
                                    <input type="text" class="form-control" name="city" value="{{Auth::guard('web')->user()?->city}}" >
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Division </label>
                                    <input type="text" class="form-control" name="division" value="{{Auth::guard('web')->user()?->division}}" >
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ZIP Code </label>
                                    <input type="text" class="form-control" name="zip" value="{{Auth::guard('web')->user()?->zip}}">
                                </div>
                                <div class="row g-3">
                               <div class="card-header bg-white py-3">
                             <h5 class="mb-0 fw-bold">Change Password</h5>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">New Password </label>
                                    <input type="password" class="form-control" name="password" >
                                    <small class="text-muted">Must be at least 8 characters</small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Confirm New Password </label>
                                    <input type="password" class="form-control" name="confirm_password">
                                </div>
                               
                            </div>
                             
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-2"></i>Update Profile
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

            
@endsection