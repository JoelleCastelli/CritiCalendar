<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Invitations
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Mes invitations en attente</h3>
                    @if($invitations->count() > 0)
                        @foreach ($invitations as $invitation)
                            <div class="py-2">
                                <div class="py-2">
                                    <div><b>Nom :</b> {{ $invitation->campaign->name }}</div>
                                    <div><b>Description :</b> {{ $invitation->campaign->description }}</div>
                                    <div><b>Thème :</b> {{ $invitation->campaign->theme->name }}</div>
                                    <div class="my-2">
                                        <div class="btn btn-sm btn-primary">
                                            <a href="{{ route('accept_invitation', $invitation->id) }}">Accepter</a>
                                        </div>
                                        <div class="btn btn-sm btn-danger">
                                            <a href="{{ route('decline_invitation', $invitation->id) }}">Refuser</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $invitations->links() }}
                    @else
                        <p>Vous n'avez aucune invitation en attente</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
