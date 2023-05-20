<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SEMNASTEK-UNSUR') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="body-image">
    <div id="app">
        <nav class="navbar navbar-expand-md bg-navbar shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SEMNASTEK-UNSUR') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @can('author')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('author.index') }}">{{ __('Article') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('author.pembayaran') }}">{{ __('Konfirmasi Pembayaran') }}</a>
                        </li>
                        @endcan
                        @can('reviewer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reviewer.index') }}">{{ __('List Article') }}</a>
                        </li>
                        @endcan
                        @can('keuangan')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('keuangan.pembayaran') }}">{{ __('Pembayaran') }}</a>
                        </li>
                        @endcan
                        @can('editor')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('editor.index') }}">{{ __('Reviewer') }}</a>
                        </li>
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route('editor.article') }}">{{ __('List Article') }}</a>
                        </div>
                        @endcan
                        @can('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.registered.user') }}">{{ __('Registered User') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.article') }}">{{ __('Article') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.setting') }}">{{ __('Setting') }}</a>
                        </li>
                        @endcan
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('password.change') }}">
                                        {{ __('Ubah Password') }}
                                    </a>
                                    <a class="dropdown-item" href="#" onclick="confirmLogout();">
                                        {{ __('Logout') }}
                                     </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    @yield('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('status'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                confirmButtonColor: '#36368d',
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: "{{ session('status') }}"
                // title: 'Congratulations!',
                // text: "{{ session('status') }}",
                // icon: 'Success',
                // timer: 3000
            })
        @endif

        @if(session('failed'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                confirmButtonColor: '#36368d',
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: "{{ session('failed') }}"
            })
        @endif

        $('.show_confirm_approved').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menyetujui artikel data dengan ID <strong>"+nama+"</strong>?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, Setujui!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        $('.show_confirm_reupload').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda tidak akan menerima bukti pembayaran artikel data dengan ID <strong>"+nama+"</strong>?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Upload Ulang!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        $('.show_confirm_rejected').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menolak artikel data dengan ID <strong>"+nama+"</strong>?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, Tolak!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });
        $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menghapus data dengan nama <strong>"+nama+"</strong> dan tidak dapat mengembalikannya kembali",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, hapus saja!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        $('.show_submit').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin',
                icon: 'warning',
                html: "Untuk mengirimkan artikel ini untuk ditinjau?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, kirim sekarang!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        $('.show_set_draft').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin',
                icon: 'warning',
                html: "Untuk mengubah status artikel id <strong>"+nama+"</strong> menjadi draft kembali?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, lakukan!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        $('.show_reset_password').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan mengatur ulang kata kunci untuk akun dengan nama <strong>"+nama+"</strong>?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, Setujui!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        $('.show_force_submit').click(function(event) {
          var form =  $(this).closest("form");
          var nama = $(this).data("name");
          event.preventDefault();
          Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan melakukan force submit untuk artikel milik <strong>"+nama+"</strong>?",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, Setujui!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        });

        function deleteConfirmation(nama)
        {
            event.preventDefault();
            // var form = event.target.form;
            var form =  $(this).closest("form");
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menghapus data dengan nama <strong>"+nama+"</strong> dan tidak dapat mengembalikannya kembali",
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, hapus saja!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        }

        function confirmLogout()
        {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin akan keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#36368d',
                cancelButtonColor: '#de1508',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Batal',
            }). then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }

        function markAsRead(id)
        {
            var fetch_status;

            fetch("{{url('lecture/markAsRead')}}", {
                method: "POST",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')['content']
                },
                body: JSON.stringify({
                    id : id,
                })
            })
            .catch(function (error){
                console.log(error);
            });
        }
    </script>
</body>
</html>
