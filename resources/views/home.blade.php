<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Home
        </h2>
    </x-slot>
    <!-- <div id="map"></div> -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @livewire('searchcity')
        
        </div>
    </div>
</x-app-layout>
