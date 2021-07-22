<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer une session
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <p>
                            <h2 style="font-weight:bold" >Nom de la campagne : </h2>
                            {!! $campaign->name !!}

                            <h2 style="font-weight:bold" >Description : </h2>
                            {!! Str::limit($campaign->description, 50) !!}
                        </p>
                    </div>
                    <div class="session-create">
                        {!! Form::open(['route' => ['save_event', ['campaign_id' => $campaign->id, 'event_id' => $event->id_event ?? '']]]) !!}

                            {!! Form::hidden('campaign_id', $campaign->id) !!}<br><br>

                            {!! Form::label('title', 'Nom de la session') !!}
                            {!! Form::text('title', $event->title ?? '') !!}<br><br>

                            {!! Form::label('start', 'Début de la session') !!}
                            <input type="datetime-local" name="start" value="{{ !empty($event->start) ? Carbon\Carbon::createFromTimeString($event->start)->format('Y-m-d\TH:s') : Carbon\Carbon::now()->format('Y-m-d\TH:s') }}">
                            <br><br>
                            {!! Form::label('end', 'Fin de la session') !!}
                            <input type="datetime-local" name="end" value="{{ !empty($event->end) ? Carbon\Carbon::createFromTimeString($event->end)->format('Y-m-d\TH:s') : Carbon\Carbon::now()->format('Y-m-d\TH:s') }}"><br><br>

                            {!! Form::label('place', 'Lieu de la session') !!}
                            {!! Form::text('place', $event->place ?? '' ) !!}<br><br>

                            {!! Form::label('URL', 'URL de la session') !!}
                            {!! Form::text('URL', $event->URL ?? '') !!}<br><br>

                            {!! Form::label('recap', 'Récapitulatif') !!}<br>
                            {!! Form::textarea('recap', $event->recap ?? '') !!}<br><br>

                            {!! Form::submit('Valider') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

