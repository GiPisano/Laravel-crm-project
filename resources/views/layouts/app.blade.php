<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen flex overflow-hidden bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-800 text-white h-screen p-5 flex-shrink-0">
        <h2 class="text-2xl font-bold mb-5">CRM</h2>
        <div class="py-6">
            <a href="{{ route('companies.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">➕ Aggiungi
                Azienda</a>
        </div>
        <ul>
            <li class="mb-3"><a href="{{ route('dashboard') }}" class="hover:underline">🏠 Dashboard</a></li>
            <li class="mb-3"><a href="{{ route('companies.index') }}" class="hover:underline">🏢 Aziende</a></li>
            <li class="mb-3"><a href="{{ route('employees.index') }}" class="hover:underline">👥 Impiegati</a></li>
            <li class="mt-10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-400 hover:underline">🚪 Logout</button>
                </form>
            </li>

        </ul>
    </aside>

    {{-- Contenuto Principale (che scorre) --}}
    <main class="flex-1 p-4 overflow-y-auto">
        {{ $slot }}
    </main>

</body>

</html>
