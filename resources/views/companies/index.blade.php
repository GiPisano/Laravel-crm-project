@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">📂 Aziende</h2>
@endsection

@section('content')
    @if (session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded shadow-md">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white shadow-md rounded overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left text-gray-700 uppercase text-sm">
                <th class="p-3">Nome</th>
                <th class="p-3">Partita IVA</th>
                <th class="p-3">Logo</th>
                <th class="p-3 text-center">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr class="border-b hover:bg-gray-100 transition">
                    <td class="p-3">{{ $company->name }}</td>
                    <td class="p-3">{{ $company->vat_number }}</td>
                    <td class="p-3">
                        @if ($company->logo && !str_contains($company->logo, 'dicebear.com'))
                            <!-- Se il logo è stato caricato manualmente, mostriamo quello -->
                            <img src="{{ asset('storage/' . $company->logo) }}"
                                class="h-16 w-16 object-cover rounded-md border shadow" alt="Company Logo">
                        @else
                            <!-- Altrimenti usiamo DiceBear -->
                            <img src="https://api.dicebear.com/7.x/identicon/svg?seed={{ urlencode($company->name) }}"
                                class="h-16 w-16 object-cover rounded-md border shadow" alt="Company Placeholder Logo">
                        @endif
                    </td>
                    <td class="p-3 flex items-center justify-center gap-2">
                        <a href="{{ route('companies.show', $company) }}"
                            class="px-3 py-2 bg-green-500 text-white rounded-lg shadow hover:bg-green-600 transition flex items-center gap-1">
                            👁️ <span class="hidden sm:inline">View</span>
                        </a>
                        <a href="{{ route('companies.edit', $company) }}"
                            class="px-3 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition flex items-center gap-1">
                            ✏️ <span class="hidden sm:inline">Edit</span>
                        </a>
                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit"
                                class="px-3 py-2 bg-red-500 text-white rounded-lg shadow hover:bg-red-600 transition flex items-center gap-1">
                                ❌ <span class="hidden sm:inline">Delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $companies->links() }}</div>
@endsection
