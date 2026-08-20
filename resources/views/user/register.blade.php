@extends('front.layouts.master')
@section('main_content')
<section class="registration-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="text-center fw-bold mb-4">Create Account</h3>
                            
                        
                         @if ($errors->any())
    <script>
        iziToast.error({
            message: "{{ $errors->first() }}",
            position: "topRight",
            timeout: 3000,
            progressBarColor: "#FF0000",
            transitionOut: "fadeOutUp"
        });
    </script>
@endif

@if (session('success'))
    <script>
        iziToast.success({
            message: "{{ session('success') }}",
            position: "topRight",
            timeout: 3000,
            progressBarColor: "#00FF00",
            transitionOut: "fadeOutUp"
        });
    </script>
@endif

@if (session('error'))
    <script>
        iziToast.error({
            message: "{{ session('error') }}",
            position: "topRight",
            timeout: 3000,
            progressBarColor: "#FF0000",
            transitionOut: "fadeOutUp"
        });
    </script>
@endif

                       <form method="POST" action="{{ route('register_submit') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label"> Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name"  value="{{old('name')}}">
                                </div>
                              
                                
                                <div class="col-12">
                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="email"  value="{{old('email')}}">
                                </div>
                                
                             
                                
                                <div class="col-12">
                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" >
                                    <small class="text-muted">Must be at least 8 characters</small>
                                </div>
                                
                                <div class="col-12">
                                    <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="confirm_password" >
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="text-primary">Terms & Conditions</a>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="bi bi-person-plus me-2"></i>Create Account
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <p class="text-center mb-0">
                            Already have an account? 
                            <a href="{{route('login')}}" class="text-primary text-decoration-none fw-bold">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection