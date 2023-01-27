@extends('layouts.default')

@section('content')
<main class="mt-0 transition-all duration-200 ease-soft-in-out">
    <section class="min-h-screen">
      <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: url('/img/hero-register.png')">
        <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
        <div class="container z-10">
          <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
              <h1 class="mb-2 text-white">DAFTAR</h1>
              <p class="text-white">SELAMAT DATANG DI SEMNASTEK UNSUR 2023!</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
          <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
            <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-6">
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" alt="" srcset="" width="100px" class="mx-auto">
                </a>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="email" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" autocomplete="off"/>
                    </div>
                    <div class="mb-4">
                        <input type="text" name="name" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nama Lengkap" aria-label="NamaLengkap" aria-describedby="nama-addon" autocomplete="off"/>
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" autocomplete="off"/>
                    </div>
                    {{--
                    <div class="mb-4">
                        <input type="text" name="confirm_password" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Confirm Password" aria-label="ConfirmPassword" aria-describedby="confirm_password-addon" autocomplete="off"/>
                    </div> --}}
                    <div class="mb-4">
                        <input type="text" name="address" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Alamat" aria-label="Alamat" aria-describedby="alamat-addon" autocomplete="off"/>
                    </div>
                    <button type="submit" class="py-2 w-full px-5 gradient text-white border rounded-xl hover:scale-110 duration-300">DAFTAR</button>
                    <p class="mt-4 mb-0 leading-normal text-sm">Sudah memiliki akun? <a href="{{route('login')}}" class="font-bold text-slate-700">LOGIN</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
@stop
