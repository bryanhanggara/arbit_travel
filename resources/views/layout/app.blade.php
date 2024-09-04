<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.style')
  
</head>

<body>

    <!-- nav -->
   @include('include.navbar')

  @yield('content')

    <!-- Footer -->
   @include('include.footer')


    <!-- script bootsrap -->
    @include('include.script')
</body>

</html>