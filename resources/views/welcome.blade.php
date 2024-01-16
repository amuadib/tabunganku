<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TABUNGANKU</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://picsum.photos/id/128/1900/1200');
        }
    </style>
</head>

<body class="antialiased">
    <div class="w-full p-4">
        <main role="main" class="flex h-screen w-full flex-col content-center justify-center">
            <div class="m-auto w-full rounded-xl bg-gray-50 sm:w-1/2 lg:w-1/3">
                <div class="rounded bg-white px-4 pb-4 pt-5 shadow sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-title">
                                TABUNGANKU </h3>
                            <div class="mt-2">
                                <p class="text-gray-500">
                                    Aplikasi sederhana untuk mengelola tabungan siswa. <br />Silahkan Login <a
                                        href="{{ url('admin/login') }}" class="font-bold text-green-600">disini</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
