<x-app-layout>
    <div class="container-j py-12">

        <section
            class="grid grid-cols-{{ $OrdersStatuses->groupby('status_id')->count() <= 3 ? 4 : $OrdersStatuses->groupby('status_id')->count() }} gap-6">
            @foreach ($statuses as $status)
                @if ($OrdersStatuses->where('status_id', $status->id)->count() != 0)
                    <a href="{{ route('orders.index') . "?status=$status->id" }}"
                        class="{{ $status->color }} bg-opacity-75 rounded-lg px-12 py-8 font-semibold">
                        <p class="text-center text-2xl">{{ $OrdersStatuses->where('status_id', $status->id)->count() }}
                        </p>
                        <p class="uppercase text-center">{{ $status->name }}</p>
                        <p class="text-center text-2xl mt-2 text-gray-100">
                            {!! $status->icon !!}
                        </p>
                    </a>
                @endif

            @endforeach
        </section>
        @if (request('status'))
            <div class="mt-4 hover:text-blue-500">
                <a href="{{ route('orders.index') }}"><i class="fas fa-filter"></i> Borrar filtro</a>
            </div>
        @endif


        <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <h1 class="text-2xl mb-4 text-center">Pedidos recientes</h1>
            @if (!empty($orders[0]))
                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{ route('orders.show', $order->id) }}"
                                class="flex items-center py-2 px-4 hover:bg-gray-100 ">
                                <span>
                                    Orden: {{ $order->id }}
                                    <br>
                                    Generada: {{ $order->created_at->format('d/m/y H:m') }}
                                </span>


                                @foreach ($statuses as $status)
                                    @if ($status->id == $OrdersStatuses->where('order_id', $order->id)->last()->status_id)                                        
                                        <span class="ml-auto">
                                            {{ $status->name }}
                                            <br>
                                            $ {{ $order->total }}
                                        </span>
                                        <span
                                            class="ml-1 text-center w-12 h-8 {{ $status->color }} text-white rounded-full text-xl">
                                            {!! $status->icon !!}
                                        </span>
                                    @endif
                                @endforeach


                                <span>
                                    <i class="fas fa-angle-right ml-6"></i>
                                </span>


                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="mt-4 text-center text-lg">
                    Todavia no realizaste ninguna order de compra, te invitamos a elegir entre nuestra gran variedad de productos.
                    
                </div>
                <div class="mt-4 text-red-500 underline text-center text-lg">
                    <a href=".\">Comenzar tu compra aqui</a>
                </div>
            @endif
        </section>
    </div>
</x-app-layout>
