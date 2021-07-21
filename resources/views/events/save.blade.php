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
                        {!! Form::open(['route' => ['save_event', ['campaign_id' => $campaign->id]]]) !!}

                            {!! Form::hidden('campaign_id', $campaign->id) !!}<br><br>

                            {!! Form::label('title', 'Nom de la session') !!}
                            {!! Form::text('title') !!}<br><br>

                            {!! Form::label('start', 'Début de la session') !!}
                            <input type="datetime-local" name="start" value="{{ Carbon\Carbon::now()->format('Y-m-d\TH:i') }}">

                            {!! Form::label('end', 'Fin de la session') !!}
                            <input type="datetime-local" name="end" value="{{ Carbon\Carbon::now()->addDay(1)->format('Y-m-d\TH:i') }}"><br><br>

                            {!! Form::label('place', 'Lieu de la session') !!}
                            {!! Form::text('place') !!}<br><br>

                            {!! Form::label('URL', 'URL de la session') !!}
                            {!! Form::text('URL') !!}<br><br>

                            {!! Form::label('recap', 'Récapitulatif') !!}
                            {!! Form::textarea('recap') !!}<br><br>

                            {!! Form::submit('Créer la session') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

