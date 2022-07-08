@props(['product'])

<li class="bg-gray-50 rounded-lg shadow mb-4">
    <a href="{{ route('products.show', $product) }}">
        <article class="flex">
            <figure>
                <img class="h-48 w-56 object-cover object-center"
                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
            </figure>
            <div class="flex-1 py-4 px-6 flex flex-col">
                <div class="flex justify-between">
                    <div>
                        <h1 class="text-lg font-semibold text-gray-700">
                            <p>{{ $product->name }}</p>
                        </h1>
                        <p class="font-semibold text-gray-700">$ {{ $product->price }}</p>
                    </div>
                    <div class="flex items-center">
                        <ul class="flex text-sm">
                            <li class="fas fa-star text-yellow-400 mr-l"></li>
                            <li class="fas fa-star text-yellow-400 mr-l"></li>
                            <li class="fas fa-star text-yellow-400 mr-l"></li>
                            <li class="fas fa-star text-yellow-400 mr-l"></li>
                            <li class="fas fa-star text-yellow-400 mr-l"></li>
                        </ul>
                        <span class="ml-2 text-sm text-gray-700">(15)</span>
                    </div>
                </div>
                {{-- <div class="mt-auto mb-8">
                <x-jet-danger-button>
                    Mas Info
                </x-jet-danger-button>
            </div> --}}

            </div>
        </article>
    </a>
</li>
