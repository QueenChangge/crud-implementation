<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
  <body>
    <!-- FULL CONTAINER -->
    <div class="w-full h-screen flex relative">
        @include('dashboard2.partials.sidebar')
        <!-- RIGHT SIDE -->
        <div class="w-full h-screen xl:pr-10 md:pr-8 xs:pr-6 bg-white flex flex-col xs:pl-6 md:pl-0 xl:pl-0">
            @include('dashboard2.partials.topbar')
            <!-- CONTENT -->
            <div class="flex-1 w-full bg-white relative xl:rounded-4xl overflow-y-auto hide-scrollbar">
                <div class="w-full h-full bg-white xl:rounded-4xl xl:px-10 flex flex-col gap-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
  </body>
</html>