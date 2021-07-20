<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Détails de mon personnage
        </h2>
    </x-slot>

    @include('components.flash')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                {!! Form::open([ 'route' => ['update_character', $character->id]] ) !!}
                    <div class="character-details">
                        <div>
                            {!! Form::label('name', 'Nom du personnage') !!}
                            {!! Form::text('name', $character->name) !!}<br><br>
                        </div>
                    </div>
                    <div class="py-2 character-charasteristics">
                        <h3>Caractéristiques</h3>
                    </div>
                        {!! Form::hidden('character_id', $character->id) !!}

                        {!! Form::label('ancestry', 'Ancêtre') !!}
                        {!! Form::text('ancestry', $character->ancestry) !!}<br><br>

                        {!! Form::label('class', 'Classe') !!}
                        {!! Form::text('class', $character->class) !!}<br><br>

                        {!! Form::label('alignment', 'Alignement') !!}
                        {!! Form::text('alignment', $character->alignment) !!}<br><br>

                        {!! Form::label('level', 'Niveau') !!}
                        {!! Form::number('level', $character->level) !!}<br><br>

                        {!! Form::label('XP', 'XP') !!}
                        {!! Form::number('XP', $character->XP) !!}<br><br>

                        {!! Form::label('HP', 'HP') !!}
                        {!! Form::number('HP', $character->HP) !!}<br><br>

                        {!! Form::label('strength', 'Force') !!}
                        {!! Form::number('strength', $character->strength) !!}<br><br>

                        {!! Form::label('initiative', 'Initiative') !!}
                        {!! Form::number('initiative', $character->initiative) !!}<br><br>

                        {!! Form::label('speed', 'Vitesse') !!}
                        {!! Form::number('speed', $character->speed) !!}<br><br>

                        {!! Form::label('dexterity', 'Dexterité') !!}
                        {!! Form::number('dexterity', $character->dexterity) !!}<br><br>

                        {!! Form::label('constitution', 'Constitution') !!}
                        {!! Form::number('constitution', $character->constitution) !!}<br><br>

                        {!! Form::label('intelligence', 'Intelligence') !!}
                        {!! Form::number('intelligence', $character->intelligence) !!}<br><br>

                        {!! Form::label('wisdom', 'Sagesse') !!}
                        {!! Form::number('wisdom', $character->wisdom) !!}<br><br>

                        {!! Form::label('charisma', 'Charisme') !!}
                        {!! Form::number('charisma', $character->charisma) !!}<br><br>

                        {!! Form::label('attacks', 'Attaque') !!}
                        {!! Form::text('attacks', $character->attacks) !!}<br><br>

                        {!! Form::label('languages', 'Langages') !!}
                        {!! Form::text('languages', $character->languages) !!}<br><br>

                        {!! Form::label('equipment', 'Equipement') !!}
                        {!! Form::text('equipment', $character->equipment) !!}<br><br>

                        {!! Form::submit('Modifier') !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
