@props(['category'])
<div class="grid grid-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-gray-500 mb-3">
            Subcategorías
        </p>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                @if ($subcategory->status == 2)
                    <li>
                        <a href="{{route('categories.show',$category) . '?subcategoria=' . $subcategory->slug}}"
                            class="text-gray-500 font-semibold inline-block py-1 px-4 hover:text-blue-500 hover:font-bold">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
    </div>
</div>
