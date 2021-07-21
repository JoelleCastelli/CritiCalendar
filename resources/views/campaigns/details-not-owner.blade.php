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
                        <b>Les joueurs invités</b>
                        {{--Invitations--}}
                        @if($campaign->invitations->count() > 0)
                            <div>
                                <b>Invitations en attente :</b>
                                @foreach ($campaign->invitations as $invitation)
                                    <div>
                                        @if($invitation->user_id)
                                            {{ \App\Models\User::find($invitation->user_id)->name }}
                                            ({{ $invitation->email }})
                                        @else
                                            {{ $invitation->email }}
                                        @endif
                                        <div class="btn btn-sm btn-primary">
                                            <a href="{{ route('send_invite_again', ['campaign_id'=>$campaign->id, 'email'=>$invitation->email]) }}">Renvoyer l'invitation</a>
                                        </div>
                                        <div class="btn btn-sm btn-danger">
                                            <a href="{{ route('delete_invite', ['campaign_id'=>$campaign->id, 'email'=>$invitation->email]) }}">Supprimer l'invitation</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{--Characters and players--}}
                        @if($campaign->characters->count() > 0)
                            <b>Joueurs :</b>
                            @foreach ($campaign->characters as $character)
                                <div>{{ $character->name }} (joué par {{ $character->player->name }})</div>
                            @endforeach
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