<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Berita SDGs' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <header class="relative overflow-hidden bg-black min-h-[100px] md:min-h-[300px]">
    <div class="absolute inset-0">
        <img src="{{ asset('images/header.png') }}" alt="gambar header" 
        class="object-contain object-right w-full h-full">
    </div>

    <div class="absolute inset-0 bg-gradient-to-r from-[#14532D] via-[#14532D] to-transparent"></div>

    <div class="container relative z-10 px-6 py-12 mx-auto md:py-16 text-white">
        <p class="flex items-center gap-2 text-sm font-light">
            <a href="{{ route('home') }}" title="Home" class="hover:flex items-center">
                <span class="material-symbols-outlined">home</span>
            </a>
            <span class="text-gray-300">></span>
            <span>News</span>
        </p>
        <h1 class="mt-2 text-4xl font-bold md:text-5xl">Berita SDGs</h1>
    </div>
</header>

    <main class="container mx-auto p-6">
        {{ $slot }}
    </main>
    

    @stack('scripts')
</body>
</html>