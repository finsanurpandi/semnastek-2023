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

     <script>
        function logout(){
            Swal.fire({
            title: 'Anda yakin ingin keluar?',
            showDenyButton: true,
            confirmButtonText: 'Keluar',
            confirmButtonColor: '#36368d',
            denyButtonText: 'Tidak',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
                // else if (result.isDenied) {
                //     Swal.fire('Terima kasih!', '', 'success');
                // }
            })
        }
     </script>

    <script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    })

        @if(Session::has('message'))
            var type = "{{Session::get('alert-type')}}";
            switch (type) {
                case 'info':
                    Toast.fire({
                        icon: 'info',
                        title: "{{Session::get('message') }}"
                    })
                break;
                case 'success':
                    Toast.fire({
                        icon: 'success',
                        title: "{{Session::get('message') }}"
                    })
                break;
                case 'warning':
                    Toast.fire({
                        icon: 'warning',
                        title: "{{Session::get('message') }}"
                    })
                break;
                case 'error':
                    Toast.fire({
                        icon: 'error',
                        title: "{{Session::get('message') }}"
                    })
                break;
                case 'dialog_error':
                    Toast.fire({
                        icon: 'error',
                        title: "Ooops",
                        text: "{{Session::get('message') }}",
                        timer: 3000
                    })
                break;
            }
        @endif

        @if ($errors->any())
            @foreach($errors->all() as $error)
                Swal.fire({
                    type: 'error',
                    title: "Ooops",
                    text: "{{ $error }}",
                })
            @endforeach
        @endif
    </script>
</body>

</html>
