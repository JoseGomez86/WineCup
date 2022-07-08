<div>
    {{-- Postcode --}}
    <div>
        <input type="text" class="form-control w-full" wire:model="search" placeholder="" />
        @if (Str::length($search) == 4)
            @foreach ($postCodes as $postCode)
                <div class="mt-1 text-sm flex">
                    Te lo enviamos a <p class="font-semibold ml-1">{{ $postCode->locality->name }}</p>,
                    dentro de las <p class="font-semibold ml-1 mr-1">{{ $postCode->zone->shipping_time }}</p> hs.
                    Costo: $<p class="font-semibold">{{ $postCode->zone->shipping_cost }}</p>
                </div>
            @endforeach
        @else
            <div class="mb-6"></div>
        @endif
    </div>
</div>
