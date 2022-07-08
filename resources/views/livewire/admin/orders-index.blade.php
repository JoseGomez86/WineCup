<div>
    <div class="container-j">
        <section
            class="grid grid-cols-{{ $OrdersStatuses->groupby('status_id')->count() <= 3 ? 4 : $OrdersStatuses->groupby('status_id')->count() }} gap-6">
            @foreach ($statuses as $status)
                @if ($OrdersStatuses->where('status_id', $status->id)->count() != 0)
                    <a href="{{ route('admin.orders.index') . "?status=$status->id" }}"
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
                <a href="{{ route('admin.orders.index') }}"><i class="fas fa-filter"></i> Borrar filtro</a>
            </div>
        @endif

        @if (!empty($orders[0]))
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-4 text-center">Pedidos recientes</h1>
                <ul>
                    @foreach ($orders as $order)
                        @foreach ($statuses as $status)
                            @if ($status->id == $OrdersStatuses->where('order_id', $order->id)->last()->status_id)
                                <li class=" {{ $status->color }} opacity-90 rounded-md mb-1 text-white ">
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="flex items-center py-2 px-4 hover:bg-gray-100">
                                        <span class="text-lg">
                                            Orden: {{ $order->id }}
                                        </span>
                                        <span class="ml-12 text-lg">
                                            Usuario: {{json_decode($order->buyerData)->name}}
                                        </span>
                                        <span class="ml-6">
                                            Generada: {{ $order->created_at->format('d/m/y H:m') }}
                                        </span>
                                        <span class="ml-auto">
                                            {{ $status->name }}
                                            <br>
                                            $ {{ $order->total }}
                                        </span>
                                        <span>
                                            <i class="fas fa-angle-right ml-6"></i>
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
            </section>
        @else
            <div class="bg-red-500 shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700 border-2 border-red-600">
                <div class="mt-4 text-center text-lg text-white font-semibold">
                    No hay ninguna order de compra realizada hasta el momento.
                </div>
            </div>
        @endif
    </div>
</div>
