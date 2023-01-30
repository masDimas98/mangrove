<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Monitoring') }} --}}
            @include('components/breadscrumbs')
        </h2>
    </x-slot>


    <x-slot name="js">
    </x-slot>
</x-app-layout>
