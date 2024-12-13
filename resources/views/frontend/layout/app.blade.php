<!DOCTYPE html>
<html lang="en">

@include('frontend.includes.css')

<body>
    <!-- Navigation-->
    @include('frontend.includes.navbar')

    @yield('content')

    <!-- Footer-->
    @include('frontend.includes.footer')
    @include('frontend.includes.js')
</body>

</html>
