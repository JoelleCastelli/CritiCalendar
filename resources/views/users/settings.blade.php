<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Paramètres
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="my-4">
        <div class="grid grid-flow-col grid-cols-2 grid-rows-1 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="my-2">
                        <h3>Modifier les informations</h3>
                    </div>
                    <div class="my-2">
                        {!! Form::open(['route' => 'save_settings']) !!}
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', Auth::user()->name) !!}<br><br>
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', Auth::user()->email) !!}<br><br>
                        {!! Form::submit('Valider') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <div class="my-2">
                        <h3>Modifier le mot de passe</h3>
                    </div>
                    <div class="my-2">
                        {!! Form::open(['route' => 'save_password']) !!}
                        {!! Form::hidden('user_id', Auth::user()->id) !!}
                        {!! Form::label('current_password', 'Mot de passe actuel') !!}
                        {!! Form::password('current_password') !!}<br><br>
                        {!! Form::label('password', 'Nouveau mot de passe') !!}
                        {!! Form::password('password') !!}<br><br>
                        {!! Form::label('password_confirmation', 'Confirmation du nouveau mot de passe') !!}
                        {!! Form::password('password_confirmation') !!}<br><br>
                        {!! Form::submit('Valider') !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
