<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prision Management') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <!-- Substitua o conteúdo dentro do x-application-logo pelo novo logotipo -->
            <svg fill="#ffffff" height="17%" width="7rem" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 463 463" xml:space="preserve" stroke="#ffffff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M423,219.5V211h16.5c4.142,0,7.5-3.358,7.5-7.5V179h8.5c4.142,0,7.5-3.358,7.5-7.5v-24c0-2.691-1.442-5.177-3.779-6.512 l-224-128c-2.306-1.317-5.137-1.317-7.442,0l-224,128C1.442,142.323,0,144.808,0,147.5v24c0,4.142,3.358,7.5,7.5,7.5H16v24.5 c0,4.142,3.358,7.5,7.5,7.5H40v8.5c0,5.827,3.235,10.908,8,13.555V372H23.5c-4.142,0-7.5,3.358-7.5,7.5V404H7.5 c-4.142,0-7.5,3.358-7.5,7.5v32c0,4.142,3.358,7.5,7.5,7.5h448c4.142,0,7.5-3.358,7.5-7.5v-32c0-4.142-3.358-7.5-7.5-7.5H447v-24.5 c0-4.142-3.358-7.5-7.5-7.5H415V233.055C419.765,230.408,423,225.327,423,219.5z M408,219.5c0,0.276-0.224,0.5-0.5,0.5h-32 c-0.276,0-0.5-0.224-0.5-0.5V211h33V219.5z M335,372V233.055c4.765-2.647,8-7.728,8-13.555V211h17v8.5 c0,5.827,3.235,10.908,8,13.555V372H335z M303,372V235h17v137H303z M255,372V233.055c4.765-2.647,8-7.728,8-13.555V211h17v8.5 c0,5.827,3.235,10.908,8,13.555V372H255z M223,372V235h17v137H223z M175,372V233.055c4.765-2.647,8-7.728,8-13.555V211h17v8.5 c0,5.827,3.235,10.908,8,13.555V372H175z M143,372V235h17v137H143z M95,372V233.055c4.765-2.647,8-7.728,8-13.555V211h17v8.5 c0,5.827,3.235,10.908,8,13.555V372H95z M168,211v8.5c0,0.276-0.224,0.5-0.5,0.5h-32c-0.276,0-0.5-0.224-0.5-0.5V211H168z M248,211 v8.5c0,0.276-0.224,0.5-0.5,0.5h-32c-0.276,0-0.5-0.224-0.5-0.5V211H248z M328,211v8.5c0,0.276-0.224,0.5-0.5,0.5h-32 c-0.276,0-0.5-0.224-0.5-0.5V211H328z M15,151.852L231.5,28.138L448,151.852V164H15V151.852z M31,179h401v17H31V179z M88,211v8.5 c0,0.276-0.224,0.5-0.5,0.5h-32c-0.276,0-0.5-0.224-0.5-0.5V211H88z M63,235h17v137H63V235z M448,436H15v-17h433V436z M432,404H31 v-17h401V404z M383,372V235h17v137H383z">
                    </path>
                </g>
            </svg>
        </div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>