<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEMNASTEK UNSUR</title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <style>
        .gradient {
            background: linear-gradient(90deg, #36368d 0%, #343563 100%);
            }
    </style>
</head>
<body>
    <section class="bg-gray-50 min-h-screen flex items-center justify-center">
        <!-- login container -->
        <div class="flex rounded-2xl shadow-lg max-w-3xl p-5 items-center">
          <!-- form -->
          <div class="md:w-1/2 px-8 md:px-16">
            <h2 class="font-bold text-2xl text-center text-gray-600">Login</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mt-8">
                    <div class="text-sm font-bold text-gray-700 tracking-wide">Email Address</div>
                    <input class="w-full text-sm py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 bg-transparent" type="" placeholder="Masukan email yang terdaftar">
                </div>
                <div class="mt-2">
                    <div class="flex justify-between items-center">
                        <div class="text-sm font-bold text-gray-700 tracking-wide">
                            Password
                        </div>
                    </div>
                    <input class="w-full text-sm py-2 border-b border-gray-300 focus:outline-none focus:border-blue-800 bg-transparent" type="password" placeholder="Masukkan password yang sesuai">
                </div>
                <div class="mt-10">
                    <button class="gradient text-gray-100 px-4 py-2 w-full rounded-lg tracking-wide font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600 shadow-lg">
                        Log In
                    </button>
                </div>
            </form>

            <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
              <hr class="border-gray-400">
              <p class="text-center text-sm">OR</p>
              <hr class="border-gray-400">
            </div>
            <div class="mt-3 text-xs flex justify-between items-center text-gray-600">
              <p>Don't have an account?</p>
              <button class="py-2 px-5 gradient text-white border rounded-xl hover:scale-110 duration-300">Register</button>
            </div>
          </div>

          <!-- image -->
          <div class="md:block hidden w-1/2">
            <img class="rounded-2xl" src="{{ asset('img/poster.jpg') }}">
          </div>
        </div>
      </section>
</body>
</html>
