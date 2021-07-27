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
                    <div class="campaign-details pt-3">
                        <div><b>Nom :</b> {{ $campaign->name }}</div>
                        <div><b>Description :</b> {{ $campaign->description }}</div>
                        <div><b>Thème :</b> {{ $campaign->theme->name }}</div>
                        <div><b>Maître du jeu :</b> {{ $campaign->owner->name }}</div>
                        @if($campaign->master_id == Auth::user()->id)
                            <div class="btn btn-sm btn-danger my-2">
                                <a onclick="return confirm('Voulez-vous vraiment supprimer cette campagne ? Toutes les ' +
                                     'sessions et personnages associés seront supprimés.')" href="{{ route('delete_campaign', $campaign->id) }}">
                                    Supprimer la campagne
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="py-3 players">
                        <b>Inviter des joueurs</b>
                        {!! Form::open(['route' => 'send_invite']) !!}
                            {!! Form::hidden('campaign_id', $campaign->id) !!}
                            {!! Form::label('email', 'Adresse e-mail') !!}
                            {!! Form::text('email') !!}
                            {!! Form::submit("Envoyer l'invitation") !!}
                        {!! Form::close() !!}

                        {{--Invitations--}}
                        @if($campaign->invitations->count() > 0)
                            <div class="py-6">
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
                                            <div class="my-1">
                                                <div class="btn btn-sm btn-primary">
                                                    <a href="{{ route('send_invite_again', ['campaign_id'=>$campaign->id, 'email'=>$invitation->email]) }}">Renvoyer l'invitation</a>
                                                </div>
                                                <div class="btn btn-sm btn-danger">
                                                    <a href="{{ route('delete_invite', ['campaign_id'=>$campaign->id, 'email'=>$invitation->email]) }}">Supprimer l'invitation</a>
                                                </div>
                                            </div>
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
                                        <div class="my-1">
                                            <div class="btn btn-sm btn-danger">
                                                <a onclick="return confirm('Voulez-vous vraiment supprimer ce personnage ?')"
                                                   href="{{ route('remove_character', ['campaign_id' => $campaign->id, 'character_id' => $character->id]) }}">
                                                    Retirer le joueur
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    {{--Sessions--}}
                    <h3>Sessions</h3>
                    @if($events->count() > 0)
                        <div class="py-3 campaign-sessions">
                            @foreach ($events as $event)
                                <div class="py-2">
                                    <div><b>Nom :</b> {{ $event->title }}</div>
                                    <div><b>Date du début :</b> {{ date('d/m/Y à H:i', strtotime($event->start)) }}</div>
                                    <div><b>Date de fin :</b> {{ date('d/m/Y à H:i', strtotime($event->end)) }}</div>
                                    <div><b>Lieu :</b> {{ $event->place ?? " / " }}</div>
                                    <div><b>URL :</b> {{ $event->url ?? " / " }}</div>
                                    <div><b>Récapitulatif :</b> {{ $event->recap ?? " / " }}</div>
                                </div>
                                <div class="btn btn-sm btn-secondary">
                                    <a href="{{ route('display_event', ['campaign_id' => $campaign->id, 'event_id' => $event->id_event]) }}">
                                        Modifier
                                    </a>
                                </div>
                                <div class="btn btn-sm btn-danger">
                                    <a href="{{ route('delete_event', ['campaign_id' => $campaign->id, 'event_id' => $event->id_event]) }}">
                                        Supprimer
                                    </a>
                                </div>
                            @endforeach
                            {{ $events->links() }}

                        </div>
                    @else
                        <p class="py-2">Aucune session</p>
                    @endif


                     <div class="btn btn-sm btn-primary">
                        <a href="{{ route('display_event', ['campaign_id' => $campaign->id]) }}">
                            Ajouter une session
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
