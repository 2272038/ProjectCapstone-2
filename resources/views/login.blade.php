<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.5.0/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <style>
        #menu-toggle:checked + #menu {
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
<body>
    <div class="min-h-screen bg-gray-100 flex flex-col md:-pt-4 py-6 px-6 lg:px-8" id="particles-js">
        <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4 z-10">
            <h2 class="text-center text-3xl font-bold text-gray-900">Login</h2>
        </div>

        @error('error')
        <div class="bg-red-100 w-fit h-[50px] px-2 mt-4 place-self-center flex items-center rounded-md border border-solid border-red-300 z-10">
            <p>{{$message}}</p>
        </div>
        @enderror

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md z-10 shadow-2xl rounded-xl">
            <div class="bg-white py-8 px-6 shadow rounded-xl sm:px-10">
                <form class="mb-0 space-y-6" method="POST">
                    @csrf
                    <label for="nrp" class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                        <input id="nrp" name="nrp" type="text" required class="grow" placeholder="NRP" />
                    </label>

                    <label for="password" class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="grow" placeholder="Password" />
                    </label>

                    <div>
                        <button type="submit" class="w-full btn btn-neutral text-accent">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/particles.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
