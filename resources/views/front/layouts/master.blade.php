<!DOCTYPE html>
<html lang="en">

<head>
  @include('front/layouts/head')
</head>

<body>

 @include('front/layouts/navbar')

 @yield('content')
 
 @include('front/layouts/footer')

</body>

</html>
