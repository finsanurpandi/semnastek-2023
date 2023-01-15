<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
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
            <h2 class="font-bold text-2xl text-gray-600">Login</h2>
            <p class="text-xs mt-4 text-gray-600">If you are already a member, easily log in</p>

            <form action="{{route('login')}}" class="flex flex-col gap-4" method="POST">
                @csrf
              <input class="p-2 mt-8 rounded-xl border" type="email" name="email" placeholder="Email">
              <div class="relative">
                <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">
              </div>
              <button type="submit" class="gradient rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
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
