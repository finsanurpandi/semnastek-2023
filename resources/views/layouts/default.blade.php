<!DOCTYPE html>
<html lang="en">

    @include('includes.head')

<body class="font-sans antialiased font-normal text-start text-base leading-default text-slate-500">

    <div class="Loader" id="Loader">
        <div class="LoaderWrapper">
           <div class="circleBall"></div>
           <div class="circleBall"></div>
           <div class="circleBall"></div>
        </div>
     </div>

    @yield('content')

    @include('includes.footer')
</body>

</html>
