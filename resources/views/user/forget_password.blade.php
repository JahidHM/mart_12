@extends('front.layouts.master')
@section('main_content')
<section class="forget-password-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        
                        <h3 class="text-center fw-bold mb-4">Forgot Password?</h3>
                            @if ($errors->any())
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
                                    @endif
                        
                        <form method="POST" action="{{ route('forget_password_submit') }}">
                            <form method="POST" action="{{ route('forget_password_submit') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="bi bi-send me-2"></i>Send Reset Link
                            </button>
                            
                            <div class="text-center">
                                <a href="{{route('login')}}"                                                                                                           " class="text-decoration-none">
                                    <i class="bi bi-arrow-left me-1"></i>Back to Login
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection  