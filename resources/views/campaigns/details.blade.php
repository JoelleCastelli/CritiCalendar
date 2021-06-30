<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de la campagne
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
                        <div>Nom : {{ $campaign->name }}</div>
                        <div>Description : {{ $campaign->description }}</div>
                        <div>Thème : {{ $campaign->theme->name }}</div>
                        <div>Maître du jeu : {{ $campaign->owner->name }}</div>
                    </div>
                    <div class="py-2 players">
                        Joueurs
                    </div>
                    <div class="py-2 campaign-sessions">
                        Sessions
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
