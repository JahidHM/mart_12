@extends('front.layouts.master')
@section('main_content')
<section class="login-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h3 class="text-center fw-bold mb-4">Reset Password </h3>
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

                        
                               <form method="POST" action="{{route('reset_password_submit',[$token, $email])}}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="" autofocus>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Retype Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg w_100_p">
                                            Submit
                                        </button>
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