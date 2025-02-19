@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lista Dipendenti</h1>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Nome</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Azienda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $employee->email }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($employee->company)
                            <a href="{{ route('companies.show', $employee->company) }}"
                                class="text-blue-500 hover:underline">
                                {{ $employee->company->name }}
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $employees->links() }}</div>
@endsection
