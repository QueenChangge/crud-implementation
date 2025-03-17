<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')

  </head>
  <body>
    <div class="w-full h-screen flex">
      <div class="w-1/2 h-full flex justify-center items-center bg-gray-100 xl:flex md:hidden xs:hidden">
        <img src="landing-agency/img/newsletter.png" alt="">
      </div>
      <div class="xl:w-1/2 md:w-full xs:w-full h-screen flex-col gap-10 bg-white xs:p-2 md:p-6 xl:p-10">
        <div class="w-full h-30 flex justify-end xl:flex md:hidden xs:hidden">
          <img src="landing-agency/img/about.jpg" alt="" class="w-15 h-10">
        </div>
        {{-- form --}}
        <div class="w-full flex-col justify-center items-center">
          <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm ">
              <img class="mx-auto h-10 w-auto xl:hidden md:flex xs:flex" src="landing-agency/img/about.jpg" alt="Your Company">
              <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            </div>
          
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
              <form class="space-y-6" action="{{ route('auth.login.login') }}" method="POST">
                @csrf
                <div>
                  <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                  <div class="mt-2">
                    <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  </div>
                </div>
          
                <div>
                  <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    <div class="text-sm">
                      <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>
                  </div>
                  <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                  </div>
                </div>
          
                <div>
                  <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
              </form>
          
              <p class="mt-10 text-center text-sm/6 text-gray-500">
                Not a member?
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Register First</a>
                
              </p>
              <div class="w-full text-center xl:mt-8 md:mt-6 xs:mt-4 text-red-500">
                @if (session('status'))
                <div class="alert alert-danger">
                {{session('message')}}
                </div>
              @endif

              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
              @endif
              {{Auth::user()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>