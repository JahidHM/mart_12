<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="uploads/favicon.png">

    <title>Admin Panel</title>

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

        @include('admin.layouts.navbar')



        @include('admin.layouts.sidebar')
        @yield('admin_main')

       

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