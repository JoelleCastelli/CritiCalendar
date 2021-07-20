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

                <h2> Calendrier des sessions </h2>
                <script src="{{asset('vendor/livewire/livewire.js')}}"></script>
                <livewire:calendar />

                @stack('scripts')


            </div>
        </div>
    </div>
</div>

</x-app-layout>
