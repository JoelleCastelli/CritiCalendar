<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste de mes personnages
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
                    <div class="characters-list">
                        <div>
                            
                            <div style="font-weight: bold">Nom du personnage</div>
                            @foreach ($characters as $character)
                                <a href="{{ route('my-character', ['campaign_id' => $character->campaign_id, 'player_id' => Auth::user()->id ])  }}">{{ $character->name }}</a>
                                <div style="font-weight: bold">La campagne associée</div>
                                <div>
                                    <div><b>Nom :</b> {{ $character->campaign->name }}</div>
                                    <div><b>Description :</b> {{ $character->campaign->description }}</div>
                                    <div><b>Thème :</b> {{ $character->campaign->theme->name }}</div>
                                    <div><b>Maître du jeu :</b> {{ $character->campaign->owner->name }}</div>
                                </div>
                                <br>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>