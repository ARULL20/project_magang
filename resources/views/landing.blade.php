<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-100 via-white to-emerald-100 flex flex-col">
    {{-- Hero Section --}}
    <header class="w-full text-center py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 tracking-tight">
            Aplikasi <span class="text-indigo-600">Kunjungan</span> & <span class="text-emerald-600">Pengajuan Zoom</span>
        </h1>
        <p class="mt-3 text-gray-500">Kelola kunjungan dan permintaan Zoom dengan mudah dan cepat</p>
    </header>

    {{-- Card Section --}}
    <main class="flex-grow flex items-center justify-center px-4">
        <div class="bg-white/90 backdrop-blur shadow-xl rounded-2xl p-8 w-full max-w-md text-center border border-gray-100">
            <div class="space-y-4">
                @auth
                    {{-- Sudah login --}}
                    @if(auth()->user()->role === 'admin')
                        <a href="/admin"
                           class="block w-full px-4 py-3 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-colors duration-200 focus:ring-2 focus:ring-indigo-300">
                            📊 Dashboard Admin
                        </a>
                    @elseif(auth()->user()->role === 'pegawai')
                        <a href="/pegawai"
                           class="block w-full px-4 py-3 text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition-colors duration-200 focus:ring-2 focus:ring-emerald-300">
                            📋 Dashboard Pegawai
                        </a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="pt-2">
                        @csrf
                        <button type="submit"
                                class="w-full px-4 py-3 text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors duration-200">
                            🔒 Logout
                        </button>
                    </form>
                @else
                    {{-- Belum login --}}
                    <a href="/admin/login"
                       class="block w-full px-4 py-3 text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-colors duration-200 focus:ring-2 focus:ring-indigo-300">
                       🔑 Login Admin
                    </a>
                    <a href="/pegawai/login"
                       class="block w-full px-4 py-3 text-white bg-emerald-600 rounded-xl hover:bg-emerald-700 transition-colors duration-200 focus:ring-2 focus:ring-emerald-300">
                       👤 Login Pegawai
                    </a>
                @endauth
            </div>

            {{-- Footer --}}
            <div class="mt-8 text-xs text-gray-400">
                &copy; {{ date('Y') }} Diskominfo &mdash; <span class="font-medium">Laravel + Filament</span>
            </div>
        </div>
    </main>

    {{-- Optional Wave/Footer Decoration --}}
    <footer class="text-center py-4 text-gray-400 text-sm">
        Dibuat dengan ❤️ oleh Zuharul Habib
    </footer>
</body>
</html>
