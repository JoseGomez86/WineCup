<div wire:init="loadPost">
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <li class="bg-gray-50 rounded-lg shadow {{ $loop->last ? '' : 'mr-5' }}">
                        <a href="{{ route('products.show', $product) }}">
                            <article>
                                <figure>
                                    <img class="h-48 w-full object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <p>{{ Str::limit($product->name, 20) }}</p>
                                    </h1>
                                    <p class="font-bold text-gray-700">$ {{ $product->price }}</p>
                                </div>

                            </article>
                        </a>
                    </li>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div>
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-20 h-20 border-2 border-blue-500"></div>
        </div>
    @endif


</div>
