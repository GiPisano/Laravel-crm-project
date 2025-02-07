<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">➕ Aggiungi Azienda</h2>
    </x-slot>

    <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-bold">Nome</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mt-4">
            <label class="block font-bold">Partita IVA</label>
            <input type="text" name="vat_number" class="w-full border rounded p-2" required>
        </div>

        <div class="mt-4">
            <label class="block font-bold">Logo</label>
            <input type="file" name="logo" class="w-full border rounded p-2">
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salva</button>
            <a href="{{ route('companies.index') }}" class="text-gray-500 ml-4">Annulla</a>
        </div>
    </form>
</x-app-layout>
