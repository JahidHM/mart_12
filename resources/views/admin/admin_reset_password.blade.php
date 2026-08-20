<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{asset('backend/uploads/favicon.png')}}">

    <title>Admin Reset Password </title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('backend/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/font_awesome_5_free.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/duotone-dark.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/fontawesome-iconpicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/bootstrap4-toggle.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/air-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/custom.css')}}">

    <script src="{{asset('backend/dist/js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/tooltip.js')}}"></script>
    <script src="{{asset('backend/dist/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/moment.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/stisla.js')}}"></script>
    <script src="{{asset('backend/dist/js/jscolor.js')}}"></script>
    <script src="{{asset('backend/dist/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/iziToast.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/fontawesome-iconpicker.js')}}"></script>
    <script src="{{asset('backend/dist/js/air-datepicker.min.js')}}"></script>
    <script src="{{asset('backend/dist/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('backend/dist/js/bootstrap4-toggle.min.js')}}"></script>
</head>

<body>
    <div id="app">
    <div class="main-wrapper">
        <section class="section">
            <div class="container container-login">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary border-box">
                            <div class="card-header card-header-auth">
                                <h4 class="text-center">Reset Password</h4>
                            </div>
                            <div class="card-body card-body-auth">
                                <form method="POST" action="{{route('admin_reset_password_submit',[$token, $email])}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" value="" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Retype Password" value="">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg w_100_p">
                                            Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

    <script src="{{asset('backend/dist/js/scripts.js')}}"></script>
    <script src="{{asset('backend/dist/js/custom.js')}}"></script>
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
</body>

</html>