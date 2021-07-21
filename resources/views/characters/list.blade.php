<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mes personnages
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="characters-list">
                        @foreach ($characters as $character)
                            <div class="py-3 border-b border-gray-200">
                                <div><b>Nom du personnage :</b> {!! $character->name ?? "<i>Personnage sans nom</i>" !!}</div>
                                <div>
                                    <b>Campagne : </b> {{ $character->campaign->name }}
                                    <div>
                                        <div><b>Description :</b> {{ $character->campaign->description }}</div>
                                        <div><b>Thème :</b> {{ $character->campaign->theme->name }}</div>
                                        <div><b>Maître du jeu :</b> {{ $character->campaign->owner->name }}</div>
                                    </div>
                                </div>
                                <div class="btn btn-sm btn-primary my-2">
                                    <a href="{{ route('my-character', ['campaign_id' => $character->campaign_id, 'player_id' => Auth::user()->id ])  }}">
                                        Modifier
                                    </a>
                                </div>
                                <div class="btn btn-sm btn-secondary">
                                    <a href="{{ route('details_campaign', $character->campaign->id) }}">
                                        Voir la campagne
                                    </a>
                                </div>
                                <div class="btn btn-sm btn-danger">
                                    <a onclick="return confirm('Voulez-vous vraiment supprimer le personnage ? Vous quitterez alors la campagne.')"
                                       href="{{ route('delete_character', $character->id) }}">
                                        Supprimer
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        {{ $characters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
