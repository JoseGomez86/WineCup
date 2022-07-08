<x-app-layout>
    <div class="container-j py-8">
        @foreach ($categories as $category)
            <section class="mb-6">
                <div class="flex items-center mb-2">
                    <h1 class="text-lg uppercase font-semibold text-gray-700">
                        {{ $category->name }}
                    </h1>
                    <a class="ml-2 text-blue-500 hover:text-blue-400 hover:underline font-bold" 
                    href="{{route('categories.show',$category)}}">Ver mas...</a>
                </div>                
                @livewire('category-products', ['category' => $category])
            </section>
        @endforeach
    </div>
    @push('scriptGlider')
        <script>
            Livewire.on('glider', function(id){
                new Glider(document.querySelector('.glider-'+id), {
                slidesToShow: 2,
                slidesToScroll: 2,
                draggable: true,
                dots: '.glider-'+ id +'~ .dots',
                arrows: {
                    prev: '.glider-'+ id +'~ .glider-prev',
                    next: '.glider-'+ id +'~ .glider-next'
                },
                responsive: [
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3.3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    },
                    {
                        breakpoint: 1280,
                        settings: {
                            slidesToShow: 5.5,
                            slidesToScroll: 5,
                        }
                    },
                ]
            });

            
            });
        </script>
    @endpush

</x-app-layout>
