<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">📂 Aziende</h2>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-3">Nome</th>
                <th class="p-3">Partita IVA</th>
                <th class="p-3">Logo</th>
                <th class="p-3">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr class="border-b">
                    <td class="p-3">{{ $company->name }}</td>
                    <td class="p-3">{{ $company->vat_number }}</td>
                    <td class="p-3">
                        @if ($company->logo)
                            <img src="https://api.dicebear.com/7.x/identicon/svg?seed={{ urlencode($company->name) }}"
                                class="h-10" alt="Company Logo">
                        @endif
                    </td>
                    <td class="p-3">
                        <a href="{{ route('companies.edit', $company) }}" class="text-blue-500">✏️ Modifica</a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500">❌ Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $companies->links() }}</div>
</x-app-layout>
