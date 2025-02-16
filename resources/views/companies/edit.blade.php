@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">✏️ Modifica Azienda</h2>

    <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div>
            <label class="block font-bold mb-1">Nome</label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}" class="w-full border rounded p-2"
                required>
        </div>

        {{-- VAT Number --}}
        <div class="mt-4">
            <label class="block font-bold mb-1">Partita IVA</label>
            <input type="text" name="vat_number" value="{{ old('vat_number', $company->vat_number) }}"
                class="w-full border rounded p-2 vat-input" required>
            <p class="text-red-500 text-sm mt-1 hidden vat-error">La Partita IVA deve contenere esattamente 11 cifre.</p>
        </div>

        {{-- Logo Preview & Upload --}}
        <div class="mt-4">
            <label class="block font-bold mb-1">Logo</label>
            @if ($company->logo && !str_contains($company->logo, 'dicebear.com'))
                <img src="{{ asset('storage/' . $company->logo) }}" class="h-16 w-16 object-cover rounded-md border shadow"
                    alt="Company Logo">
            @else
                <img src="https://api.dicebear.com/7.x/identicon/svg?seed={{ urlencode($company->name) }}"
                    class="h-16 w-16 object-cover rounded-md border shadow" alt="Company Placeholder Logo">
            @endif
            <input type="file" name="logo" class="w-full border rounded p-2">
        </div>

        {{-- Buttons --}}
        <div class="mt-6 flex items-center gap-4">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded shadow hover:bg-green-600 transition">
                💾 Salva
            </button>
            <a href="{{ route('companies.index') }}" class="text-gray-500 hover:underline">Annulla</a>
        </div>
    </form>

    {{-- JavaScript for VAT validation --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const vatInput = document.querySelector(".vat-input");
            const errorMsg = document.querySelector(".vat-error");

            vatInput.addEventListener("input", function() {
                if (vatInput.value.length !== 11 || isNaN(vatInput.value)) {
                    vatInput.classList.add("border-red-500");
                    errorMsg.classList.remove("hidden");
                } else {
                    vatInput.classList.remove("border-red-500");
                    errorMsg.classList.add("hidden");
                }
            });
        });
    </script>
@endsection
