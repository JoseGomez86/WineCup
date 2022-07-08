<div>
    <div class="bg-white rounded-lg shadow-lg">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>
            <div class="grid grid-cols-2 border border-gray-300 divide-x text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-red-500' : '' }}"
                    wire:click="$set('view','grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-red-500' : '' }}"
                    wire:click="$set('view','list')"></i>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2 py-4">Subcategorías</h2>
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    @if ($subcategory->status == 2 && count($subcategory->products))
                        <li class="my-2 text-sm cursor-pointer hover:text-red-500 capitalize 
                            {{ $subcategoria == $subcategory->slug ? 'text-red-600 font-semibold' : '' }}">
                            <a wire:click="$set('subcategoria','{{ $subcategory->slug }}')">{{ $subcategory->slug }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <button
                class="mt-2 bg-gray-300 hover:bg-gray-500 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                wire:click="borrarFiltros">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172"
                    style=" fill:#000000;">
                    <g transform="translate(18.92,18.92) scale(0.78,0.78)">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                            stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                            font-family="none" font-weight="none" font-size="none" text-anchor="none"
                            style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#000000">
                                <path
                                    d="M28.66667,21.5c-3.956,0 -7.16667,3.21067 -7.16667,7.16667c0,3.956 3.21067,7.16667 7.16667,7.16667l35.83333,57.33333v50.16667c0,3.956 3.21067,7.16667 7.16667,7.16667h16.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333c0,-17.04233 8.514,-32.07251 21.5,-41.13834v-1.86166l35.83333,-57.33333c3.956,0 7.16667,-3.21067 7.16667,-7.16667c0,-3.956 -3.21067,-7.16667 -7.16667,-7.16667zM136.22265,100.47331c-9.88999,0 -18.84262,3.9634 -25.32129,10.44206c-6.47867,6.47867 -10.44206,15.4313 -10.44206,25.3213c0,19.78 15.99735,35.76334 35.77735,35.76334c19.78,0 35.76334,-15.97618 35.76334,-35.76334c-0.00717,-19.7585 -15.99734,-35.75618 -35.77735,-35.76335zM126.14453,118.92188c1.83467,0 3.66956,0.70211 5.06706,2.09961l5.06706,5.06706l5.06706,-5.06706c2.795,-2.795 7.33912,-2.795 10.13412,0c2.795,2.795 2.795,7.33911 0,10.13411l-5.06706,5.06706l5.06706,5.06706c2.795,2.795 2.795,7.33911 0,10.13411c-2.795,2.795 -7.33912,2.795 -10.13412,0l-5.06706,-5.06706l-5.06706,5.06706c-2.795,2.795 -7.33912,2.795 -10.13412,0c-2.795,-2.795 -2.795,-7.33911 0,-10.13411l5.06706,-5.06706l-5.06706,-5.06706c-2.795,-2.795 -2.795,-7.33911 0,-10.13411c1.3975,-1.3975 3.23239,-2.09961 5.06706,-2.09961z">
                                </path>
                            </g>
                            <path d="" fill="none"></path>
                        </g>
                    </g>
                </svg>
                <span class="ml-1"> Eliminar filtros</span>
            </button>
        </aside>

        <div class="md:col-span-2 lg:col-span-4 py-6">
            <div class="py-4">
                {{ $products->links() }}
            </div>
            @if ($view == 'grid')
                <ul class="grid grid-cols-2 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <a href="{{ route('products.show', $product) }}" class="bg-gray-50 rounded-lg shadow">
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
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach ($products as $product)
                        <x-product-list :product="$product" />
                    @endforeach
                </ul>
            @endif
            <div class="py-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
