<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="my-2">
                        <h3>Campagnes masterisées</h3>
                    </div>
                    <div class="my-2">
                        {{ $data['gmCount'] }}
                    </div>
                    <div class="my-2">
                        <div class="btn btn-primary btn-sm">
                            <a href="{{ route('campaigns') }}">Voir mes campagnes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="my-2">
                        <h3>Prochaine session</h3>
                    </div>
                    <div class="my-2">
                        ///
                    </div>
                    <div class="my-2">
                        <div class="btn btn-primary btn-sm">
                            <a href="">Voir la campagne</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="my-2">
                        <h3>Campagnes jouées</h3>
                    </div>
                    <div class="my-2">
                        {{ $data['charactersCount'] }}
                    </div>
                    <div class="my-2">
                        <div class="btn btn-primary btn-sm">
                            <a href="{{ route('characters') }}">Voir mes personnages</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="my-2">
                        <h3>Invitations en attente</h3>
                    </div>
                    <div class="my-2">
                        {{ $data['invitationsCount'] }}
                    </div>
                    <div class="my-2">
                        <div class="btn btn-primary btn-sm">
                            <a href="{{ route('invitations_list') }}">Voir mes invitations</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @if(Auth::user()->admin == 1)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 bg-white border-b border-gray-200 text-center">
                    <h3>Panneau d'administration</h3>
                </div>
            </div>
        </div>

        <div class="my-4">
            <div class="grid grid-flow-col grid-cols-2 grid-rows-2 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-center">
                        <div class="my-2">
                            <h3>Total d'utilisateurs</h3>
                        </div>
                        <div class="my-2">
                            {{ $adminData['totalUsers'] }}
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-center">
                        <div class="my-2">
                            <h3>Total de campagnes</h3>
                        </div>
                        <div class="my-2">
                            {{ $adminData['totalCampaigns'] }}
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-center">
                        <div class="my-2">
                            <h3>Total de personnages</h3>
                        </div>
                        <div class="my-2">
                            {{ $adminData['totalCharacters'] }}
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 text-center">
                        <div class="my-2">
                            <h3>Total de sessions</h3>
                        </div>
                        <div class="my-2">
                            {{ $adminData['totalSessions'] }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endif
</x-app-layout>
