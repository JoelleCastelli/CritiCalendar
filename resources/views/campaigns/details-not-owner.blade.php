<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de la campagne
        </h2>
    </x-slot>

   @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="campaign-details py-3">
                        <div><b>Nom :</b> {{ $campaign->name }}</div>
                        <div><b>Description :</b> {{ $campaign->description }}</div>
                        <div><b>Thème :</b> {{ $campaign->theme->name }}</div>
                        <div><b>Maître du jeu :</b> {{ $campaign->owner->name }}</div>
                    </div>
                    <div class="py-3 players">
                        {{--Invitations--}}
                        @if($campaign->invitations->count() > 0)
                            <div>
                                <b>Invitations en attente :</b>
                                <ul style="list-style: inside;">
                                    @foreach ($campaign->invitations as $invitation)
                                        <li>
                                            @if($invitation->user_id)
                                                {{ \App\Models\User::find($invitation->user_id)->name }}
                                                ({{ $invitation->email }})
                                            @else
                                                {{ $invitation->email }}
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--Characters and players--}}
                        @if($campaign->characters->count() > 0)
                            <b>Joueurs :</b>
                            <ul style="list-style: inside;">
                                @foreach ($campaign->characters as $character)
                                    <li>
                                        {!! $character->name ?? "<i>Personnage sans nom</i>" !!} (joué par {{ $character->player->name }})
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="py-3 campaign-sessions">
                        <h3>Sessions</h3>
                        @foreach ($campaign->events as $event)
                            <div class="py-2">
                                <div><b>Nom :</b> {{ $event->title }}</div>
                                <div><b>Date du début :</b> {{ date('d/m/Y H:i', strtotime($event->start)) }}</div>
                                <div><b>Date de fin :</b> {{ date('d/m/Y H:i', strtotime($event->end)) }}</div>
                                <div><b>Récapitulatif :</b> {{ $event->recap }}</div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
