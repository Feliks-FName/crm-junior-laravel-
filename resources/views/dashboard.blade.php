<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-3 grid-cols-4">
                @foreach($statuses as $status)
                    <div class="p-2">{{ $status->name }}
                        @if($status->code === 'new')
                            <div class="col-head mt-1">
                                <a href="{{ route('deals.create') }}" class="link bg-gray-300" type="button">Добавить сделку</a>
                            </div>
                        @endif

                        <div class="mt-2">
                            @foreach($status->deals as $deal)
                                <div class="bg-white p-2 mb-2 rounded shadow">
                                    <a href="{{ route('deals.show', $deal->id) }}" >{{ $deal->name }}</a>
                                    <div class="text-sm text-gray-500">Клиент: {{ $deal->client->name ?? 'Без клиента' }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
