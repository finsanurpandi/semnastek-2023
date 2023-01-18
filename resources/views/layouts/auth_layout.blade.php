<!DOCTYPE html>
<html lang="en">
    @include('includes.head')
<body>

    @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>
</body>

</html>
