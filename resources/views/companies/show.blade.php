@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">🏢 Dettaglio Azienda</h2>
@endsection

@section('content')
    <div class="mb-4">
        <a href="{{ url()->previous() }}"
            class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600 transition">⬅️ Torna indietro</a>
    </div>
    <div class="bg-white shadow-md rounded p-6">
        <h3 class="text-2xl font-bold mb-4">{{ $company->name }}</h3>
        <p><strong>Partita IVA:</strong> {{ $company->vat_number }}</p>

        <div class="mt-4">
            @if ($company->logo && !str_contains($company->logo, 'dicebear.com'))
                <img src="{{ asset('storage/' . $company->logo) }}" class="h-16 w-16 object-cover rounded-md border shadow"
                    alt="Company Logo">
            @else
                <img src="https://api.dicebear.com/7.x/identicon/svg?seed={{ urlencode($company->name) }}"
                    class="h-16 w-16 object-cover rounded-md border shadow" alt="Company Placeholder Logo">
            @endif
        </div>

        @if ($company->employees->isNotEmpty())
            <h3 class="text-xl font-semibold mt-6">👥 Dipendenti</h3>
            <table class="w-full bg-white shadow-md rounded overflow-hidden mt-4">
                <thead>
                    <tr class="bg-gray-200 text-left text-gray-700 uppercase text-sm">
                        <th class="p-3">Nome</th>
                        <th class="p-3">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company->employees as $employee)
                        <tr class="border-b hover:bg-gray-100 transition">
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->first_name }}
                                {{ $employee->last_name }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $employee->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-4 text-gray-600">❌ Non ci sono ancora dipendenti.</p>
        @endif
    </div>
@endsection
