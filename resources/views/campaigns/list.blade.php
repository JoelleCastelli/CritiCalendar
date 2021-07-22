<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Campagnes
</h2>
</x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Campagnes masterisées</h3>
                    @if($ownedCampaigns->count() > 0)
                        @foreach ($ownedCampaigns as $campaign)
                            <div class="py-2 border-b border-gray-200">
                                <div><b>Nom :</b> {{ $campaign->name }}</div>
                                <div><b>Description :</b> {{ $campaign->description }}</div>
                                <div><b>Thème :</b> {{ $campaign->theme->name }}</div>
                                <div class="my-2">
                                    <div class="btn btn-sm btn-primary">
                                        <a href="{{ route('details_campaign', $campaign->id) }}">Consulter</a>
                                    </div>
                                    <div class="btn btn-sm btn-secondary">
                                        <a href="{{ route('update_campaign', $campaign->id) }}">Modifier</a>
                                    </div>
                                    <div class="btn btn-sm btn-danger">
                                        <a onclick="return confirm('Voulez-vous vraiment supprimer cette campagne ? Toutes les ' +
                                     'sessions et personnages associés seront supprimés.')" href="{{ route('delete_campaign', $campaign->id) }}">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $ownedCampaigns->links() }}
                    @else
                        <p class="mt-3">Vous ne masterisez aucune campagne</p>
                    @endif
                    <div class="btn btn-sm btn-primary mt-3">
                        <a href="{{ route('new_campaign') }}">Créer une nouvelle campagne</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Campagnes jouées</h3>
                    @if($characters->count() > 0)
                        @foreach ($characters as $character)
                            <div class="py-2 border-b border-gray-200">
                                <div><b>Nom :</b> {{ $character->campaign->name }}</div>
                                <div><b>Description :</b> {{ $character->campaign->description }}</div>
                                <div><b>Thème :</b> {{ $character->campaign->theme->name }}</div>
                                <div><b>Maître du jeu :</b> {{ $character->campaign->owner->name }}</div>
                                 <div class="my-2">
                                     <div class="btn btn-sm btn-primary">
                                         <a href="{{ route('details_campaign', $character->campaign->id) }}">Consulter la campagne</a>
                                     </div>
                                     <div class="btn btn-sm btn-secondary">
                                         <a href="{{ route('my-character', ['campaign_id' => $character->campaign->id, 'player_id' => Auth::user()->id ]) }}">Voir mon personnage</a>
                                     </div>
                                     <div class="btn btn-sm btn-danger">
                                         <a onclick="return confirm('Voulez-vous vraiment quitter la campagne?')" href="{{ route('delete_character', $character->id) }}">Quitter la campagne</a>
                                     </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $characters->links() }}
                    @else
                        <p class="mt-3">Vous ne participez à aucune campagne</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
