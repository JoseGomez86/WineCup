<x-app-layout>
    <div class="container-j p-8">        
        <figure class="mb-4">
            <img class="w-full h-64 object-cover object-center mb-4" src="{{Storage::url($category->image)}}" alt="">
        </figure>
        @livewire('category-filter', ['category' => $category])
    </div>
</x-app-layout>
