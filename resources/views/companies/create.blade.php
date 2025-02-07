<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">➕ Aggiungi Azienda</h2>
    </x-slot>

    <form method="POST" action="{{ route('companies.store') }}" enctype="multipart/form-data"
        class="bg-white p-6 rounded shadow-md">
        @csrf

        {{-- Nome --}}
        <div>
            <label class="block font-bold">Nome</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        {{-- Partita IVA con validazione --}}
        <div class="mt-4">
            <label class="block font-bold">Partita IVA</label>
            <input type="text" name="vat_number" id="vat_number"
                class="w-full border rounded p-2 focus:ring focus:ring-blue-300" required maxlength="11"
                oninput="validateVat(this)">
            <p id="vat_error" class="text-red-500 text-sm hidden">La Partita IVA deve contenere esattamente 11 cifre.
            </p>
        </div>

        {{-- Logo Upload con Preview --}}
        <div class="mt-4">
            <label class="block font-bold">Logo</label>
            <input type="file" name="logo" id="logoInput" class="w-full border rounded p-2" accept="image/*"
                onchange="previewLogo(event)">
            <div class="mt-2">
                <img id="logoPreview" src="https://via.placeholder.com/150x150.png?text=Preview"
                    class="h-16 w-16 object-cover rounded-md border shadow hidden">
            </div>
        </div>

        {{-- Bottoni --}}
        <div class="mt-6">
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                💾 Salva
            </button>
            <a href="{{ route('companies.index') }}" class="text-gray-500 ml-4 hover:underline">Annulla</a>
        </div>
    </form>

    {{-- Script per Validazione e Preview Logo --}}
    <script>
        function validateVat(input) {
            const vatError = document.getElementById('vat_error');
            if (input.value.length !== 11 || isNaN(input.value)) {
                input.classList.add('border-red-500');
                vatError.classList.remove('hidden');
            } else {
                input.classList.remove('border-red-500');
                vatError.classList.add('hidden');
            }
        }

        function previewLogo(event) {
            const logoPreview = document.getElementById('logoPreview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    logoPreview.src = e.target.result;
                    logoPreview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
