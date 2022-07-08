<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue overflow-hidden shadow-xl sm:rounded-lg">
                {{-- welcome tiene el carrusel con los card de cada producto --}}
                <x-jet-welcome />
                <div class="text-red-500">
                    Acá van a estar todos los productos con sus categorias
                </div>
                
        </div>
    </div>
</x-app-layout>
