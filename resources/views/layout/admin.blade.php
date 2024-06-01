<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>@yield('title', 'Course Voting')</title>
    <style>
        #menu-toggle:checked+#menu {
            display: block;
        }

        canvas {
            position: fixed;
        }

        /* * {
          outline: 1px solid red;
        } */
    </style>
</head>
@if (request()->is('/'))

    <body>
        <header
            class="lg:px-16 px-6 bg-white flex flex-wrap items-center justify-between shadow fixed top-0 w-screen z-20 min-w-full">
        @else

            <body>
                <header
                    class="lg:px-16 px-6 bg-white flex flex-wrap items-center justify-between shadow fixed top-0 w-screen z-20">
@endif
<div class="flex gap-5 items-center">
    <a class="text-lg font-bold" href="/admin">Course Voting</a>
    @if (auth()->check())
        <p>{{ auth()->user()->nama }}</p>
    @endif
</div>

<label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900"
        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
        <title>menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
    </svg></label>
<input class="hidden" type="checkbox" id="menu-toggle" />

<div class="hidden lg:flex lg:items-center lg:pb-0 lg:w-auto lg:gap-5 lg:mb-0 lg:shadow-none lg:px-0 w-full pb-2 px-2 shadow-xl lg:border-b-0 "
    id="menu">
    <div>
        <nav>
            <ul class="lg:flex lg:mb-0 items-center justify-between text-base text-gray-700 pt-4 mb-2 lg:pt-0">
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                        href="{{ route('admin-users') }}">User</a></li>
                <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                        href="{{ route('admin-profile') }}">Profile</a></li>
                <!-- <li>
                                  <a href="#" class="lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
                                    <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://pbs.twimg.com/profile_images/1128143121475342337/e8tkhRaz_normal.jpg" alt="Andy Leverenz">
                                  </a>
                                </li> -->
            </ul>
        </nav>
    </div>


    <div class="flex gap-5 items-center">
        @if (auth()->check())
            <a href="/logout">
                <div class="btn btn-error btn-sm text-white">
                    Logout
                </div>
            </a>
        @else
            <a href="/login">
                <div class="btn btn-primary btn-sm text-white">
                    Login
                </div>
            </a>
        @endif
    </div>
</div>

</header>
@yield('content')
</body>

</html>
