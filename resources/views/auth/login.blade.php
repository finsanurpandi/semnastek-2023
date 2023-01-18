@extends('layouts.auth_layout')

@section('content')

    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
          <!-- form -->
          <div class="md:w-1/2 px-8 md:px-16">
            <h2 class="font-bold text-2xl text-center text-gray-600">Login</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="relative z-0 w-full mb-6 group">
                    <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required autocomplete="off"/>
                    <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="password" class="peer-focus:font-medium absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                </div>
                <div class="mt-10">
                    <button type="submit" class="py-2 w-full px-5 gradient text-white border rounded-xl hover:scale-110 duration-300">Login</button>
                </div>
            </form>

            <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
              <hr class="border-gray-400">
              <p class="text-center text-sm">OR</p>
              <hr class="border-gray-400">
            </div>
            <div class="mt-3 text-xs flex justify-between items-center text-gray-600">
              <p>Don't have an account?</p>
              <a href="{{route('register')}}" class="py-2 px-5 gradient text-white border rounded-xl hover:scale-110 duration-300">Register</a>
            </div>
          </div>
          <!-- image -->
          <div class="md:block hidden w-1/2">
            <img class="rounded-2xl" src="{{ asset('img/poster.jpg') }}">
          </div>
        </div>
      </section>
@stop
