

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hMart_12 - Your Online Grocery Store</title>
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
     <link rel="stylesheet" href="{{asset('backend/dist/css/iziToast.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>

<body>
  
    <!-- Top Bar -->
  @include('front.layouts.topbar')

    <!-- Navigation -->
    @include('front.layouts.navbar')

    <!-- main content -->
    @yield('main_content')

    <!-- Footer -->
      @include('front.layouts.footer')


   

    <!-- jQuery -->
     <script src="{{asset('backend/dist/js/iziToast.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>

    <!-- Bootstrap Bundle JS -->
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    @stack('scripts')

    <!-- Custom JS -->
    <script src="{{asset('frontend/js/script.js')}}"></script>
       
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