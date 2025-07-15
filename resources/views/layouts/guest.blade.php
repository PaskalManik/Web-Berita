<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita SDGs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body class="bg-gray-100 font-sans">

    <header class="relative overflow-hidden bg-black min-h-[200px] md:min-h-[300px]">
        <div class="absolute inset-0">
            <img src="{{ asset('images/header.png') }}" alt="Gambar Header" class="h-full w-full object-cover object-right">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#14532D] via-[#16A34A]/80 to-transparent"></div>
        <div class="container mx-auto px-6 py-12 md:py-16 relative z-10 text-white">
            <p class="text-sm font-light flex items-center gap-2">
                <a href="{{ route('home') }}" title="Home" class="hover:flex items-center">
                    <span class="material-symbols-outlined">home</span>
                </a>
                <span class="text-gray-300">></span>
                <span>Activities</span>
                <span class="text-gray-300">></span>
                <span>News</span>
            </p>
            <h1 class="text-4xl md:text-5xl font-bold mt-2">Berita SDGs</h1>
        </div>
    </header>

    <main class="container mx-auto p-6">
        {{ $slot }}
    </main>

</body>
</html>