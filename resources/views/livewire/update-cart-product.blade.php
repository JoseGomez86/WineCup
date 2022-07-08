<div class="flex items-center" x-data>
    <x-jet-secondary-button 
        disabled x-bind:disabled="$wire.qty <= 1" 
        wire:click="decrement"
        class="mr-1 sm:mr-2 text-xs sm:text-base">
        -
    </x-jet-secondary-button>
    <span class="text-gray-700 font-semibold text-xs sm:text-base">{{ $qty }}</span>
    <x-jet-secondary-button 
        x-bind:disabled="$wire.quantity<1" 
        wire:click="increment"
        class="ml-1 sm:ml-2 text-xs sm:text-base">
        +
    </x-jet-secondary-button>
</div>
