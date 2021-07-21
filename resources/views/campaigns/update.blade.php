<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Modifier une campagne
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'save_campaign']) !!}
                        {!! Form::hidden('campaign_id', $campaign->id) !!}
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', $campaign->name) !!}<br><br>
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::text('description', $campaign->description) !!}<br><br>
                        {!! Form::label('theme_id', 'Thème') !!}
                        {!! Form::select('theme_id', $themes, $campaign->theme_id) !!}<br><br>
                        {!! Form::submit('Valider') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
