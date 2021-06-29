<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{ __('Dashboard') }}
</h2>
</x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                Welcome wall !

                {!! Form::open(['route' => 'post']) !!}
                    {!! Form::text('username') !!}
                    {!! Form::submit('Post on the wall') !!}
                {!! Form::close() !!}

                @foreach ($posts as $post)
                    <ul>
                        <li>
                            {{ $post->content }} (<i>by {{ $post->user->name }}</i>)
                            [<a href="{{ route('update', $post->id) }}">update</a>]
                            [<a href="{{ route('delete', $post->id) }}">delete</a>]
                        </li>
                    </ul>
                @endforeach

            </div>
        </div>
    </div>
</div>
</x-app-layout>
