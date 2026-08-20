@extends('front.layouts.master')
@section('main_content')
<section class="login-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="text-center fw-bold mb-4">Login</h3>
                           <!-- @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @if (session('success'))
                                        <ul>
                                            <li class="text-success">{{ session('success') }}</li>
                                        </ul>
                                    @endif

                                    @if (session('error'))
                                        <ul>
                                            <li class="text-danger">{{ session('error') }}</li>
                                        </ul>
                                    @endif -->

                        
                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email"  value="{{old('email')}}">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login
                            </button>
                            
                            <div class="text-center">
                                <a href="{{route('forget_password')}}" class="text-decoration-none">Forgot Password?</a>
                            </div>
                        </form>
                        
                        <hr class="my-4">
                        
                        <p class="text-center mb-0">
                            Don't have an account? 
                            <a href="{{route('register')}}" class="text-primary text-decoration-none fw-bold">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection