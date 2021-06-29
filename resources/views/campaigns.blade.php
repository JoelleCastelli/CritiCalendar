<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
Campagnes
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
                Liste des campagnes

                @foreach ($campaigns as $campaign)
                    <ul>
                        <li>
                            {{ $campaign->name }}
                        </li>
                    </ul>
                @endforeach

                {{--{{ $films->links() }}--}}

            </div>
        </div>
    </div>
</div>
</x-app-layout>
