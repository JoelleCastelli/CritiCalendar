<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de mon personnage
        </h2>
    </x-slot>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="campaign-details">
                        <div>Nom : {{ $character->name }}</div>
                    </div>
                    <div class="py-2 character-charasteristics">
                        <h3>Caractéristiques</h3>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>