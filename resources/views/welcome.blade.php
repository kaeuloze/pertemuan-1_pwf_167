<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Biodata - Mariska Esa Purnomo</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] flex items-center justify-center min-h-screen p-6">
        
        <main class="w-full max-w-sm">
            <div class="bg-white dark:bg-[#161615] p-8 shadow-[0px_10px_30px_rgba(0,0,0,0.04)] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.12)] dark:shadow-[inset_0px_0px_0px_1px_rgba(255,255,237,0.1)] rounded-3xl transition-all">
                
                <div class="flex justify-center mb-6">
                    <div class="w-12 h-12 bg-[#1b1b18] dark:bg-[#eeeeec] rounded-2xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white dark:text-[#1C1C1A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <h1 class="text-lg font-bold tracking-tight uppercase">Data Mahasiswa</h1>
                    <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Pemrograman Web Framework</p>
                </div>
                
                <div class="space-y-6">
                    <div class="group">
                        <span class="text-[11px] font-bold text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-[0.1em]">Nama Lengkap</span>
                        <p class="text-[15px] font-semibold mt-1 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">Mariska Esa Purnomo</p>
                    </div>

                    <div class="group">
                        <span class="text-[11px] font-bold text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-[0.1em]">Nomor Induk Mahasiswa</span>
                        <p class="text-[15px] font-semibold mt-1 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">20230140167</p>
                    </div>

                    <div class="group">
                        <span class="text-[11px] font-bold text-[#706f6c] dark:text-[#A1A09A] uppercase tracking-[0.1em]">Kelas</span>
                        <p class="text-[15px] font-semibold mt-1 border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">PWF C</p>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="#" class="flex items-center justify-center gap-2 w-full py-3 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-xl font-bold text-sm shadow-md transition-transform active:scale-95">
                        <span>Modul Pertemuan 1</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

            </div>

            <p class="text-center mt-6 text-[11px] text-[#706f6c] dark:text-[#A1A09A] font-medium uppercase tracking-widest">
                Laravel &bull; Tailwind CSS
            </p>
        </main>

    </body>
</html>