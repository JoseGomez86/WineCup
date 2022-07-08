
<div>
    <x-jet-dropdown align={{$align}}>
        <x-slot name="trigger">
            <i class="fas fa-cart-arrow-down text-white text-3xl cursor-pointer"></i>
            @if (Cart::count())
                <span
                    class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-4 -translate-y-3 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                </span>
            @endif
        </x-slot>
        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1>{{ $item->name }}</h1>
                            <p>Cantidad: {{ $item->qty }}</p>
                            <p>$ {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="p-3">
                        <p class=" text-center text-gray-700">
                            El carrito esta vacío
                        </p>
                    </li>
                @endforelse
            </ul>
            @if (Cart::count())
                <div class="p-2 px-3">
                    <p class="text-lg text-gray-700 mt-2"> <span class="text-bold">Total:</span> $
                        {{ Cart::subtotal() }}</p>
                    <a href="{{ route('shopping-cart') }}">
                        <x-button color="blue" width="w-full" class="mt-2">
                            Ir al carrito de compras
                        </x-button>
                    </a>
                </div>
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
