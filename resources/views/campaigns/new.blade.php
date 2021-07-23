<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Créer une nouvelle campagne
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {!! Form::open(['route' => 'save_campaign']) !!}
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name') !!}<br><br>
                        {!! Form::label('theme_id', 'Thème') !!}
                        {!! Form::select('theme_id', $themes) !!}<br><br>
                        {!! Form::label('description', 'Description') !!}<br>
                        {!! Form::textarea('description') !!}<br><br>
                        {!! Form::submit('Valider') !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
