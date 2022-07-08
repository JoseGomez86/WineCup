<x-app-layout>    
    <div class="container-j py-8">
        <div class="mb-4">
            {{$products->links()}}
        </div>
        <ul>
            @forelse ($products as $product)
                <x-product-list :product="$product"/>
            @empty
                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4 flex">
                        <i class="far fa-frown-open text-2xl"></i>
                        <p class="ml-2 text-xl leading-7">
                            No tenemos ningún producto que coincida con tu busqueda.
                        </p>
                    </div>
                </li>
            @endforelse         
        </ul>
        <div class="mt-4">
            {{$products->links()}}
        </div> 
    </div>       
</x-app-layout>