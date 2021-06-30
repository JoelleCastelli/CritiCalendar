<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Campagnes
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
                    <h3>Campagnes Maître du Jeu</h3>
                    @foreach ($campaigns as $campaign)
                        <div class="py-2">
                            <div><b>Nom :</b> {{ $campaign->name }}</div>
                            <div><b>Description :</b> {{ $campaign->description }}</div>
                            <div><b>Thème :</b> {{ $campaign->theme->name }}</div>
                            <div>[<a href="{{ route('update_campaign', $campaign->id) }}">Modifier</a>]</div>
                        </div>
                    @endforeach
                    <a href="{{ route('new_campaign') }}">Créer une nouvelle campagne</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Campagnes Joueur</h3>

                    @foreach ($campaigns as $campaign)
                        <div class="py-2">
                            <div><b>Nom :</b> {{ $campaign->name }}</div>
                            <div><b>Description :</b> {{ $campaign->description }}</div>
                            <div><b>Thème :</b> {{ $campaign->theme->name }}</div>
                            <div><b>Maître du jeu :</b> {{ $campaign->owner->name }}</div>
                            <div>[<a href="{{ route('update_campaign', $campaign->id) }}">Modifier</a>]</div>
                        </div>
                    @endforeach
                    {{--{{ $films->links() }}--}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
